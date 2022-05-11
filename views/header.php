<?php
$versionMitienda = time();
$template= ('
<!doctype html> 
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no maximum-scale=1.0, user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="ie-edge">
    
    <!-- PWA-->
    <meta name="theme-color" content="#ececec">
	  <meta name="MobileOptimized" content="width">
	  <meta name="HandheldFriendly" content="true">
	  <meta name="apple-mobile-web-app-capable" content="yes">
	  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	  <link rel="shortcut icon" type="image/png" href="./assets/img/iconos/favicon_16.png">
	  <link rel="apple-touch-icon" href="./assets/img/iconos/favicon_16.png">
	  <link rel="apple-touch-startup-image" href="./assets/img/iconos/favicon_16.png">
	  <link rel="manifest" href="./manifest.json">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&display=swap" rel="stylesheet">

    <!--estilos nativos-->
    <link rel="stylesheet" href="./assets/css/estilos.css?%s">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--link fontawesome-->
    <script src="https://kit.fontawesome.com/74b22c31cc.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Palette+Mosaic&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap" rel="stylesheet">
    
    
    <!--head de respuesta epayco
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->

    <title>UTOPIA DESIGNS</title>
  </head>
<body>
  <div class="categorias" id="categorias"></div>
  
  <div class="navegador">  
      <div class="iconos">
        <div class="iconosRedes">
          <i class="fab fa-facebook-square"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-whatsapp"></i>
        </div>
        <div class="form iconosBuscador">
          <form id="formBuscador">
            <input type="text" name="textoBuscar" placeholder="buscar productos" class="buscador" id="buscador" autocomplete="off" required>
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
      </div>

      <a href="home"><img src="./assets/img/pagina/logo23.png"></a>
      
      <div class="iconoCarrito">
        <a href="home"><span><i class="fas fa-home"></i></span></a>
        <span class="textoLogo">Utopia Desing</span>
        <span id="cantidadCarrito" class="cantidadCarrito" type="button"><div class="" id="agregando"></div>  
      </div>
      
      <div class="item" id="item">
        <a class="mujer">MUJER</a>  
        <a class="hombre">HOMBRE</a>
        <a>OTROS</a>
      </div>
  </div>
 
  <div id="mostrarProducto" class="mostrarProducto">
    <div class="imgPeque" id="imgPeque"></div>
    <div class="imgGrande" id="imgGrande"></div>
    <div class="zoom" id="zoom"></div>
    <div class="info" id="info">
      <div class="texto" id="texto"></div>
      <div class="estilosTalla">
        <div class="acaTalla" id="acaTalla"></div>
        <div class="defineTalla" id="defineTalla"></div>
        <div class="mensajes" id="mensajes"></div>
      </div>
      <div class="cajaBotonAgregar" id="botonAgregar"></div>
    </div>
    <div class="cerrar" id="cerrar"></div>
  </div>

  <div class="mostrarFiltro" id="mostrarFiltro"></div>
  
  <section id="principal" class="principal">
  ');
  
printf($template, $versionMitienda);
