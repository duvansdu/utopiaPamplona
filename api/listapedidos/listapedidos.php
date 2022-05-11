<?php
require_once('../autoload_api.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$autoload_api = new Autoload_api();
$nuevoListaPedido = new ListaPedidosController();
///////////////////////////////////////
//////////////////////////////////////

if (isset($_GET['peticion'])) {
    if($_GET['peticion'] === 'crearLista') {
        
        $new_listapedido = array(
            'lpe_id'=>0,
            'ped_id'=>$_POST['idPedido'],
            'pro_ref'=>$_POST['ref'],
            'lpe_cantidad'=>$_POST['cantidad'],
            'lpe_precio'=>$_POST['precio'],
            'lpe_talla'=>$_POST['talla'],
            'lpe_tipo'=>$_POST['tipo'],
            'lpe_nombre'=>$_POST['nombre']
        );

        $crear = $nuevoListaPedido->set($new_listapedido);
        echo json_encode($crear);  
        
    }else{
        
    }
}
 