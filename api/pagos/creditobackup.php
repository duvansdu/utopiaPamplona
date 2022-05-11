<?php
$parameters = array(
    //Ingrese aquí el identificador de la cuenta.
    PayUParameters::ACCOUNT_ID => "512321",
    //Ingrese aquí el código de referencia.
    PayUParameters::REFERENCE_CODE => "referencia",
    //Ingrese aquí la descripción.
    PayUParameters::DESCRIPTION => "payment test",

    // -- Valores --
    //Ingrese aquí el valor de la transacción.
    PayUParameters::VALUE => 20000,
    //Ingrese aquí el valor del IVA (Impuesto al Valor Agregado solo valido para Colombia) de la transacción,
    //si se envía el IVA nulo el sistema aplicará el 19% automáticamente. Puede contener dos dígitos decimales.
    //Ej: 19000.00. En caso de no tener IVA debe enviarse en 0.
    PayUParameters::TAX_VALUE => "3193",
    //Ingrese aquí el valor base sobre el cual se calcula el IVA (solo valido para Colombia).
    //En caso de que no tenga IVA debe enviarse en 0.
    PayUParameters::TAX_RETURN_BASE => "16806",
    //Ingrese aquí la moneda.
    PayUParameters::CURRENCY => "COP",

    // -- Comprador
    //Ingrese aquí el nombre del comprador.
    PayUParameters::BUYER_NAME => "First name and second buyer name",
    //Ingrese aquí el email del comprador.
    PayUParameters::BUYER_EMAIL => "buyer_test@test.com",
    //Ingrese aquí el teléfono de contacto del comprador.
    PayUParameters::BUYER_CONTACT_PHONE => "7563126",
    //Ingrese aquí el documento de contacto del comprador.
    PayUParameters::BUYER_DNI => "5415668464654",
    //Ingrese aquí la dirección del comprador.
    PayUParameters::BUYER_STREET => "calle 100",
    PayUParameters::BUYER_STREET_2 => "5555487",
    PayUParameters::BUYER_CITY => "Medellin",
    PayUParameters::BUYER_STATE => "Antioquia",
    PayUParameters::BUYER_COUNTRY => "CO",
    PayUParameters::BUYER_POSTAL_CODE => "000000",
    PayUParameters::BUYER_PHONE => "7563126",

    // -- pagador --
    //Ingrese aquí el nombre del pagador.
    PayUParameters::PAYER_NAME => "jairo moreno",
    //Ingrese aquí el email del pagador.
    PayUParameters::PAYER_EMAIL => "payer_test@test.com",
    //Ingrese aquí el teléfono de contacto del pagador.
    PayUParameters::PAYER_CONTACT_PHONE => "7563126",
    //Ingrese aquí el documento de contacto del pagador.
    PayUParameters::PAYER_DNI => "5415668464654",
    //Ingrese aquí la dirección del pagador.
    PayUParameters::PAYER_STREET => "calle 93",
    PayUParameters::PAYER_STREET_2 => "125544",
    PayUParameters::PAYER_CITY => "Bogota",
    PayUParameters::PAYER_STATE => "Bogota",
    PayUParameters::PAYER_COUNTRY => "CO",
    PayUParameters::PAYER_POSTAL_CODE => "000000",
    PayUParameters::PAYER_PHONE => "7563126",

    // -- Datos de la tarjeta de crédito --
    //Ingrese aquí el número de la tarjeta de crédito
    PayUParameters::CREDIT_CARD_NUMBER => "4097440000000004",
    //Ingrese aquí la fecha de vencimiento de la tarjeta de crédito
    PayUParameters::CREDIT_CARD_EXPIRATION_DATE => "2020/12",
    //Ingrese aquí el código de seguridad de la tarjeta de crédito
    PayUParameters::CREDIT_CARD_SECURITY_CODE=> "321",
    //Ingrese aquí el nombre de la tarjeta de crédito
    //VISA||MASTERCARD||AMEX||DINERS
    PayUParameters::PAYMENT_METHOD => "VISA",

    //Ingrese aquí el número de cuotas.
    PayUParameters::INSTALLMENTS_NUMBER => "1",
    //Ingrese aquí el nombre del pais.
    PayUParameters::COUNTRY => PayUCountries::CO,

    //Session id del device.
    PayUParameters::DEVICE_SESSION_ID => "vghs6tvkcle931686k1900o6e1",
    //IP del pagadador
    PayUParameters::IP_ADDRESS => "127.0.0.1",
    //Cookie de la sesión actual.
    PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
    //Cookie de la sesión actual.
    PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
);

$response = PayUPayments::doAuthorizationAndCapture($parameters);

if ($response) {
    $response->transactionResponse->orderId;
    $response->transactionResponse->transactionId;
    $response->transactionResponse->state;
    if ($response->transactionResponse->state=="PENDING") {
        $response->transactionResponse->pendingReason;
    }
}

echo json_encode($response);
?>


$parameters = array(
	//Ingrese aquí el identificador de la cuenta.
	PayUParameters::ACCOUNT_ID => $cuenta_id,
	//Ingrese aquí el código de referencia.
	PayUParameters::REFERENCE_CODE => "reference",
	//Ingrese aquí la descripción.
	PayUParameters::DESCRIPTION => "producto hulagomall",

        // -- Valores --
        //Ingrese aquí el valor de la transacción.
        PayUParameters::VALUE => $value,
        //Ingrese aquí el valor del IVA (Impuesto al Valor Agregado solo valido para Colombia) de la transacción,
        //si se envía el IVA nulo el sistema aplicará el 19% automáticamente. Puede contener dos dígitos decimales.
        //Ej: 19000.00. En caso de no tener IVA debe enviarse en 0.
        PayUParameters::TAX_VALUE => 0,
        //Ingrese aquí el valor base sobre el cual se calcula el IVA (solo valido para Colombia).
        //En caso de que no tenga IVA debe enviarse en 0.
        PayUParameters::TAX_RETURN_BASE => 0,
	//Ingrese aquí la moneda.
	PayUParameters::CURRENCY => "COP",

	// -- Comprador
	//Ingrese aquí el nombre del comprador.
	PayUParameters::BUYER_NAME => $nombresComprador . '' .$apellidosComprador,
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
	//Ingrese aquí el email del pagador.
	PayUParameters::PAYER_EMAIL => $emailPagador,
	//Ingrese aquí el teléfono de contacto del pagador.
	PayUParameters::PAYER_CONTACT_PHONE => $telefonoPagador,
	//Ingrese aquí el documento de contacto del pagador.
	PayUParameters::PAYER_DNI => $cedulaPagador,
	//Ingrese aquí la dirección del pagador.
	PayUParameters::PAYER_STREET => "calle 93",
	PayUParameters::PAYER_STREET_2 => "125544",
	PayUParameters::PAYER_CITY => "Bogota",
	PayUParameters::PAYER_STATE => "Bogota",
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