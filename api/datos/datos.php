<?php
require_once('../autoload_api.php');
require_once('../funciones.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$autoload_api = new Autoload_api();
$datos = new DatosController();

if (isset($_GET['peticion'])) {
    if($_GET['peticion'] === 'ver'){
        $texto = $_POST['nombre'];
        $ver = $datos->verNombre($texto);
        echo json_encode($ver);        
    }
}
 