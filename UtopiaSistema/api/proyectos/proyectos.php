<?php
require_once('../autoload_api.php');
require_once('../funciones.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$autoload_api = new Autoload_api();
$proyecto = new ProyectosController();
$version = time();

if (isset($_GET['peticion'])) {
    if($_GET['peticion'] === 'crear') {
        $idProyecto = $version;
        $tipoimg= $_FILES['archivoImg']['type'];
        $archivo = $_FILES['archivoImg']['tmp_name'];
        $imagen = subir_imagen($tipoimg,$archivo,$idProyecto,$_POST['nombre']);

        if ($imagen === 'no es JPEG') {
            echo json_encode ("No es un jpeg");
        }else{
            $new_proy = array(
                'pry_id'=>0,
                'mom_id'=>$_POST['tipo'],
                'pry_img'=>$imagen,
                'pry_nombre'=>$_POST['nombre'],
                'pry_contenido'=>$_POST['descripcion'],
                'prov_estado'=>'activo'
            );
        }
        $agregar = $proyecto->set($new_proy);
        echo json_encode($agregar);
    }else if($_GET['peticion'] === 'traer'){
        $traer = $proyecto->get();
        echo json_encode($traer);        
    }else if($_GET['peticion'] === 'ver'){
        $texto = $_POST['texto'];
        $ver = $proyecto->traerFiltro($texto);
        echo json_encode($ver);        
    }else if($_GET['peticion'] === 'buscarPro'){
        $id = $_POST['id'];
        $ver = $proyecto->get($id);
        echo json_encode($ver);        
    }else if($_GET['peticion'] === 'actualizarConImg'){
        $ref = $_POST['refPro'];
        $tipoimg = $_FILES['archivoPro']['type'];
        $archivo = $_FILES['archivoPro']['tmp_name'];
        $nombVersion = $_POST['refPro'] .'-'. $version;
        $imagen = subir_imagen($tipoimg,$archivo,$ref,$nombVersion);
        
        if ($imagen === 'no es JPEG') {
            echo json_encode ("No es un jpeg");
        }else{
            $ref = $_POST['refPro'];
            $nombre = $_POST['nombre'];
            $contenido = $_POST['informacion'];
            $prodActivo = $_POST['activar'];
            $act = $proyecto->actPro($ref, $nombre, $contenido, $imagen, $prodActivo);
            echo json_encode($act);
        }  
    }else if($_GET['peticion'] === 'actualizarSinImg'){
            $ref = $_POST['refPro'];
            $nombre = $_POST['nombre'];
            $contenido = $_POST['informacion'];
            $prodActivo = $_POST['activar'];
            $act = $proyecto->actProSinImg($ref, $nombre, $contenido, $prodActivo);
            echo json_encode($act);   
    }else if($_GET['peticion'] === 'verProducto'){
        $id = $_POST['id'];
        $ver = $proyecto->get($id);
        echo json_encode($ver);
    }else if($_GET['peticion'] === 'filtrar'){
        $texto = $_POST['texto'];
        $ver = $proyecto->traerProductosFiltro($texto);
        echo json_encode($ver);
    }else if($_GET['peticion'] === 'proyectoMomento'){
        $id = $_POST['momento'];
        $ver = $proyecto->traerProyectoMomento($id);
        echo json_encode($ver);
    }
}
 