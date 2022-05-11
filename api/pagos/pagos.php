<?php
require_once('payu/PayU.php');

//////////// DATOS PRUEBA //////////////
//Environment::setPaymentsCustomUrl("https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi");
//Environment::setReportsCustomUrl("https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi");
//Environment::setSubscriptionsCustomUrl("https://sandbox.api.payulatam.com/payments-api/rest/v4.9/");

//PayU::$apiKey = "4Vj8eK4rloUd272L48hsrarnUA"; //Ingrese aquí su propio apiKey.
//PayU::$apiLogin = "pRRXKOl8ikMmt9u"; //Ingrese aquí su propio apiLogin.
//PayU::$merchantId = "508029"; //Ingrese aquí su Id de Comercio.
//PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
//PayU::$isTest = true; //Dejarlo True cuando sean pruebas.
//$cuenta_id = 512321;

//////////// DATOS REALES //////////////
Environment::setPaymentsCustomUrl("https://api.payulatam.com/payments-api/4.0/service.cgi");
Environment::setReportsCustomUrl("https://api.payulatam.com/reports-api/4.0/service.cgi");
Environment::setSubscriptionsCustomUrl("https://api.payulatam.com/payments-api/rest/v4.9/");

PayU::$apiKey = "AkmcntIZ80O6Z7BzHGGq8cXWxr"; //Ingrese aquí su propio apiKey.
PayU::$apiLogin = "tSsieNEFPwzx21N"; //Ingrese aquí su propio apiLogin.
PayU::$merchantId = "943991"; //Ingrese aquí su Id de Comercio.
PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
$cuenta_id = 951489;

if ($_GET['peticion'] === 'Efectivo'){
	require_once('efectivo.php');
}else if($_GET['peticion'] === 'Credito'){
	require_once('credito.php');
}else if($_GET['peticion'] === 'PSE'){
	require_once('pse.php');
}
?>
