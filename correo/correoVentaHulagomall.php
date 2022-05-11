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
    $ref = $_POST['ref'];
    $nombre = $_POST['nombre'];
    $detalles = $_POST['detalles'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $emailVendedor = $_POST['emailVendedor'];
    $formaPago = $_POST['formaPago'];
    $lista = $_POST['lista'];

    if ($formaPago === 'nequi' or $formaPago === 'bancolombia' or $formaPago === 'daviplata') {
        $asunto = 'Venta Pendiente en HULAGOMALL';
        $cuerpo = '
        <p>Posible venta por medio de '.$formaPago.' por <br><b>'.$domain.'</b> verificar el PAGO</p>
        
        <h3>productos</h3>
        <div>lista de compra '.$lista.'</div><br><br>
        <h3>Datos del comprador</h3>
        <ul>
            <li>Nombre: '. $nombreComprador .'</li>
            <li>Telefono: '. $telefonoComprador .'</li>
            <li>Email: '. $emailComprador .'</li>
            <h4>datos de envio</h4>
            <li>Departamento: '. $departamentoComprador .'</li>
            <li>Municipio: '. $municipioComprador .'</li>
            <li>Direccion: '. $direccionComprador .'</li>
            <li>Detalles direccion: '. $detallesComprador .'</li>
        </ul>

        <h3>Datos vendedor</h3>
        <ul>
            <li>:Email: '. $emailVendedor.'</li>
        </ul>

        <h4>Por favor alistar el producto para el envío</h4>
        ';
    }else if ($formaPago === 'contraentrega') {
        $asunto = 'Venta PAGO CONTRAENTREGA en HULAGOMALL';
        $cuerpo = '
        <p>Venta por medio de '.$formaPago.' por <br><b>'.$domain.'</b> verificar el PAGO</p>
        
        <h3>productos</h3>
        <div>lista de compra '.$lista.'</div><br><br>
        <h3>Datos del comprador</h3>
        <ul>
            <li>Nombre: '. $nombreComprador .'</li>
            <li>Telefono: '. $telefonoComprador .'</li>
            <li>Email: '. $emailComprador .'</li>
            <h4>datos de envio</h4>
            <li>Departamento: '. $departamentoComprador .'</li>
            <li>Municipio: '. $municipioComprador .'</li>
            <li>Direccion: '. $direccionComprador .'</li>
            <li>Detalles direccion: '. $detallesComprador .'</li>
        </ul>

        <h3>Datos vendedor</h3>
        <ul>
            <li>:Email: '. $emailVendedor.'</li>
        </ul>

        <h4>Por favor alistar el producto para el envío</h4>
        ';
    }else{
        $asunto = 'Venta exitosa en HULAGOMALL';
        $cuerpo = '
        <p>Venta exitosa por medio de '.$formaPago.' en <br><b>'.$domain.'</b></p>
        <b>Foma de pago '.$formaPago.'</b>
        <h3>productos</h3>
        <div>lista de compra '.$lista.'</div><br><br>
        <h3>Datos del comprador</h3>
        <ul>
            <li>Nombre: '. $nombreComprador .'</li>
            <li>Telefono: '. $telefonoComprador .'</li>
            <li>Email: '. $emailComprador .'</li>
            <h4></h4>
            <li>Departamento: '. $departamentoComprador .'</li>
            <li>Municipio: '. $municipioComprador .'</li>
            <li>Direccion: '. $direccionComprador .'</li>
            <li>Detalles direccion: '. $detallesComprador .'</li>
        </ul>

        <h3>Datos vendedor</h3>
        <ul>
            <li>:Email: '. $emailVendedor.'</li>
        </ul>

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
    $mail->Username = 'contacto@hulagomall.com';                     // SMTP username
    $mail->Password = 'Hulagom4ll';                               // SMTP password
    $mail->SMTPSecure = 'tls';  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587;                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('contacto@hulagomall.com', 'HULAGOMALL');
    $mail->addAddress('morenocotej@gmail.com');
    $mail->addAddress('yosoysdu@gmail.com');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;

    $mail->send()

?>