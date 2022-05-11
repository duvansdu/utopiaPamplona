<?php
require_once('../autoload_api.php');

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$autoload_api = new Autoload_api();
$pedido = new PedidosController();
///////////////////////////////////////
//////////////////////////////////////

if (isset($_GET['peticion'])) {
    if($_GET['peticion'] === 'crear') {
        $cedula = $_POST['cedulaComprador'];
        $datosEnvio = $_POST['datosEnvio'];
        $listaCompra = $_POST['listaCompra'];
        $precioPedido = $_POST['precioPedido'];
        $orderId = $_POST['orderId'];
        $fechaCompra = $_POST['fechaCompra'];
        $transactionId = $_POST['transactionId'];
        $forma_pago = $_POST['formaPago'];
        $estadoEpayco = $_POST['estadoEpayco'];

        $new_pedido = array(
            'ped_id'=>$_POST['id'],
            'cli_documento'=>$cedula,
            'ped_datosEnvio'=>$datosEnvio,
            'ped_fecha_compra'=>$fechaCompra,
            'ped_valor_productos'=>$precioPedido,
            'ped_valor_flete'=>0,
            'ped_valor_total'=>$precioPedido,
            'ped_forma_pago'=>$forma_pago,
            'ped_IDorden_epayco'=>$orderId,
            'ped_estado_epayco'=>$estadoEpayco,
            'ped_estadoUtopia'=>'en bodega'
          );

        $crear = $pedido->set($new_pedido);
        echo json_encode($crear);  
    }elseif($_GET['peticion'] === 'crear'){
        
    }
}
 