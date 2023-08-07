<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email address from the form
    $to = $_POST['email'];

    // Email content
    $subject = "Automated Email";
    $message = "https://drive.google.com/drive/folders/1Z3Nu2zj20wDhR_m0d88FtgJqKRogf2Es?usp=sharing";

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // Set SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server address
    $mail->Port = 465; // Replace with your SMTP server port
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = 'priyankchoudhary8077@gmail.com'; // Replace with your email address
    $mail->Password = 'balfnadtlkgnthid'; // Replace with your email password

    // Set email content
    $mail->setFrom('priyankchoudhary8077@gmail.com', 'Priyank'); // Replace with your email address and name
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    if ($mail->send()) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send the email. Error: " . $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Automated Email</title>
    <link  rel="stylesheet" href="css/welcome.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }
        form {
        
            text-align: center;
        }
        
    </style>
</head>
<body>
    <h1>Please enter your Email: </h1>
    <form method="post">
        <input type="email" name="email" placeholder="Enter Email">
        <input type="submit" value="Send Email">
        
    </form>
</body>
</html>
