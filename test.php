<?php
 require_once ("PHPMailer-master/PHPMailerAutoload.php");
 
$mail = new PHPMailer(); // create a new object

$mail->IsSMTP(); // enable SMTP

$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only

$mail->SMTPAuth = true; // authentication enabled

$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail

//$mail->SMTPSecure = 'tls';

$mail->Host = "smtp.gmail.com";

$mail->Port = 465; // or 587

$mail->IsHTML(true);

$mail->Username = "xxxxxx@gmail.com";
$mail->Password = "xxxxx";
$mail->SetFrom("xxxxx@gmail.com");
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['body'];
$mail->AddAddress($_POST['email']);
 if(!$mail->Send())
    {

        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    echo "Message has been sent";
    }
?>