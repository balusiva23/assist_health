<?php
// application/controllers/Payment.php

require_once APPPATH . 'libraries/phonepe/PhonePe.php'; // Adjust this path if necessary

use Dwivedianuj9118\PhonePePaymentGateway\PhonePe;

class Payment extends CI_Controller {
    private $phonePe;

    public function __construct() {
        parent::__construct();
        $this->phonePe = new PhonePe('PGTESTPAYUAT85', '88186875-58c6-4313-a000-1e640b3db251', 1); // Use the correct parameters
    }

    // Method to show payment form
    public function index() {
        $this->load->view('payment_form'); // Load the payment form view
    }

    // Initiate the payment process
    public function initiate_payment() {
        $transaction_id = "ORDER" . time();  // Generate unique transaction ID
        $amount = $this->input->post('amount') * 100;  // Convert amount to paise
        $callback_url = base_url('payment/callback');  // Callback URL after payment

        try {
            // Initiate payment via PhonePe SDK using the correct method
            $response = $this->phonePe->PaymentCall($transaction_id, 'user@example.com', $amount, $callback_url, $callback_url, '1234567890', 'UAT');

            if ($response['responseCode'] === 200) {
                // Redirect to PhonePe payment page
                redirect($response['url']);
            } else {
                // Handle payment initiation failure
                log_message('error', "Payment initiation failed: " . $response['msg']);
                echo "Payment initiation failed: " . $response['msg'];
            }
        } catch (Exception $e) { // Catch general exceptions
            // Handle SDK exceptions
            log_message('error', "SDK Error: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }

    // Handle the callback from PhonePe
    // public function callback() {
    //     $response_data = file_get_contents("php://input");
    //     $response = json_decode($response_data, true);
    //     //  print_r($response);
    //     //  print_r($response_data);
    //      print_r( $response['transactionId']);
    //      print_r( $response['amount']);
    //      print_r( $response['merchantId']);
    //      print_r( $response['code']);
    //      print_r( $response['signature']);
    //     // Check if the response contains necessary fields
    //     if (!isset($response['transactionId'], $response['amount'], $response['merchantId'], $response['code'], $response['signature'])) {
    //         log_message('error', "Invalid response received: " . json_encode($response));
    //         echo "Invalid response";
    //         return;
    //     }

    //     // Extract necessary values from the response
    //     $transactionId = $response['transactionId'];
    //     $amount = $response['amount'];
    //     $merchantId = $response['merchantId'];
    //     $responseCode = $response['code'];
    //     $receivedSignature = $response['signature'];

    //     // Generate the expected signature
    //     $expectedSignature = $this->generate_signature($transactionId, $amount);

    //     // Validate the signature
    //     if (hash_equals($expectedSignature, $receivedSignature)) {
    //         // Signature is valid
    //         if ($responseCode === 'SUCCESS') {
    //             log_message('info', "Payment successful for Transaction ID: $transactionId");
    //             echo "Payment successful!";
    //             // Update your order status in the database here
    //         } else {
    //             log_message('error', "Payment failed for Transaction ID: $transactionId");
    //             echo "Payment failed.";
    //             // Update order as failed in the database
    //         }
    //     } else {
    //         // Signature is invalid
    //         log_message('error', "Invalid signature for Transaction ID: $transactionId");
    //         echo "Invalid signature!";
    //     }
    // // }
    // public function callback() {
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
    
    //     // Check if the response contains necessary fields
    //     if (!isset($response['transactionId'], $response['amount'], $response['merchantId'], $response['code'], $response['checksum'])) {
    //         log_message('error', "Invalid response received: " . json_encode($response));
            
    //         // Echo the whole response for debugging
    //         echo "Invalid response. Received: " . json_encode($response);
    //         return;
    //     }
    
    //     // Extract necessary values from the response
    //     $transactionId = $response['transactionId'];
    //     $amount = $response['amount'] ;
    //     $merchantId = $response['merchantId'];
    //     $responseCode = $response['code'];
    //     $receivedSignature = $response['checksum']; // Use the checksum instead of signature
    
    //     // // Print extracted values for debugging
    //     // echo "Transaction ID: " . $transactionId . "<br>";
    //     // echo "Amount: " . $amount/100 . "<br>";
    //     // echo "Merchant ID: " . $merchantId . "<br>";
    //     // echo "Response Code: " . $responseCode . "<br>";
    //     echo "Received Checksum: " . $receivedSignature . "<br>";
       
    
    //     // Generate the expected signature
    //     $expectedSignature = $this->generate_signature($transactionId, $amount);
    //     echo "expectedSignature : " . $expectedSignature . "<br>";
    
    //     // Validate the signature
    //     if (hash_equals($expectedSignature, $receivedSignature)) {
    //         // Signature is valid
    //         if ($responseCode === 'PAYMENT_SUCCESS') {
    //             log_message('info', "Payment successful for Transaction ID: $transactionId");
    //             echo "Payment successful!";
    //             // Update your order status in the database here
    //         } else {
    //             log_message('error', "Payment failed for Transaction ID: $transactionId");
    //             echo "Payment failed.";
    //             // Update order as failed in the database
    //         }
    //     } else {
    //         // Signature is invalid
    //         log_message('error', "Invalid signature for Transaction ID: $transactionId");
    //         echo "Invalid signature!";
    //     }
    // }
    
    
    // Function to generate the expected signature
    // private function generate_signature($transactionId, $amount) {
    //     $payload = "/v1/pay/{$this->phonePe->getMerchantId()}/{$transactionId}/{$amount}";
    //     $hash = hash_hmac('sha256', $payload, $this->phonePe->getSaltKey());
    //     return $hash . "###" . $this->phonePe->getSaltKey();
    // }
    // private function generate_signature($transactionId, $amount) {
    //     // Create the payload for signature generation
    //     $payload = "/v1/pay/{$this->phonePe->getMerchantId()}/{$transactionId}/{$amount}";
        
    //     // Generate the HMAC SHA-256 hash
    //     $hash = hash_hmac('sha256', $payload, $this->phonePe->getSaltKey());
        
    //     return $hash; // Return just the hash
    // }
 // Handle the callback from PhonePe
 public function callback() {
    $response_data = file_get_contents("php://input");

    // Print raw response data for debugging
    echo "Raw Response: " . htmlspecialchars($response_data) . "<br>";

    // Check if there's data received
    if (empty($response_data)) {
        echo "No data received.";
        return;
    }

    // Parse the URL-encoded response
    parse_str($response_data, $response);

    // Print the parsed response for debugging
    print_r($response);

    // Check if the response contains necessary fields
    if (!isset($response['transactionId'], $response['amount'], $response['merchantId'], $response['code'], $response['checksum'])) {
        log_message('error', "Invalid response received: " . json_encode($response));
        echo "Invalid response. Received: " . json_encode($response);
        return;
    }

    // Extract necessary values from the response
    $transactionId = $response['transactionId'];
    $amount = $response['amount'];
    $merchantId = $response['merchantId'];
    $responseCode = $response['code'];
    $receivedChecksum = $response['checksum'];

    // Get the salt
    $salt = $this->phonePe->getSaltKey();
    $saltIndex = '1'; // Use the correct salt index

    // Generate the expected checksum
    $expectedChecksum = $this->generate_x_verify($response, '/v1/pay', $salt, $saltIndex);

    // Print values for debugging
    echo "Transaction ID: " . $transactionId . "<br>";
    echo "Amount: " . $amount . "<br>";
    echo "Merchant ID: " . $merchantId . "<br>";
    echo "Response Code: " . $responseCode . "<br>";
    echo "Received Checksum: " . $receivedChecksum . "<br>";
    echo "Expected Checksum: " . $expectedChecksum . "<br>";

    // Validate the checksum
    if (hash_equals($expectedChecksum, $receivedChecksum)) {
        // Checksum is valid
        if ($responseCode === 'PAYMENT_SUCCESS') {
            log_message('info', "Payment successful for Transaction ID: $transactionId");
            echo "Payment successful!";
        } else {
            log_message('error', "Payment failed for Transaction ID: $transactionId");
            echo "Payment failed.";
        }
    } else {
        log_message('error', "Invalid checksum for Transaction ID: $transactionId");
        echo "Invalid checksum!";
    }
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

    
    
}
