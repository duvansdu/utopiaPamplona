<?php
require_once('../autoload_api.php');
require_once('../funciones.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$autoload_api = new Autoload_api();
$admin = new pedidosController();
$version = time(); 

if (isset($_GET['peticion'])) {
    if($_GET['peticion'] === 'crear') {
        $ped_nombre = $_POST['ped_nombre'];
        $ped_fecha = $_POST['ped_fecha'];
        $ped_telefono = $_POST['ped_telefono'];
        $ped_descripcion = $_POST['ped_descripcion'];
        $ped_total = $_POST['ped_total'];
        $ped_abono= $_POST['ped_abono'];
        $ped_entrega = $_POST['ped_entrega'];
        
        $new_socio = array(
            'ped_id'=>0,
            'ped_nombre'=>$ped_nombre,
            'ped_fecha'=>$ped_fecha,
            'ped_telefono'=>$ped_telefono,
            'ped_descripcion'=>$ped_descripcion,
            'ped_total'=>$ped_total,
            'ped_abono'=>$ped_abono,
            'ped_saldo'=>$ped_total - $ped_abono,
            'ped_entrega'=>$ped_entrega
          );

            $crear = $admin->set($new_socio);
            echo json_encode('ok');
        }       

   
    
    else if($_GET['peticion'] === 'actualizarImg'){
        $tipoimg = $_FILES['archivo']['type'];
        $archivo = $_FILES['archivo']['tmp_name'];
        $nombVersion = $_POST['nombre'] .'-'. $version;
        $imagen = subir_imagen_usuario($tipoimg,$archivo,$_POST['nombre'],$nombVersion);
        if ($imagen === 'no es JPEG') {
            echo json_encode ("No es un jpeg");
        }else{
            $ref = $_POST['nombre'];
            $admin->actImg($ref,$imagen);
            echo json_encode($imagen);
        }     
    }else if($_GET['peticion'] === 'ver'){
        $ver = $admin->verSocios();
        echo json_encode($ver);   
    }
    else if($_GET['peticion'] === 'ver2'){
        $ref = $_POST['ref'];
        $ver2 = $admin->del($ref);
        echo json_encode($ver2);
    }
    else if($_GET['peticion'] === 'ver3'){
        $ref = $_POST['ref'];
        $ver2 = $admin->get($ref);
        echo json_encode($ver2);
    }
    else if($_GET['peticion'] === 'imprimir'){
        $ref = $_POST['ref'];
        $imprimir = $admin->imprimir($ref);
        echo json_encode($imprimir);
    }
    else if($_GET['peticion'] === 'ocupar'){
        $id = $_POST['id'];
        $ocupar = $mesa->ocuparMesa($id);
        echo json_encode($ocupar); 
    }else if($_GET['peticion'] === 'liberar'){
        $id = $_POST['id'];
        $ocupar = $mesa->liberarMesa($id);
        echo json_encode($ocupar); 
    }
   else if($_GET['peticion'] === 'actualizarSinImg'){
            $ref = $_POST['ped_id'];
            $ped_nombre = $_POST['ped_nombre'];
            $ped_telefono = $_POST['ped_telefono'];
            $ped_descripcion = $_POST['ped_descripcion'];
            $ped_total = $_POST['ped_total'];
            $ped_abono = $_POST['ped_abono'];
            $ped_saldo = $ped_total-$ped_abono;
            $ped_entrega = $_POST['ped_entrega'];
            $act = $admin->actSocSinImg($ref,$ped_nombre, $ped_telefono, $ped_descripcion, $ped_total, $ped_abono, $ped_saldo,$ped_entrega);
            echo json_encode($ped_nombre);   
    }
}
 