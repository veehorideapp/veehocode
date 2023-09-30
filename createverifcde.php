{\rtf1\ansi\ansicpg1252\cocoartf2513
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\paperw11900\paperh16840\margl1440\margr1440\vieww10800\viewh8400\viewkind0
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0

\f0\fs24 \cf0 <?php\
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0
\cf0 header('Content-Type: application/json'); // Set the content type to JSON\
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0
\cf0 require 'vendor/autoload.php'; // Include PHPMailer\
\
// Function to generate a random 6-digit verification code\
function generateVerificationCode() \{\
    return mt_rand(100000, 999999);\
\}\
\
// Check if an email address is provided via POST\
if (isset($_POST['email'])) \{\
    // Get the user's email address from the POST data\
    $email = $_POST['email'];\
\
    // Generate a random 6-digit verification code\
    $verificationCode = generateVerificationCode();\
\
    // Initialize PHPMailer\
    $mail = new PHPMailer\\PHPMailer\\PHPMailer();\
\
    // SMTP configuration (adjust these settings based on your email provider)\
    $mail->isSMTP();\
    $mail->Host = \'91veehoride@hotmail.com\'92;\
    $mail->SMTPAuth = true;\
    $mail->Username = 'veehoride@hotmail.com\'92';\
    $mail->Password = \'91ridesharing1;\
    $mail->Port = 587; // Adjust the port as needed\
    $mail->SMTPSecure = 'tls'; // or 'ssl' if required\
\
    // Sender and recipient email addresses\
    $mail->setFrom(\'91veehoride@hotmail.com\'92, \'91Veeho\'92);\
    $mail->addAddress($email);\
\
    // Email subject and message\
    $mail->Subject = 'Verification Code';\
    $mail->Body = 'Your verification code is: ' . $verificationCode;\
\
    // Send the email\
    if ($mail->send()) \{\
        // Prepare the JSON response for success\
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0
\cf0         $response = array(\
            'status' => 'success',\
            'message' => 'Verification code sent successfully',\
            'code' => $verificationCode\
	);\
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0
\cf0     \} else \{\
        // Email sending failed\
        echo 'Email could not be sent. Please try again later.';\
    \}\
\} else \{\
   // Prepare the JSON response for missing email parameter\
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0
\cf0         $response = array(\
            'status' => 'error',\
            'message' => 'Email address not provided'\
        );\
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0
\cf0 \}\
\
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0
\cf0 echo json_encode($response);\
    exit;\
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0
\cf0 ?>\
}