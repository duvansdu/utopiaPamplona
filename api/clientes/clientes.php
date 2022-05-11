<?php
require_once('../autoload_api.php');
require_once('../funciones.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$autoload_api = new Autoload_api();
$clientes = new ClientesController();

if (isset($_GET['peticion'])) {
    if($_GET['peticion'] === 'crearCliente') {
        $documento = $_POST['cedula'];
        $buscar = $clientes->get($documento);
        if (count($buscar) === 0) {
            
            $new_cliente = array(
                'cli_documento'=>$_POST['cedula'],
                'cli_nombre'=>$_POST['nombres'],
                'cli_apellidos'=>$_POST['apellidos'],
                'cli_telefono'=>$_POST['telefono'],
                'cli_email'=>$_POST['email'],
                'cli_departamento'=>$_POST['departamento'],
                'cli_municipio'=>$_POST['municipio'],
                'cli_direccion'=>$_POST['direccion'],
                'cli_detalles'=>$_POST['detalles']
            );
            
            $agregar = $clientes->set($new_cliente);
            echo json_encode($agregar);
        }else{
            echo json_encode('cliente creado anteriormente');
        }
        
        
    }else if($_GET['peticion'] === 'ver'){
        $texto = $_POST['texto'];
        $ver = $clientes->traerFiltro($texto);
        echo json_encode($ver);        
    }
}
 