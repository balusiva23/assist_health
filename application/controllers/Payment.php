<?php
// application/controllers/Payment.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require FCPATH . "assets/phpmailer/phpmailer/src/Exception.php";
require FCPATH . "assets/phpmailer/phpmailer/src/PHPMailer.php";
require FCPATH . "assets/phpmailer/phpmailer/src/SMTP.php";

require_once APPPATH . "libraries/phonepe/PhonePe.php"; // Adjust this path if necessary

use Dwivedianuj9118\PhonePePaymentGateway\PhonePe;

class Payment extends CI_Controller
{
    private $phonePe;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->model("Manager_model");
        $this->load->model("User_model");
        //$this->phonePe = new PhonePe('PGTESTPAYUAT85', '88186875-58c6-4313-a000-1e640b3db251', 1); // Use the correct parameters
        $this->phonePe = new PhonePe(
            "M22GP7C1IXZX4",
            "d90972b6-380b-4d97-ab35-945e4e4fd978",
            1
        ); // Use the correct parameters
    }

    // Method to show payment form
    public function index()
    {
        $this->load->view("payment_form"); // Load the payment form view
    }

    public function initiate_payment()
    {
        $name = $this->input->post("uname");
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $number = $this->input->post("number");
        $code = $this->input->post("code");
        $plan = $this->input->post("plan");
      
        if (
            $this->User_model->is_email_duplicate($email) &&
            $this->User_model->is_number_duplicate($number)
        ) {
            echo "<script>alert('Email address and number already exist'); window.location.href = '" . base_url('/signup') . "';</script>";
            exit;
        } elseif ($this->User_model->is_email_duplicate($email)) {
            echo "<script>alert('Email address already exists'); window.location.href = '" . base_url('/signup') . "';</script>";
            exit;
        } elseif ($this->User_model->is_number_duplicate($number)) {
            echo "<script>alert('Number already exists'); window.location.href = '" . base_url('/signup') . "';</script>";
            exit;
        }
        else {
            // Generate unique transaction ID
            $transaction_id = "ORDER" . time();
            $amount = $this->input->post('amount') * 100;  // Convert amount to paise
           // $amount = 1 * 100; // Convert amount to paise
            // $callback_url = base_url('payment/callback?name=' . json_encode($name) . '&email=' . json_encode($email) . '&password=' . json_encode($password) . '&number=' . json_encode($number) . '&code=' . urlencode($code));
            $callback_url = base_url(
                "payment/callback?name=" .
                    urlencode($name) .
                    "&email=" .
                    urlencode($email) .
                    "&password=" .
                    urlencode($password) .
                    "&number=" .
                    urlencode($number) .
                    "&code=" .
                    urlencode($code) .
                    "&plan=" .
                    urlencode($plan)
            );

            try {
                // Initiate payment via PhonePe SDK
                //$response = $this->phonePe->PaymentCall($transaction_id, $email, $amount, $callback_url, $callback_url, $number, 'UAT');// UAT
                $response = $this->phonePe->PaymentCall(
                    $transaction_id,
                    $email,
                    $amount,
                    $callback_url,
                    $callback_url,
                    $number,
                    "PROD"
                ); // UAT

                if ($response["responseCode"] === 200) {
                    // Redirect to PhonePe payment page
                    redirect($response["url"]);
                } else {
                    echo "Payment initiation failed: " . $response["msg"];
                    echo "Payment initiation failed: " . $response["msg"];
                }
            } catch (Exception $e) {
                echo "SDK Error: " . $e->getMessage();
                echo "Error: " . $e->getMessage();
            }
        }
    }
    public function callback()
    {
        $response_data = file_get_contents("php://input");
        parse_str($response_data, $response);


        $name = $this->input->get("name");
        $email = $this->input->get("email");
        $password = $this->input->get("password");
        $number = $this->input->get("number");
        $code = $this->input->get("code");
        $plan = $this->input->get("plan");
        ///print_r($_GET);

        if ($plan == "basic") {
            $plan_value = "Basic Membership";
        } elseif ($plan == "premium") {
            $plan_value = "Premium Membership";
        } else {
            $plan_value = "";
        }
        // print_r($_GET);
        if (
            isset(
                $response["transactionId"],
                $response["code"],
                $response["checksum"]
            )
        ) {
            $transactionId = $response["transactionId"];
            $amount = $response["amount"];
            $responseCode = $response["code"];

            // Validate checksum (assuming you have a validate_checksum method)
            // if ($this->validate_checksum($response)) {
            if ($responseCode === "PAYMENT_SUCCESS") {
                // Save member data and get the member ID
                $member_id = $this->savemember(
                    $name,
                    $email,
                    $password,
                    $number,
                    $code,
                    $plan
                );
                // echo $member_id;
                // echo "T!";
                if ($member_id) {
                    // Save transaction details with member ID
                    $transaction_data = [
                        "member_id" => $member_id,
                        "transaction_id" => $transactionId,
                        "amount" => $amount / 100, // Convert from paise to rupees
                        "status" => "SUCCESS",
                    ];
                    //print_r($this->User_model->save_transaction($transaction_data));
                    $result = $this->User_model->save_transaction(
                        $transaction_data
                    );
                    $t_amt = $amount / 100;
                    if ($result) {
                        //mail
                        $this->send_mail(
                            $name,
                            $email,
                            $number,
                            $transaction_data["transaction_id"],
                            $plan_value,
                            $t_amt
                        );
                        // Redirect to success page
                        redirect(base_url("/login"));
                    } else {
                        echo "Error saving transaction for member ID: $member_id";
                    }
                } else {
                    echo "Error saving member data.";
                }
            } else {
                echo "Payment failed for Transaction ID: $transactionId";
            }
            // } else {
            //     log_message('error', "Invalid checksum for Transaction ID: $transactionId");
            // }
        } else {
            echo "Invalid response received.";
        }
    }

    public function savemember($name, $email, $password, $number, $code, $plan)
    {
        if (
            $this->User_model->is_email_duplicate($email) &&
            $this->User_model->is_number_duplicate($number)
        ) {
            $response = [
                "status" => "error",
                "message" => "Email address and number already exist",
            ];
            // echo json_encode($response);
        } elseif ($this->User_model->is_email_duplicate($email)) {
            $response = [
                "status" => "error",
                "message" => "Email address already exists",
            ];
        } elseif ($this->User_model->is_number_duplicate($number)) {
            $response = [
                "status" => "error",
                "message" => "Number already exists",
            ];
        } else {
            // Generate the new member ID
            $newMemberId = $this->generateUniqueMemberId();

            // Encrypt the password
            $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

            // Save the member details in the database
            $member_data = [
                "name" => $name,
                "email" => $email,
                "password" => $encrypted_password,
                "member_id" => $newMemberId,
                "number" => $number,
                "code" => $code,
                "member_status" => "1",
                "membership" => $plan,
            ];

            if ($this->User_model->save_member($member_data)) {
                //  $this->send_mail($name,$email,$number);

                /*Notification*/

                // Retrieve data from the employee table
                $admin = $this->Admin_model->getAllAdmin();
                // Insert data into the notification table for each employee
                $filetitle =
                    'New user signup: <span class="txt-name">' .
                    $name .
                    "</span>.";
                foreach ($admin as $data) {
                    $data = [
                        "admin_id" => $data->id,
                        "message" => $filetitle,
                        "created_at" => date("Y-m-d H:i:s"),
                        "status" => "unread",
                        "icon" => "fa fa-user o",
                        "color" => "purple-bgcolor",
                        "url" => "Admin/All_Members",
                    ];
                    $this->db->insert("admin_notifications", $data);
                }

                // Member saved successfully
                return $this->db->insert_id();
                // $response = array(
                //     'status' => 'success',
                //     'message' => 'Registration successful'
                // );
            } else {
                // Error saving member
                $response = [
                    "status" => "error",
                    "message" => "Error saving member",
                ];
            }
        }

        echo json_encode($response);
    }

    private function validate_checksum($response)
    {
        // Get the required fields from the response
        $transactionId = $response["transactionId"];
        $amount = $response["amount"];
        $merchantId = $response["merchantId"];
        $receivedChecksum = $response["checksum"];

        // Get the salt and endpoint details (update according to your environment)
        $salt = $this->phonePe->getSaltKey(); // Fetch salt from PhonePe integration
        $saltIndex = "1"; // This should be correct salt index for your environment (e.g., '1' for production)
        $apiEndPoint = "/v1/pay"; // This should be the correct API endpoint you're interacting with

        // Create the body for checksum generation
        $filteredResponse = array_filter($response, function ($value) {
            return !is_null($value);
        });

        // Convert the body to JSON and Base64 encode it
        $body = json_encode($filteredResponse);
        $encodedBody = base64_encode($body);

        // Create the string to hash
        $stringToHash = $encodedBody . $apiEndPoint . $salt;

        // Generate the checksum using SHA-256
        $generatedChecksum = hash("sha256", $stringToHash) . "###" . $saltIndex;

        // Compare the generated checksum with the received checksum
        return hash_equals($generatedChecksum, $receivedChecksum);
    }

    private function generate_x_verify(
        $response,
        $apiEndPoint,
        $salt,
        $saltIndex
    ) {
        // Remove any parameters with null values
        $filteredResponse = array_filter($response, function ($value) {
            return !is_null($value);
        });

        // Echo the filtered response for debugging
        echo "Filtered Response: " . json_encode($filteredResponse) . "<br>";

        // Create the body as a JSON string
        $body = json_encode($filteredResponse);

        // Base64 encode the body
        $encodedBody = base64_encode($body);

        // Create the string for hashing
        $stringToHash = $encodedBody . $apiEndPoint . $salt;

        // Echo the string being hashed
        echo "String to Hash: $stringToHash<br>";

        // Generate the SHA256 hash
        $hash = hash("sha256", $stringToHash);

        // Return the hash with the salt index
        return $hash . "###" . $saltIndex;
    }

    public function generateUniqueMemberID()
    {
        // Get the last member ID from the database
        $lastMemberID = $this->db
            ->select("member_id")
            ->order_by("member_id", "DESC")
            ->limit(1)
            ->get("members")
            ->row("member_id");

        // Check if a member ID already exists
        if (!empty($lastMemberID)) {
            // Extract the prefix and numeric parts of the last member ID
            $prefix = substr($lastMemberID, 0, 3);
            $numericPart = (int) substr($lastMemberID, 3);

            if ($numericPart < 99) {
                // Increment the numeric part by 1
                $newNumericPart = $numericPart + 1;
                // Generate the new member ID
                $newMemberID =
                    $prefix . str_pad($newNumericPart, 2, "0", STR_PAD_LEFT);
            } else {
                // Increment the prefix and reset the numeric part to 0
                $newPrefix = ++$prefix;
                $newNumericPart = 0;
                // Generate the new member ID
                $newMemberID =
                    $newPrefix . str_pad($newNumericPart, 2, "0", STR_PAD_LEFT);
            }
        } else {
            // If no member ID exists, start with the default value
            $newMemberID = "AAA00";
        }

        // Check if the new member ID already exists
        $existingMember = $this->db
            ->get_where("members", ["member_id" => $newMemberID])
            ->row();

        if ($existingMember) {
            // If the new member ID already exists, recursively call the function to generate a new one
            return $this->generateUniqueMemberID();
        }

        return $newMemberID;
    }
    public function send_mail(
        $name,
        $email,
        $number,
        $transaction_id,
        $plan_value,
        $t_amt
    ) {
        // $name = $this->input->post('name');
        // $email = $this->input->post('email');
        // $number = $this->input->post('number');
        //  $message = $this->input->post('message');

        // Create the inquiry email
        $inquiryMail = new PHPMailer(true);
        ob_start();
        ?>
    <!-- Inquiry email HTML content -->
  <html>
  <head>
      <meta charset="UTF-8">
      <title></title>
      <style>
          body {
              margin: 0;
              padding: 0;
              font-family: Arial, sans-serif;
          }

          .container {
              max-width: 600px;
              margin: 0 auto;
              padding: 20px;
              background-color: #F5F8FB;
          }

          h1 {
              font-size: 24px;
              margin-top: 0;
          }

          table {
              width: 100%;
          }

          table td {
              padding: 5px;
          }

          .btn {
              display: inline-block;
              padding: 10px 20px;
              background-color: #2196F3;
              color: #ffffff;
              text-decoration: none;
              border-radius: 2px;
              font-weight: bold;
          }

          .caption {
              font-size: 12px;
              color: #616161;
          }

          .signature {
              margin-top: 20px;
              font-size: 12px;
          }

          .logo-image {
              display: inline-block;
              vertical-align: middle;
          }

          .logo-image img {
              max-width: 70px;
              height: auto;
          }

          .unsubscribe-link {
              display: inline-block;
              margin-right: 10px;
              text-decoration: none;
              color: #616161;
          }
      </style>
  </head>
  <body>
      <div class="container">
          <h1>New User Registration</h1>
            <p>Hello Admin,</p>
            <p>A new user has registered on our website. Here are the registration details:</p>
          <table>
              <tr>
                  <td><strong>Name</strong></td>
                  <td><?php if (isset($name)) {
                      echo $name;
                  } ?></td>
              </tr>
              <tr>
                  <td><strong>Email</strong></td>
                    <td><?php if (isset($email)) {
                        echo $email;
                    } ?></td>
              </tr>
              <tr>
                  <td><strong>Phone</strong></td>
                    <td><?php if (isset($number)) {
                        echo $number;
                    } ?></td>
              </tr> 
               <!-- <tr>
                  <td><strong>Message</strong></td>
                    <td><?php if (isset($message)) {
                        echo $message;
                    } ?></td>
              </tr> -->
          </table>

       <!--    <p style="text-align:center;">
              <a href="#" class="btn">EXAMPLE BUTTON</a>
          </p>
          <p style="text-align:center;">
              <a href="#" class="unsubscribe-link">Unsubscribe</a>
              <span>|</span>
              <a href="#" class="unsubscribe-link">Account Settings</a>
          </p> -->
          <!-- <p class="caption">This is a caption text in the main email body.</p> -->

          <div class="signature">
              <p>
              Thank you,<br>
             AssisHealth,<br>
              #850,
              3rd Floor,<br>
              opposite Coffee Day,<br>
              RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
              </p>
             <!--  <p>
                  Support: <a href="mailto:#">info@whello.id</a>
              </p> -->
              <!-- <div class="logo-image">
                  <a href="#" target="_blank">
                      <img src="https://zavoloklom.github.io/material-design-iconic-font/icons/mstile-70x70.png" alt="logo-alt">
                  </a>
              </div> -->
          </div>
      </div>
  </body>
  </html>
    <?php
    $inquiryMessage = ob_get_clean();

    try {
        // Configure and send the inquiry email
        $inquiryMail->SMTPDebug = 2;
        $inquiryMail->isSMTP();
        $inquiryMail->Host = "smtp.gmail.com";
        $inquiryMail->SMTPAuth = true;
        $inquiryMail->Username = USERNAME;
        $inquiryMail->Password = PASSWORD;
        $inquiryMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $inquiryMail->Port = 465;
        $inquiryMail->setFrom(FROM, FROMNAME);
        $inquiryMail->addAddress(FROM, FROMNAME);
        $inquiryMail->isHTML(true);
        $inquiryMail->Subject = "New User Registration!!!";
        $inquiryMail->Body = $inquiryMessage;

        // Create the thank you email
        $thankYouMail = new PHPMailer(true);
        ob_start();
        ?>
<html>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
    <thead>
      <tr>
        <th style="text-align:left;"><img style="max-width: 150px;" src="https://assisthealth.in/demo/assets/logo.png" alt="Assist Health"></th>
        <th style="text-align:right;font-weight:400;"><?php echo date(
            "d-M-Y"
        ); ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0">SUCCESS</b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span> <?= $transaction_id ?></p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span> Rs. <?= $t_amt ?></p>
        </td>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> <?= $name ?></p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> <?= $email ?></p>
      
      
        </td>
         <td style="width:50%;padding:20px;vertical-align:top">
             <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span> <?= $number ?></p
           <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Membership Type</span> <?= $plan_value ?></p>
  
         </td>
      </tr>
   
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong> AssisHealth<br> Floor, #850, 3rd, Sahakara Nagar Main Rd,<br> Bengaluru, Karnataka 560092<br>
          <b>Phone:</b> +91 96112 32519 / +91 96112 32569<br>
          <b>Email:</b> infoassisthealth@gmail.com
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>
        <?php
        $thankYouMessage = ob_get_clean();

        // Configure and send the thank you email
        $thankYouMail->isSMTP();
        $thankYouMail->Host = "smtp.gmail.com";
        $thankYouMail->SMTPAuth = true;
        $thankYouMail->Username = USERNAME;
        $thankYouMail->Password = PASSWORD;
        $thankYouMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $thankYouMail->Port = 465;
        $thankYouMail->setFrom(FROM, FROMNAME);
        $thankYouMail->addAddress($email, $name);
        $thankYouMail->isHTML(true);
        $thankYouMail->Subject = "Thank you for registering!";
        $thankYouMail->Body = $thankYouMessage;

        // Send both emails
        if ($inquiryMail->send() && $thankYouMail->send()) {
            // echo json_encode(array('status' => 'success', 'message' => 'Register Successfully!!'));
        } else {
            // echo json_encode(array('status' => 'error', 'message' => 'Error in sending emails.'));
        }
    } catch (Exception $e) {
        //echo json_encode(array('status' => 'error', 'message' => "An error occurred. {$e->getMessage()}"));
    }
    }
}
