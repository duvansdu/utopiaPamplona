<?php
require_once('../autoload_api.php');
require_once('../funciones.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$autoload_api = new Autoload_api();
$imagenes = new ImagenesController();

if (isset($_GET['peticion'])) {
    if($_GET['peticion'] === 'crearIMG') {
        $id = $_POST['id'];
        $ref = $_POST['ref'];
        $tipoimg= $_FILES['archivoImg']['type'];
        $archivo = $_FILES['archivoImg']['tmp_name'];
        $imagen = subir_imagen($tipoimg,$archivo,$id,$ref);

        if ($imagen === 'no es JPEG') {
            echo json_encode ("No es un jpeg");
        }else{
            $new_foto = array(
                'img_id'=>0,
                'hab_ref'=>$id,
                'img_nombre'=>$imagen
            );
        }
        $agregar = $imagenes->set($new_foto);
        echo json_encode($agregar); 
    }else if($_GET['peticion'] === 'verProductos'){
        $ref = $_POST['id'];
        $ver = $imagenes->imgPro($ref);
        echo json_encode($ver);  
    }else if($_GET['peticion'] === 'eliminar'){
        $ref = $_POST['id'];
        $ver = $imagenes->del($ref);
        echo json_encode($ver);  
    }
}
 