<?php
$name = $_POST["name"];
$mobile_num = $_POST["mobile_num"];
$email =  $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$response = "Thank you, $name! Your request has been received.";
print_r($email);

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

$mail->Username = "info@cts-egy.com";
$mail->Password = "Cm67<7qhq";

$mail->setFrom($email, $name);
$mail->addAddress("info@cts-egy.com");
 
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = "Service:  ".$subject. "<br/>"."Name:  ".$name."<br/>"."Mobile Number:  ". $mobile_num["full_number"]."<br/>". "Message:  ".$message ;
//$mail->Body = "Service:  ".$subject. "<br/>"."Name:  ".$name."<br/>"."<br/>". "Message:  ".$message ;
$mail->send();

//header("Location: sent_email.html");
//echo " Message have been sent";
echo $response;

} catch(Exception $e) {
    echo "Sorry, message could not be sent.";
}


    
