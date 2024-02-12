<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../..//lib/phpmailer/src/Exception.php';
require '../..//lib/phpmailer/src/PHPMailer.php';
require '../..//lib/phpmailer/src/SMTP.php';


   $mailer = new PHPMailer(true);
    $mailer->isSMTP();
    $mailer->Host = 'mail.jrspeed.com.ph';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'noreply@jrspeed.com.ph';
    $mailer->Password = 'xQuZ^qHo}s#M';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 26;
    $mailer->setFrom('noreply@jrspeed.com.ph','JRSPEEDPH');
$mailer->SMTPDebug = 2;
    $mailer->addAddress($_POST['email_to']);
    $mailer->isHTML(true);
    $mailer->Subject =$_POST['subject'];
    $mailer->Body = $_POST['body'];
    
    $mailer->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
    $mailer->send();
echo 1;
