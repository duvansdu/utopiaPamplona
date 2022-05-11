<?php
function borrar_img($ruta,$extension)
{
    switch($extension){
        case ".jpeg":
            if(file_exists($ruta.".png"));
                unlink($ruta.".png");
            if(file_exists($ruta.".gif"));
                unlink($ruta.".gif");
            break;
        case ".png":
                if(file_exists($ruta.".jpg"));
                    unlink($ruta.".jpg");
                if(file_exists($ruta.".gif"));
                    unlink($ruta.".gif");
                break;
        case ".gif":
                if(file_exists($ruta.".png"));
                    unlink($ruta.".png");
                if(file_exists($ruta.".jpg"));
                    unlink($ruta.".jpg");
            break;
    }
}
//funcion para subir imagen del perfil del usuario
function subir_imagen($tipoimg,$imagen,$nombre,$tipo){
    $ruta_destino = "../../assets/img/productos/";
    //vamos a utilizar la propiedad strstr que nos sirve para buscar una cadena de texto en otra cadena de texto estrructura = strstr($cadena1,$cadena2)
    if(strstr($tipoimg,"image"))
    {
        if(strstr($tipoimg,"jpeg"))
            $extension=".jpg";
        else if(strstr($tipoimg,"gif"))
            $extension=".gif";
        else if(strstr($tipoimg,"png"))
            $extension=".png";
        //la funcion getimagesize sirve para mostrar las dimensiones de la imagen en un vector de dos posiciones la primera posición es para el ancho y la segunda posicion para el alto.
        $tam_imagen= getimagesize($imagen);
        $ancho_imagen=$tam_imagen[0];
        $alto_imagen=$tam_imagen[1];
        $ancho_img_deseado=1200;

        if($ancho_imagen > $ancho_img_deseado){
            $nuevo_ancho_img=$ancho_img_deseado;
            $nuevo_alto_img=($alto_imagen/$ancho_imagen)*$nuevo_ancho_img;
            $imagen_reajustada=imagecreatetruecolor($nuevo_ancho_img,$nuevo_alto_img);
            switch($extension){
                case ".jpg":
                    $img_original = imagecreatefromjpeg($imagen);
                    //reajustamos la imagen
                    imagecopyresampled($imagen_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img,$nuevo_alto_img,$ancho_imagen,$alto_imagen);
                    //guardo la imagen reescalada en el servidor
                    $nombre_img_ext=$ruta_destino.$nombre.'-'.$tipo.$extension;
                    $nombre_img=$ruta_destino.$nombre;
                    imagejpeg($imagen_reajustada,$nombre_img_ext,100);
                    //ejecutamos la funcion para borrar posibles imagenes duplicadas para el perfil
                    //borrar_img($nombre_img,".jpg");
                    break;
                case ".png":
                    $img_original = imagecreatefrompng($imagen);
                    //reajustamos la imagen
                    imagecopyresampled($imagen_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img,$nuevo_alto_img,$ancho_imagen,$alto_imagen);
                    //guardo la imagen reescalada en el servidor
                    $nombre_img_ext=$ruta_destino.$nombre.'-'.$tipo.$extension;
                    $nombre_img=$ruta_destino.$nombre;
                    imagepng($imagen_reajustada,$nombre_img_ext);
                    //ejecutamos la funcion para borrar posibles imagenes duplicadas para el perfil
                    //borrar_img($nombre_img,".png");
                    break;
                case ".gif":
                    $img_original = imagecreatefromgif($imagen);
                    //reajustamos la imagen
                    imagecopyresampled($imagen_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img,$nuevo_alto_img,$ancho_imagen,$alto_imagen);
                    //guardo la imagen reescalada en el servidor
                    $nombre_img_ext=$ruta_destino.$nombre.'-'.$tipo.$extension;
                    $nombre_img=$ruta_destino.$nombre;
                    imagegif($imagen_reajustada,$nombre_img_ext,100);
                    //ejecutamos la funcion para borrar posibles imagenes duplicadas para el perfil
                    //borrar_img($nombre_img,".gif");
                    break;
            }
        }else{
            //guardo la ruta que tendra en el servidor la imagen
            $destino=$ruta_destino.$nombre.'-'.$tipo.$extension;
            //subimos la imagen
            move_uploaded_file($imagen,$destino) or die("no se pudo subir la imagen al servidor");

            $nombre_img=$ruta_destino.$nombre;
            //borrar_img($nombre_img,$extension);
        }
        //asignamos el nombre que se va aguardar en la base de datos
        $imagen=$nombre."-".$tipo.$extension;
        return $imagen;
    }else{
        return ("NO ES IMAGEN");
    }
}

function subir_imagen_servicios($tipoimg,$imagen,$nombre,$tipo){
    $ruta_destino = "../../assets/img/servicios/";
    //vamos a utilizar la propiedad strstr que nos sirve para buscar una cadena de texto en otra cadena de texto estrructura = strstr($cadena1,$cadena2)
    if(strstr($tipoimg,"image"))
    {
        if(strstr($tipoimg,"jpeg"))
            $extension=".jpg";
        else if(strstr($tipoimg,"gif"))
            $extension=".gif";
        else if(strstr($tipoimg,"png"))
            $extension=".png";
        //la funcion getimagesize sirve para mostrar las dimensiones de la imagen en un vector de dos posiciones la primera posición es para el ancho y la segunda posicion para el alto.
        $tam_imagen= getimagesize($imagen);
        $ancho_imagen=$tam_imagen[0];
        $alto_imagen=$tam_imagen[1];
        $ancho_img_deseado=1200;

        if($ancho_imagen > $ancho_img_deseado){
            $nuevo_ancho_img=$ancho_img_deseado;
            $nuevo_alto_img=($alto_imagen/$ancho_imagen)*$nuevo_ancho_img;
            $imagen_reajustada=imagecreatetruecolor($nuevo_ancho_img,$nuevo_alto_img);
            switch($extension){
                case ".jpg":
                    $img_original = imagecreatefromjpeg($imagen);
                    //reajustamos la imagen
                    imagecopyresampled($imagen_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img,$nuevo_alto_img,$ancho_imagen,$alto_imagen);
                    //guardo la imagen reescalada en el servidor
                    $nombre_img_ext=$ruta_destino.$nombre.'-'.$tipo.$extension;
                    $nombre_img=$ruta_destino.$nombre;
                    imagejpeg($imagen_reajustada,$nombre_img_ext,100);
                    //ejecutamos la funcion para borrar posibles imagenes duplicadas para el perfil
                    //borrar_img($nombre_img,".jpg");
                    break;
                case ".png":
                    $img_original = imagecreatefrompng($imagen);
                    //reajustamos la imagen
                    imagecopyresampled($imagen_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img,$nuevo_alto_img,$ancho_imagen,$alto_imagen);
                    //guardo la imagen reescalada en el servidor
                    $nombre_img_ext=$ruta_destino.$nombre.'-'.$tipo.$extension;
                    $nombre_img=$ruta_destino.$nombre;
                    imagepng($imagen_reajustada,$nombre_img_ext);
                    //ejecutamos la funcion para borrar posibles imagenes duplicadas para el perfil
                    //borrar_img($nombre_img,".png");
                    break;
                case ".gif":
                    $img_original = imagecreatefromgif($imagen);
                    //reajustamos la imagen
                    imagecopyresampled($imagen_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img,$nuevo_alto_img,$ancho_imagen,$alto_imagen);
                    //guardo la imagen reescalada en el servidor
                    $nombre_img_ext=$ruta_destino.$nombre.'-'.$tipo.$extension;
                    $nombre_img=$ruta_destino.$nombre;
                    imagegif($imagen_reajustada,$nombre_img_ext,100);
                    //ejecutamos la funcion para borrar posibles imagenes duplicadas para el perfil
                    //borrar_img($nombre_img,".gif");
                    break;
            }
        }else{
            //guardo la ruta que tendra en el servidor la imagen
            $destino=$ruta_destino.$nombre.'-'.$tipo.$extension;
            //subimos la imagen
            move_uploaded_file($imagen,$destino) or die("no se pudo subir la imagen al servidor");

            $nombre_img=$ruta_destino.$nombre;
            //borrar_img($nombre_img,$extension);
        }
        //asignamos el nombre que se va aguardar en la base de datos
        $imagen=$nombre."-".$tipo.$extension;
        return $imagen;
    }else{
        return ("NO ES IMAGEN");
    }
}

function subir_imagen_galeria($tipoimg,$imagen,$nombre,$tipo){
    $ruta_destino = "../../assets/img/galeria/";
    //vamos a utilizar la propiedad strstr que nos sirve para buscar una cadena de texto en otra cadena de texto estrructura = strstr($cadena1,$cadena2)
    if(strstr($tipoimg,"image"))
    {
        if(strstr($tipoimg,"jpeg"))
            $extension=".jpg";
        else if(strstr($tipoimg,"gif"))
            $extension=".gif";
        else if(strstr($tipoimg,"png"))
            $extension=".png";
        //la funcion getimagesize sirve para mostrar las dimensiones de la imagen en un vector de dos posiciones la primera posición es para el ancho y la segunda posicion para el alto.
        $tam_imagen= getimagesize($imagen);
        $ancho_imagen=$tam_imagen[0];
        $alto_imagen=$tam_imagen[1];
        $ancho_img_deseado=1200;

        if($ancho_imagen > $ancho_img_deseado){
            $nuevo_ancho_img=$ancho_img_deseado;
            $nuevo_alto_img=($alto_imagen/$ancho_imagen)*$nuevo_ancho_img;
            $imagen_reajustada=imagecreatetruecolor($nuevo_ancho_img,$nuevo_alto_img);
            switch($extension){
                case ".jpg":
                    $img_original = imagecreatefromjpeg($imagen);
                    //reajustamos la imagen
                    imagecopyresampled($imagen_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img,$nuevo_alto_img,$ancho_imagen,$alto_imagen);
                    //guardo la imagen reescalada en el servidor
                    $nombre_img_ext=$ruta_destino.$nombre.'-'.$tipo.$extension;
                    $nombre_img=$ruta_destino.$nombre;
                    imagejpeg($imagen_reajustada,$nombre_img_ext,100);
                    //ejecutamos la funcion para borrar posibles imagenes duplicadas para el perfil
                    //borrar_img($nombre_img,".jpg");
                    break;
                case ".png":
                    $img_original = imagecreatefrompng($imagen);
                    //reajustamos la imagen
                    imagecopyresampled($imagen_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img,$nuevo_alto_img,$ancho_imagen,$alto_imagen);
                    //guardo la imagen reescalada en el servidor
                    $nombre_img_ext=$ruta_destino.$nombre.'-'.$tipo.$extension;
                    $nombre_img=$ruta_destino.$nombre;
                    imagepng($imagen_reajustada,$nombre_img_ext);
                    //ejecutamos la funcion para borrar posibles imagenes duplicadas para el perfil
                    //borrar_img($nombre_img,".png");
                    break;
                case ".gif":
                    $img_original = imagecreatefromgif($imagen);
                    //reajustamos la imagen
                    imagecopyresampled($imagen_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img,$nuevo_alto_img,$ancho_imagen,$alto_imagen);
                    //guardo la imagen reescalada en el servidor
                    $nombre_img_ext=$ruta_destino.$nombre.'-'.$tipo.$extension;
                    $nombre_img=$ruta_destino.$nombre;
                    imagegif($imagen_reajustada,$nombre_img_ext,100);
                    //ejecutamos la funcion para borrar posibles imagenes duplicadas para el perfil
                    //borrar_img($nombre_img,".gif");
                    break;
            }
        }else{
            //guardo la ruta que tendra en el servidor la imagen
            $destino=$ruta_destino.$nombre.'-'.$tipo.$extension;
            //subimos la imagen
            move_uploaded_file($imagen,$destino) or die("no se pudo subir la imagen al servidor");

            $nombre_img=$ruta_destino.$nombre;
            //borrar_img($nombre_img,$extension);
        }
        //asignamos el nombre que se va aguardar en la base de datos
        $imagen=$nombre."-".$tipo.$extension;
        return $imagen;
    }else{
        return ("NO ES IMAGEN");
    }
}
    