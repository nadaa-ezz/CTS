<?php
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

try {
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "nada.ezzdin@cts-egy.com";
$mail->Password = "Idonotfeelsafehere2023";

$mail->setFrom($email, $name);
$mail->addAddress("nada.ezzdin@cts-egy.com", "Nada");
 
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();
header("Location: sent_email.html");
} catch(Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}