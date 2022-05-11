<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';

    //error_reporting(0);
    $domain = $_SERVER["HTTP_HOST"];
    $emailComprador = $_POST['emailComprador'];
    $nombreComprador = $_POST['nombreComprador'];
    $telefonoComprador = $_POST['telefonoComprador'];
    $departamentoComprador = $_POST['departamentoComprador'];
    $municipioComprador = $_POST['municipioComprador'];
    $direccionComprador = $_POST['direccionComprador'];
    $detallesComprador = $_POST['detallesComprador'];
    $lista = $_POST['lista'];
    $emailVendedor = $_POST['emailVendedor'];  
    $formaPago = $_POST['formaPago'];
    $valorPagado = $_POST['valorPagado'];

    if ($formaPago === 'nequi' or $formaPago === 'bancolombia' or $formaPago === 'daviplata') {
        $asunto = 'Venta Pendiente en HULAGOMALL';
        $cuerpo = '
        <p>Venta pendiente por pago <br><b>'.$domain.'</b></p>
        <h3>datos del producto vendido</h3>
        <ul>
            <div>lista de compra '.$lista.'</div><br><br>
        </ul>
        <h3>total compra: '.$valorPagado.'</h3>
        ';
    }else if ($formaPago === 'contraentrega') {
        $asunto = 'Venta PAGO CONTRAENTREGA en HULAGOMALL';
        $cuerpo = '
        <p>Venta PAGO CONTRAENTREGA en  <br><b>'.$domain.'</b></p>
        <h3>datos del producto vendido</h3>
        <ul>
            <div>lista de compra '.$lista.'</div><br><br>
        </ul>
        <h3>total compra: '.$valorPagado.'</h3>
        ';
    else{
        $asunto = 'Venta exitosa en HULAGOMALL';
        $cuerpo = '
        <p>Venta exitosa en <br><b>'.$domain.'</b></p>
        <h3>datos del producto vendido</h3>
        <ul>
            <div>lista de compra '.$lista.'</div><br><br>
        </ul>
        <h3>total compra: '.$valorPagado.'</h3>
        <h4>Por favor alistar el producto para el envío</h4>
        ';
    }
    
    $mail = new PHPMailer(true);
    //Server settings
                         // Enable verbose debug output
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();               
                        // Send using SMTP
    $mail->Host = 'smtp.hostinger.co';                 // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'contacto@utopiadesing.com';                     // SMTP username
    $mail->Password = 'contraseña';                               // SMTP password
    $mail->SMTPSecure = 'tls';  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587;                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('contacto@utopiadesing.com', 'UTOPIADESINGS');
    $mail->addAddress($emailVendedor);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;

    $mail->send()

?>