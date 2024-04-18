<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'care@cloudrasoi.com';
$mail->Password = 'Cloudrasoi@12345';
$mail->setFrom('care@cloudrasoi.com', 'Your Name');
$mail->addReplyTo('care@cloudrasoi.com', 'Your Name');
$mail->addAddress('ajaysheokand.as@gmail.com', 'Ajay Sheokand');
$mail->Subject = 'Checking if PHPMailer works';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'This is just a plain text message body';
//$mail->addAttachment('attachment.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}