<?php
require_once('../autoload_api.php');
require_once('../funciones.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$autoload_api = new Autoload_api();
$momento = new MomentosController();
$version = time(); 

if (isset($_GET['peticion'])) {
    if($_GET['peticion'] === 'crear') {
        $mom_nombre = $_POST['nombre'];
        $mom_color = $_POST['color'];
             
        $new_momento = array(
            'mom_id'=>$version,
            'mom_nombre'=>$mom_nombre,
            'mom_color'=>$mom_color
        );

        $crear = $momento->set($new_momento);
        echo json_encode($crear);    
    }else if($_GET['peticion'] === 'actualizarImg'){
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
        $ver = $momento->get();
        echo json_encode($ver);   
    }
    else if($_GET['peticion'] === 'ver2'){
        $ref = $_POST['ref'];
        $nombre = $_POST['nombre'];
        $ver2 = $momento->del($ref);
        borrar_videos('../../admin/assets/img/socios/'.$nombre );
        echo json_encode($ver2);
    }else if($_GET['peticion'] === 'ocupar'){
        $id = $_POST['id'];
        $ocupar = $mesa->ocuparMesa($id);
        echo json_encode($ocupar); 
    }else if($_GET['peticion'] === 'liberar'){
        $id = $_POST['id'];
        $ocupar = $mesa->liberarMesa($id);
        echo json_encode($ocupar); 
    }
    else if($_GET['peticion'] === 'actualizarConImg'){
        $ref = $_POST['adm_email'];
        $tipoimg = $_FILES['archivoPro']['type'];
        $archivo = $_FILES['archivoPro']['tmp_name'];
        $nombVersion = $_POST['adm_nombre'] .'-'. $version;
        $imagen = subir_imagen_usuario($tipoimg,$archivo,$ref,$nombVersion);
        if ($imagen === 'no es JPEG') {
            echo json_encode ("No es un jpeg");
        }else{
            $ref = $_POST['adm_email'];
            $adm_pass = $_POST['adm_pass'];
            $adm_nombre = $_POST['adm_nombre'];
            $adm_subrol = $_POST['adm_subrol'];
            $adm_telefono = $_POST['adm_telefono'];
            $adm_activo = $_POST['adm_activo'];
            $adm_info = $_POST['adm_info'];
            $admin->actSoc($ref, $adm_pass, $adm_nombre , $imagen, $adm_subrol, $adm_telefono, $adm_activo, $adm_info );
            echo json_encode($adm_nombre);
        }     
    }else if($_GET['peticion'] === 'actualizar'){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $color = $_POST['color'];
            $act = $momento->actualizarMomento($id, $nombre, $color);
            echo json_encode($act);   
    }
}
 