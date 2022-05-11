<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';

//error_reporting(0);
$email = $_POST['email'];
$whatsapp = $_POST['whatsapp'];
$name = $_POST['name'];
$asunto = $_POST['asunto'];
$domain = $_SERVER["HTTP_HOST"];

$mail = new PHPMailer(true);
//Server settings
                     // Enable verbose debug output
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();               
                    // Send using SMTP
$mail->Host = 'smtp.hostinger.co';                 // Set the SMTP server to send through
$mail->SMTPAuth = true;                                   // Enable SMTP authentication
$mail->Username = 'contacto@utopia.com';                     // SMTP username
$mail->Password = 'contraseña';                               // SMTP password
$mail->SMTPSecure = 'tls';  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port = 587;                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
$mail->setFrom('contacto@utopia.com', 'utopia');
$mail->addAddress('cambiar acorreo que recibe', 'utopia');

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $asunto;
$mail->Body    = '
<p>Datos enviados desde el formulario del sitio <b>'.$domain.'</b></p>
<ul>
    <li>Nombre: '.$name.'</li>
    <li>Email: '.$email.'</li>
    <li>WhatsApp: '.$whatsapp.'</li>
    <li>Asunto: '.$asunto.'</li>
</ul>
';
$mail->send();
?>