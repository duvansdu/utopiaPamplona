<?php
require_once('../autoload_api.php');
$autoload_api = new Autoload_api();
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
///////////////////////////////////////
//////////////////////////////////////


    $texto = $_POST['text'];
    $fecha = $_POST['fecha'];
    $new_busqueda = array(
        'bus_id'=>0,
        'bus_fecha'=>$fecha,
        'bus_texto'=>$texto
      );
    
    $busquedas = new BusquedasController();
    $agregar = $busquedas->set($new_busqueda);
    echo json_encode('busqueda guardada');
    