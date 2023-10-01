<?php
header('Content-Type: application/json'); // Set the content type to JSON
require 'vendor/autoload.php'; // Include PHPMailer

// Function to generate a random 6-digit verification code
function generateVerificationCode() {
    return mt_rand(100000, 999999);
}

// Check if an email address is provided via POST
if (isset($_POST['email'])) {
    // Get the user's email address from the POST data
    $email = $_POST['email'];

    // Generate a random 6-digit verification code
    $verificationCode = generateVerificationCode();

    // Initialize PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // SMTP configuration (adjust these settings based on your email provider)
    $mail->isSMTP();
    $mail->Host = ‘veehoride@hotmail.com’;
    $mail->SMTPAuth = true;
    $mail->Username = 'veehoride@hotmail.com’';
    $mail->Password = ‘ridesharing1;
    $mail->Port = 587; // Adjust the port as needed
    $mail->SMTPSecure = 'tls'; // or 'ssl' if required

    // Sender and recipient email addresses
    $mail->setFrom(‘veehoride@hotmail.com’, ‘Veeho’);
    $mail->addAddress($email);

    // Email subject and message
    $mail->Subject = 'Verification Code';
    $mail->Body = 'Your verification code is: ' . $verificationCode;

    // Send the email
    if ($mail->send()) {
        // Prepare the JSON response for success
        $response = array(
            'status' => 'success',
            'message' => 'Verification code sent successfully',
            'code' => $verificationCode
	);
    } else {
        // Email sending failed
        echo 'Email could not be sent. Please try again later.';
    }
} else {
   // Prepare the JSON response for missing email parameter
        $response = array(
            'status' => 'error',
            'message' => 'Email address not provided'
        );
}

echo json_encode($response);
    exit;
?>