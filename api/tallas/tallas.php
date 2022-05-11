<?php
require_once('../autoload_api.php');
$autoload_api = new Autoload_api();
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
///////////////////////////////////////
//////////////////////////////////////

if (isset($_GET['peticion'])) {
    if ($_GET['peticion'] === 'restarinventario') {
        $ref = $_POST['refe'];
        $talla = $_POST['tall'];
        $actualizar = new TallasController();
        $actualizarTalla = $actualizar->actualizarTalla($ref,$talla);
    }else if($_GET['peticion'] === 'cantidad'){
        $ref = $_POST['refe'];
        $talla = $_POST['tall'];
        $buscar = new TallasController();
        $buscarCant = $buscar->buscarCantidad($ref,$talla);
        echo json_encode($buscarCant); 
    }else if($_GET['peticion'] === 'sumarTodoActualizar'){
        $ref = $_POST['refe'];
        $talla = $_POST['tall'];
        $cantidad = $_POST['cant'];
        $cantidadencarrito = $_POST['cantencarro'];
        $act = new TallasController();
        $actCant = $act->sumarTodoActualizarCantidad($ref,$talla,$cantidad,$cantidadencarrito);
        echo json_encode('se actualizó la cantidad');
    }else if($_GET['peticion'] === 'sumarActualizar'){
        $ref = $_POST['refe'];
        $talla = $_POST['tall'];
        $cantidad = $_POST['cant'];
        $act = new TallasController();
        $actCant = $act->sumarActualizarCantidad($ref,$talla,$cantidad);
        echo json_encode('se actualizó la cantidad');
    }else if($_GET['peticion'] === 'restarActualizar'){
        $ref = $_POST['refe'];
        $talla = $_POST['tall'];
        $cantidadCarrito = $_POST['cantCarrito'];
        $cantidadBD = $_POST['cantDB'];
        $act = new TallasController();
        $actCant = $act->restarActualizarCantidad($ref,$talla,$cantidadCarrito,$cantidadBD);
        echo json_encode('ref '.$ref.' talla '.$talla.' cantidad '. $cantidad);
    }else{ 
        $id = $_GET['peticion'];
        $talla = new TallasController();
        $datos = $talla->traerTallas($id);
        echo json_encode($datos);
    }
}
 