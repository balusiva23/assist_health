<?php
// application/controllers/Payment.php

require_once APPPATH . 'libraries/phonepe/PhonePe.php'; // Adjust this path if necessary

use Dwivedianuj9118\PhonePePaymentGateway\PhonePe;

class Payment extends CI_Controller {
    private $phonePe;

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Manager_model');
        $this->load->model('User_model');
        $this->phonePe = new PhonePe('PGTESTPAYUAT85', '88186875-58c6-4313-a000-1e640b3db251', 1); // Use the correct parameters
    }

    // Method to show payment form
    public function index() {
        $this->load->view('payment_form'); // Load the payment form view
    }

    // // Initiate the payment process
    // public function initiate_payment() {
    //     print_r($_POST);die();

    //     $name = $this->input->post('uname');
    // $email = $this->input->post('email');
    // $password = $this->input->post('password');
    // $number = $this->input->post('number');
    // $code = $this->input->post('code');

    //     if ($this->User_model->is_email_duplicate($email) && $this->User_model->is_number_duplicate($number)) {
    //         $response = array(
    //             'status' => 'error',
    //             'message' => 'Email address and number already exist'
    //         );
    //        // echo json_encode($response);
    //        } elseif ($this->User_model->is_email_duplicate($email)) {
              
    //               $response = array(
    //                'status' => 'error',
    //                  'message' => 'Email address already exists'
    //            );
    //          } elseif ($this->User_model->is_number_duplicate($number)) {
             
    //               $response = array(
    //                'status' => 'error',
    //                'message' => 'Number already exists'
    //             );
    //         } else {

    //     $transaction_id = "ORDER" . time();  // Generate unique transaction ID
    //     $amount = $this->input->post('amount') * 100;  // Convert amount to paise
    //     $callback_url = base_url('payment/callback');  // Callback URL after payment

    //     try {
    //         // Initiate payment via PhonePe SDK using the correct method
    //         $response = $this->phonePe->PaymentCall($transaction_id, 'user@example.com', $amount, $callback_url, $callback_url, '1234567890', 'UAT');

    //         if ($response['responseCode'] === 200) {
    //             // Redirect to PhonePe payment page
    //             redirect($response['url']);
    //         } else {
    //             // Handle payment initiation failure
    //             log_message('error', "Payment initiation failed: " . $response['msg']);
    //             echo "Payment initiation failed: " . $response['msg'];
    //         }
    //     } catch (Exception $e) { // Catch general exceptions
    //         // Handle SDK exceptions
    //         log_message('error', "SDK Error: " . $e->getMessage());
    //         echo "Error: " . $e->getMessage();
    //     }
    //  }
    // }
    public function initiate_payment() {
        $name = $this->input->post('uname');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $number = $this->input->post('number');
        $code = $this->input->post('code');
        
        // Store user data in session to use after payment success
        $this->session->set_userdata('payment_user_data', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'number' => $number,
            'code' => $code
        ]);
  ;
        // Continue with the payment process
        $transaction_id = "ORDER" . time();  // Generate unique transaction ID
        $amount = $this->input->post('amount') * 100;  // Convert amount to paise
        $callback_url = base_url('payment/callback');  // Callback URL after payment
    
        try {
            // Initiate payment via PhonePe SDK
            $response = $this->phonePe->PaymentCall($transaction_id, $email, $amount, $callback_url, $callback_url, $number, 'UAT');
    
            if ($response['responseCode'] === 200) {
                // Redirect to PhonePe payment page
                redirect($response['url']);
            } else {
                log_message('error', "Payment initiation failed: " . $response['msg']);
                echo "Payment initiation failed: " . $response['msg'];
            }
        } catch (Exception $e) {
            log_message('error', "SDK Error: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }
    

//  // Handle the callback from PhonePe
//  public function callback() {
//     $response_data = file_get_contents("php://input");

//     // Print raw response data for debugging
//    // echo "Raw Response: " . htmlspecialchars($response_data) . "<br>";

//     // Check if there's data received
//     if (empty($response_data)) {
//         echo "No data received.";
//         return;
//     }

//     // Parse the URL-encoded response
//     parse_str($response_data, $response);

//     // Print the parsed response for debugging
//   //  print_r($response);

//     // Check if the response contains necessary fields
//     if (!isset($response['transactionId'], $response['amount'], $response['merchantId'], $response['code'], $response['checksum'])) {
//         log_message('error', "Invalid response received: " . json_encode($response));
//        // echo "Invalid response. Received: " . json_encode($response);
//         return;
//     }

//     // Extract necessary values from the response
//     $transactionId = $response['transactionId'];
//     $amount = $response['amount'];
//     $merchantId = $response['merchantId'];
//     $responseCode = $response['code'];
//     $receivedChecksum = $response['checksum'];

//     // Get the salt
//     $salt = $this->phonePe->getSaltKey();
//     $saltIndex = '1'; // Use the correct salt index

//     // Generate the expected checksum
//     $expectedChecksum = $this->generate_x_verify($response, '/v1/pay', $salt, $saltIndex);



//     // Validate the checksum
//     if (hash_equals($expectedChecksum, $receivedChecksum)) {
//         // Checksum is valid
//         if ($responseCode === 'PAYMENT_SUCCESS') {
//             // log_message('info', "Payment successful for Transaction ID: $transactionId");
//             // echo "Payment successful!";
           
//         } else {
//             log_message('error', "Payment failed for Transaction ID: $transactionId");
//             echo "Payment failed.";
//         }
//     } else {
//         log_message('error', "Invalid checksum for Transaction ID: $transactionId");
//         echo "Invalid checksum!";
//     }
// }
public function callback() {
    $response_data = file_get_contents("php://input");
    parse_str($response_data, $response);

    if (isset($response['transactionId'], $response['code'], $response['checksum'])) {
        $transactionId = $response['transactionId'];
        $amount = $response['amount'];
        $responseCode = $response['code'];
       echo "Test";
       print_r(!$this->session->userdata('payment_user_data'));die();
        // Validate checksum
        //if ($this->validate_checksum($response)) {
            if ($responseCode === 'PAYMENT_SUCCESS') {
             
                // Get user data from session
                $user_data = $this->session->userdata('payment_user_data'); 
                if ($user_data) {
                    // Save member data and get the member ID
                    $member_id = $this->savemember($user_data['name'], $user_data['email'], $user_data['password'], $user_data['number'], $user_data['code']);
                    
                    if ($member_id) {
                        // Save transaction details with member ID
                        $transaction_data = array(
                            'member_id' => $member_id,
                            'transaction_id' => $transactionId,
                            'amount' => $amount / 100,  // Convert from paise to rupees
                            'status' => 'SUCCESS',
                        );

                        if ($this->User_model->save_transaction($transaction_data)) {
                            // Clear session and redirect
                            $this->session->unset_userdata('payment_user_data');
                            redirect('/');  // Redirect to success page
                        } else {
                            log_message('error', "Error saving transaction for member ID: $member_id");
                        }
                    } else {
                        log_message('error', "Error saving member data.");
                    }
                } else {
                    log_message('error', "User data missing in session.");
                }
            } else {
                log_message('error', "Payment failed for Transaction ID: $transactionId");
            }
        } else {
            log_message('error', "Invalid checksum for Transaction ID:");
        }
    // } else {
    //     log_message('error', "Invalid response received.");
    // }
}

private function validate_checksum($response) {
    // Get the required fields from the response
    $transactionId = $response['transactionId'];
    $amount = $response['amount'];
    $merchantId = $response['merchantId'];
    $receivedChecksum = $response['checksum'];

    // Get the salt and endpoint details (update according to your environment)
    $salt = $this->phonePe->getSaltKey();  // Fetch salt from PhonePe integration
    $saltIndex = '1';  // This should be correct salt index for your environment (e.g., '1' for production)
    $apiEndPoint = '/v1/pay';  // This should be the correct API endpoint you're interacting with

    // Create the body for checksum generation
    $filteredResponse = array_filter($response, function($value) {
        return !is_null($value);
    });

    // Convert the body to JSON and Base64 encode it
    $body = json_encode($filteredResponse);
    $encodedBody = base64_encode($body);

    // Create the string to hash
    $stringToHash = $encodedBody . $apiEndPoint . $salt;

    // Generate the checksum using SHA-256
    $generatedChecksum = hash('sha256', $stringToHash) . "###" . $saltIndex;

    // Compare the generated checksum with the received checksum
    return hash_equals($generatedChecksum, $receivedChecksum);
}

private function generate_x_verify($response, $apiEndPoint, $salt, $saltIndex) {
    // Remove any parameters with null values
    $filteredResponse = array_filter($response, function($value) {
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
    $hash = hash('sha256', $stringToHash);

    // Return the hash with the salt index
    return $hash . "###" . $saltIndex;
}
public function savemember($name, $email, $password, $number) {
    $name = $this->input->post('uname');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $number = $this->input->post('number');
    $code = $this->input->post('code');

    $this->load->library('form_validation');
    $this->form_validation->set_rules('uname', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

    if ($this->form_validation->run() === FALSE) {
        $response = array(
            'status' => 'valid',
            'message' => validation_errors()
        );
    } else {
        // Encrypt the password
        $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare the member data
        $member_data = array(
            'name' => $name,
            'email' => $email,
            'password' => $encrypted_password,
            'number' => $number,
            'code' => $code,
            'member_status' => '1'
        );

        // Save member data in the database
        if ($this->User_model->save_member($member_data)) {
            // Get the last inserted member ID
            $member_id = $this->db->insert_id();

            // Return the member ID for further processing
            return $member_id;
        } else {
            // Error while saving member
            return false;
        }
    }
}

    
// public function savemember($name, $email, $password, $number)
// {
//     $name = $this->input->post('uname');
//     $email = $this->input->post('email');
//     $password = $this->input->post('password');
//     $number = $this->input->post('number');
//     $code = $this->input->post('code');

//     // Perform form validation
//     $this->load->library('form_validation');
//     $this->form_validation->set_rules('uname', 'Name', 'required');
//     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//     $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

//     if ($this->form_validation->run() === FALSE) {
//         // Form validation failed
//         $response = array(
//             'status' => 'valid',
//             'message' => validation_errors()
//         );
//     } else {
//         // Form validation passed


       

//         if ($this->User_model->is_email_duplicate($email) && $this->User_model->is_number_duplicate($number)) {
//         $response = array(
//             'status' => 'error',
//             'message' => 'Email address and number already exist'
//         );
//        // echo json_encode($response);
//        } elseif ($this->User_model->is_email_duplicate($email)) {
          
//               $response = array(
//                'status' => 'error',
//                  'message' => 'Email address already exists'
//            );
//          } elseif ($this->User_model->is_number_duplicate($number)) {
         
//               $response = array(
//                'status' => 'error',
//                'message' => 'Number already exists'
//             );
//         } else {
         
        

//          // Generate the new member ID
//          $newMemberId = $this->generateUniqueMemberId();
       
//         // Encrypt the password
//         $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

//         // Save the member details in the database
//         $member_data = array(
//             'name' => $name,
//             'email' => $email,
//             'password' => $encrypted_password,
//             'member_id' =>$newMemberId,
//             'number' =>$number,
//             'code' =>$code,
//             'member_status'=>'1'
//         );

//         if ($this->User_model->save_member($member_data)) {

//             $this->send_mail($name,$email,$number);

//             /*Notification*/

//             // Retrieve data from the employee table
//             $admin = $this->Admin_model->getAllAdmin();
//             // Insert data into the notification table for each employee
//             $filetitle = 'New user signup: <span class="txt-name">'.$name.'</span>.';
//             foreach ($admin as $data) {
//             $data = array(
//             'admin_id' => $data->id,
//             'message' => $filetitle,
//             'created_at' => date('Y-m-d H:i:s'),
//             'status' => 'unread',
//             'icon' => 'fa fa-user o',
//             'color' => 'purple-bgcolor',
//               'url' => 'Admin/All_Members'
//             );
//             $this->db->insert('admin_notifications', $data);
//             }

//             // Member saved successfully
//             $response = array(
//                 'status' => 'success',
//                 'message' => 'Registration successful'
//             );
//         } else {
//             // Error saving member
//             $response = array(
//                 'status' => 'error',
//                 'message' => 'Error saving member'
//             );
//         }
//     }
//    }

//     echo json_encode($response);
// }
public function generateUniqueMemberID()
{
    // Get the last member ID from the database
    $lastMemberID = $this->db->select('member_id')
        ->order_by('member_id', 'DESC')
        ->limit(1)
        ->get('members')
        ->row('member_id');

    // Check if a member ID already exists
    if (!empty($lastMemberID)) {
        // Extract the prefix and numeric parts of the last member ID
        $prefix = substr($lastMemberID, 0, 3);
        $numericPart = (int) substr($lastMemberID, 3);

        if ($numericPart < 99) {
            // Increment the numeric part by 1
            $newNumericPart = $numericPart + 1;
            // Generate the new member ID
            $newMemberID = $prefix . str_pad($newNumericPart, 2, '0', STR_PAD_LEFT);
        } else {
            // Increment the prefix and reset the numeric part to 0
            $newPrefix = ++$prefix;
            $newNumericPart = 0;
            // Generate the new member ID
            $newMemberID = $newPrefix . str_pad($newNumericPart, 2, '0', STR_PAD_LEFT);
        }
    } else {
        // If no member ID exists, start with the default value
        $newMemberID = 'AAA00';
    }

    // Check if the new member ID already exists
    $existingMember = $this->db->get_where('members', array('member_id' => $newMemberID))->row();

    if ($existingMember) {
        // If the new member ID already exists, recursively call the function to generate a new one
        return $this->generateUniqueMemberID();
    }

    return $newMemberID;
}

}
