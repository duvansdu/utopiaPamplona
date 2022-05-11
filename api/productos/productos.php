<?php
require_once('../autoload_api.php');
require_once('../funciones.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$autoload_api = new Autoload_api();
$productos = new ProductosController();
$talla = new TallasController(); 
$version = time();

if (isset($_GET['peticion'])) {
    if($_GET['peticion'] === 'crear') {
        $idProducto = $_POST['referencia'];
        $tipoimg= $_FILES['archivoImg']['type'];
        $archivo = $_FILES['archivoImg']['tmp_name'];
        $imagen = subir_imagen($tipoimg,$archivo,$idProducto,$_POST['nombre']);

        if ($imagen === 'no es JPEG') {
            echo json_encode ("No es un jpeg");
        }else{
            $new_prod = array(
                'pro_ref'=>$idProducto,
                'tip_id'=>$_POST['tipo'],
                'pro_nombre'=>$_POST['nombre'],
                'pro_precio'=>$_POST['precio'],
                'pro_img'=>$imagen,
                'pro_descripcion'=>$_POST['descripcion'],
                'pro_horma'=>$_POST['horma'],
                'pro_contenido_neto'=>$_POST['neto'],
                'pro_estado'=>'NUEVO',
                'pro_fechaCreacion'=>$_POST['fechaCreacion'],
                'pro_prioridad'=>'',
                'pro_activo'=>'SI'
            );
        }
        $agregar = $productos->set($new_prod);

        if($_POST['tipo'] === '1' or $_POST['tipo'] === '2'){
          if (isset($_POST['tallaXS']) AND $_POST['tallaXS'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'XS',
              'talla_cantidad'=>$_POST['catidadTallaXS']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['tallaS']) AND $_POST['tallaS'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'S',
              'talla_cantidad'=>$_POST['catidadTallaS']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['tallaM']) AND $_POST['tallaM'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'M',
              'talla_cantidad'=>$_POST['catidadTallaM']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['tallaL']) AND $_POST['tallaL'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'L',
              'talla_cantidad'=>$_POST['catidadTallaL']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['tallaXL']) AND $_POST['tallaXL'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'XL',
              'talla_cantidad'=>$_POST['catidadTallaXL']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['tallaXXL']) AND $_POST['tallaXXL'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'XXL',
              'talla_cantidad'=>$_POST['catidadTallaXXL']
            );
            $subirTalla = $talla->set($new_talla);
          }
          for ($j=1; $j < 40; $j++) { 
            if(isset($_POST['talla'.$j.'']) AND $_POST['talla'.$j.''] === 'on'){
              $new_talla = array(
                'talla_id'=>0,
                'pro_ref'=>$idProducto,
                'talla_numero'=>$j,
                'talla_cantidad'=>$_POST['cantidadTalla'.$j.'']
              );
              $subirTalla = $talla->set($new_talla); 
            }
          }
        }else if($_POST['tipo'] === ''){
          if (isset($_POST['talla5anos']) AND $_POST['talla5anos'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'Talla 5 años',
              'talla_cantidad'=>$_POST['catidadTalla5anos']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['talla10anos']) AND $_POST['talla10anos'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'Talla 10 años',
              'talla_cantidad'=>$_POST['catidadTalla10anos']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['talla14anos']) AND $_POST['talla14anos'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'Talla 14 años',
              'talla_cantidad'=>$_POST['catidadTalla14anos']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['tallaS']) AND $_POST['tallaS'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'Talla S',
              'talla_cantidad'=>$_POST['catidadTallaS']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['tallaM']) AND $_POST['tallaM'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'Talla M',
              'talla_cantidad'=>$_POST['catidadTallaM']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['tallaL']) AND $_POST['tallaL'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'Talla L',
              'talla_cantidad'=>$_POST['catidadTallaL']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['tallaXL']) AND $_POST['tallaXL'] === 'on') {
            $new_talla = array(
              'talla_id'=>0,
              'pro_ref'=>$idProducto,
              'talla_numero'=>'Talla XL',
              'talla_cantidad'=>$_POST['catidadTallaXL']
            );
            $subirTalla = $talla->set($new_talla);
          }
          if (isset($_POST['TallaUnica']) AND $_POST['TallaUnica'] === 'on') {
            $new_talla = array(
              'talla_id'=>0, 
              'pro_ref'=>$idProducto,
              'talla_numero'=>'Talla Unica',
              'talla_cantidad'=>$_POST['catidadTallaUnica']
            );
            $subirTalla = $talla->set($new_talla);
          }
        }else if($_POST['tipo'] === ''){
            for ($j=1; $j < 40; $j++) { 
                if(isset($_POST['talla'.$j.'']) AND $_POST['talla'.$j.''] === 'on'){
                  $new_talla = array(
                    'talla_id'=>0,
                    'pro_ref'=>$idProducto,
                    'talla_numero'=>'Talla '.$j.'',
                    'talla_cantidad'=>$_POST['cantidadTalla'.$j.'']
                  );
                  $subirTalla = $talla->set($new_talla); 
                }
            }
            for ($j=19; $j < 46; $j++) { 
                if(isset($_POST['talla'.$j.'']) AND $_POST['talla'.$j.''] === 'on'){
                $new_talla = array(
                    'talla_id'=>0,
                    'pro_ref'=>$idProducto,
                    'talla_numero'=>'Talla '.$j.'',
                    'talla_cantidad'=>$_POST['catidadTalla'.$j.'']
                );
                $subirTalla = $talla->set($new_talla);
            }
          }
        }
        echo json_encode($agregar);
    }else if($_GET['peticion'] === 'traer'){
        $traer = $productos->get();
        echo json_encode($traer);        
    }else if($_GET['peticion'] === 'ver'){
        $texto = $_POST['texto'];
        $ver = $productos->traerFiltro($texto);
        echo json_encode($ver);        
    }else if($_GET['peticion'] === 'buscarPro'){
        $id = $_POST['id'];
        $ver = $productos->get($id);
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
            $precio = $_POST['precio'];
            $contenido = $_POST['informacion'];
            $horma = $_POST['horma'];
            $contenidoNeto = $_POST['contenidoNeto'];
            $prodActivo = $_POST['activar'];
            $act = $productos->actPro($ref, $nombre, $precio, $contenido, $horma, $contenidoNeto, $imagen, $prodActivo);
            echo json_encode($act);
        }  
    }else if($_GET['peticion'] === 'actualizarSinImg'){
            $ref = $_POST['refPro'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $contenido = $_POST['informacion'];
            $horma = $_POST['horma'];
            $contenidoNeto = $_POST['contenidoNeto'];
            $prodActivo = $_POST['activar'];
            $act = $productos->actProSinImg($ref, $nombre, $precio, $contenido, $horma, $contenidoNeto, $prodActivo);
            echo json_encode($act);   
    }else if($_GET['peticion'] === 'verProducto'){
        $id = $_POST['id'];
        $ver = $productos->get($id);
        echo json_encode($ver);
    }else if($_GET['peticion'] === 'filtrar'){
        $texto = $_POST['texto'];
        $ver = $productos->traerProductosFiltro($texto);
        echo json_encode($ver);
    }
}
 