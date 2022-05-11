<?php
$nombresComprador=$_POST['nombres'];
$apellidosComprador=$_POST['apellidos'];
$cedulaComprador=$_POST['cedula'];
$telefonoComprador=$_POST['telefono'];
$emailComprador=$_POST['email'];
$departamentoComprador=$_POST['departamento'];
$municipioComprador=$_POST['municipio'];
$direccionComprador=$_POST['direccion'];
$detallesDirComprador=$_POST['detalles'];
$forma_pago = $_POST['formaPago'];
$value = $_POST['valortotal'];
$postal = $_POST['postal'];
$TTarjeta = $_POST['TTarjeta'];
$Ntarjeta = $_POST['Ntarjeta'];
$Nseguridad = $_POST['Nseguridad'];
$expiration = $_POST['expiration'];
$Ncoutas = $_POST['Ncoutas'];
$reference = 'HOTELVASCONIACENTER_'.time();
//datospagador
$cedulaPagador = $_POST['cedulaPagador'];
$nombresPagador = $_POST['nombresPagador'];
$apellidosPagador = $_POST['apellidosPagador'];
$telefonoPagador = $_POST['telefonoPagador'];
$emailPagador = $_POST['emailPagador'];
$userAgente = $_POST['userAgente'];

$parameters = array(
    //Ingrese aquí el identificador de la cuenta.
    PayUParameters::ACCOUNT_ID => $cuenta_id,
    //Ingrese aquí el código de referencia.
    PayUParameters::REFERENCE_CODE => $reference,
    //Ingrese aquí la descripción.
    PayUParameters::DESCRIPTION => "Reservas Hotel Vasconia Center",

    // -- Valores --
    //Ingrese aquí el valor de la transacción.
    PayUParameters::VALUE => $value,
    //Ingrese aquí el valor del IVA (Impuesto al Valor Agregado solo valido para Colombia) de la transacción,
    //si se envía el IVA nulo el sistema aplicará el 19% automáticamente. Puede contener dos dígitos decimales.
    //Ej: 19000.00. En caso de no tener IVA debe enviarse en 0.
    PayUParameters::TAX_VALUE => null,
    //Ingrese aquí el valor base sobre el cual se calcula el IVA (solo valido para Colombia).
    //En caso de que no tenga IVA debe enviarse en 0.
    PayUParameters::TAX_RETURN_BASE => 0,
    //Ingrese aquí la moneda.
    PayUParameters::CURRENCY => "COP",

    // -- Comprador
    //Ingrese aquí el nombre del comprador.
    PayUParameters::BUYER_NAME => $nombresComprador . ' ' . $apellidosComprador,
    //Ingrese aquí el email del comprador.
    PayUParameters::BUYER_EMAIL => $emailComprador,
    //Ingrese aquí el teléfono de contacto del comprador.
    PayUParameters::BUYER_CONTACT_PHONE => $telefonoComprador,
    //Ingrese aquí el documento de contacto del comprador.
    PayUParameters::BUYER_DNI => $cedulaComprador,
    //Ingrese aquí la dirección del comprador.
    PayUParameters::BUYER_STREET => $direccionComprador,
    PayUParameters::BUYER_STREET_2 => $detallesDirComprador,
    PayUParameters::BUYER_CITY => $municipioComprador,
    PayUParameters::BUYER_STATE => $departamentoComprador,
    PayUParameters::BUYER_COUNTRY => "CO",
    PayUParameters::BUYER_POSTAL_CODE => $postal,
    PayUParameters::BUYER_PHONE => $telefonoComprador,

    // -- pagador --
    //Ingrese aquí el nombre del pagador.
    PayUParameters::PAYER_NAME => $nombresPagador.' '.$apellidosPagador,
    //PayUParameters::PAYER_NAME => 'APPROVED',
    //Ingrese aquí el email del pagador.
    PayUParameters::PAYER_EMAIL => $emailPagador,
    //Ingrese aquí el teléfono de contacto del pagador.
    PayUParameters::PAYER_CONTACT_PHONE => $telefonoPagador,
    //Ingrese aquí el documento de contacto del pagador.
    PayUParameters::PAYER_DNI => $cedulaPagador,
    //Ingrese aquí la dirección del pagador.
    PayUParameters::PAYER_STREET => "direccion",
    PayUParameters::PAYER_STREET_2 => "0000",
    PayUParameters::PAYER_CITY => "colombia",
    PayUParameters::PAYER_STATE => "colombia",
    PayUParameters::PAYER_COUNTRY => "CO",
    PayUParameters::PAYER_POSTAL_CODE => $postal,
    PayUParameters::PAYER_PHONE => $telefonoPagador,

    // -- Datos de la tarjeta de crédito --
    //Ingrese aquí el número de la tarjeta de crédito
    PayUParameters::CREDIT_CARD_NUMBER => $Ntarjeta,
    //Ingrese aquí la fecha de vencimiento de la tarjeta de crédito
    PayUParameters::CREDIT_CARD_EXPIRATION_DATE => $expiration,
    //Ingrese aquí el código de seguridad de la tarjeta de crédito
    PayUParameters::CREDIT_CARD_SECURITY_CODE=> $Nseguridad,
    //Ingrese aquí el nombre de la tarjeta de crédito
    //VISA||MASTERCARD||AMEX||DINERS
    PayUParameters::PAYMENT_METHOD => $TTarjeta,

    //Ingrese aquí el número de cuotas.
    PayUParameters::INSTALLMENTS_NUMBER => $Ncoutas,
    //Ingrese aquí el nombre del pais.
    PayUParameters::COUNTRY => PayUCountries::CO,

    //Session id del device.
    PayUParameters::DEVICE_SESSION_ID => "vghs6tvkcle931686k1900o6e1",
    //IP del pagadador
    PayUParameters::IP_ADDRESS => "127.0.0.1",
    //Cookie de la sesión actual.
    PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
    //Cookie de la sesión actual.
    PayUParameters::USER_AGENT=>$userAgente
);

$response = PayUPayments::doAuthorizationAndCapture($parameters);

if ($response) {
	$response->transactionResponse->orderId;
	$response->transactionResponse->transactionId;
	$response->transactionResponse->state;
	if ($response->transactionResponse->state=="PENDING") {
		$response->transactionResponse->pendingReason;
	}
	echo json_encode($response);
}else{
	echo json_encode($response->transactionResponse->state);
}
?>