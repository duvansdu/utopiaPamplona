<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'autoload_api.php';
require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';

    //error_reporting(0);
    $domain = $_SERVER["HTTP_HOST"];
    $emailComprador = $_POST['emailComprador'];
    $nombreComprador = $_POST['nombreComprador'];
    $apellidoComprador = $_POST['apellidoComprador'];
    $ordenId = $_POST['orderId'];
    $transactionId = $_POST['transactionId'];
    $valorPagado = $_POST['valorPagado'];
    $listaCompra = $_POST['listaCompra'];  
    $formaPago = $_POST['formaPago'];

    if ($formaPago === 'nequi' or $formaPago === 'bancolombia') {
        $asunto = 'Compra Pendiente en HULAGOMALL';
        $cuerpo = '
            <p><b>'.$nombreComprador.'</b> debes transferir a '.$formaPago.' para completar la compra en <br><b>'.$domain.'</b> </p>
            <h3>DATOS DE LA CUENTA '.$formaPago.'</h3>
            <ul>
                <li>CELULAR: 3046236417</li>
                <li>CANTIDAD: '.$valorPagado.'</li>
                <li>MENSAJE: '.$nombreComprador.' '.$apellidoComprador.'</li>
            </ul>
            <p>Despues de realizar la transaccion envianos la captura del pago a nuestra linea de whatsapp +57 3046236417</p>
            <p>Su pedido entra a proceso de despacho de 1 a 5 días habiles</p>
            <p>Su pedido se enviará contraentrega</p>
            <label>Mi compra</label>
            <div>'.$listaCompra.'</div><br><br>
                <h3>Preguntas</h3>
                <p>www.hulagomall.com</p>
                <p>Telefono: 3102294954 - 3046236417</p>
                <p>Correo Eléctronico = contacto@hulagomall.com</p>
        ';
    }else if ($formaPago === 'daviplata') {
        $asunto = 'Compra Pendiente en HULAGOMALL';
        $cuerpo = '
            <p><b>'.$nombreComprador.'</b> debes transferir a '.$formaPago.' para completar la compra en <br><b>'.$domain.'</b> </p>
            <h3>DATOS DE LA CUENTA '.$formaPago.'</h3>
            <ul>
                <li>CELULAR: 3102294954</li>
                <li>CEDULA: 88034965</li>
                <li>CANTIDAD: '.$valorPagado.'</li>
            </ul>
            <p>Despues de realizar la transaccion envianos la captura del pago a nuestra linea de whatsapp +57 3102294954</p>
            <p>Su pedido entra a proceso de despacho de 1 a 5 días habiles después de realizar el pago</p>
            <p>Su pedido se enviará contraentrega</p>
            <label>Mi compra</label>
            <div>'.$listaCompra.'</div><br><br>
                <h3>Preguntas</h3>
                <p>www.hulagomall.com</p>
                <p>Telefono: 3102294954 - 3046236417</p>
                <p>Correo Eléctronico = contacto@hulagomall.com</p>
        ';
    }else if ($formaPago === 'contraentrega') {
        $asunto = 'Compra PAGO CONTRAENTREGA en HULAGOMALL';
        $cuerpo = '
            <p>Su pedido entra a proceso de despacho de 1 a 5 días habiles despues de verificar tus datos.</p>
            <p>Envío gratis</p>
            <label>Mi compra</label>
            <div>'.$listaCompra.'</div><br><br>
                <h3>Preguntas</h3>
                <p>www.hulagomall.com</p>
                <p>Telefono: 3102294954 - 3046236417</p>
                <p>Correo Eléctronico = contacto@hulagomall.com</p>
        ';
    }else{
        $asunto = 'Compra exitosa en HULAGOMALL';
        $cuerpo = '
            <p>Gracias <b>'.$nombreComprador.'</b> por tu compra en <br><b>'.$domain.'</b></p>
            <ul>
                <li>Orden ID: '.$ordenId.'</li>
                <li>Transacción ID: '.$transactionId.'</li>
                <li>Valor pagado: '.$valorPagado.'</li>
                <li>lista de compra '.$listaCompra.'</li>
            </ul>
            <br>
            <p>Su pedido entra a proceso de despacho de 1 a 5 días habiles</p>
            <p>Su pedido se enviará contraentrega</p>
            <h3>Si tienes dudas te dejamos los datos de HULAGOMALL</h3>
                <p>Telefono: 3102294954</p>
                <p>Correo Eléctronico = a definir</p>
                <p>WhatsApp: 3102294954</p>
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
    $mail->setFrom('contacto@utopiadesings.com', 'UTOPIA DESINGS');
    $mail->addAddress($emailComprador);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;

    $mail->send();
?>