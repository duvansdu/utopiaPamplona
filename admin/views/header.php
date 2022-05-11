<?php
$valor = time();
$template=('<!DOCTYPE html>
<html lang="es">
<head>
	<title>Admin_UTOPIA</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/png" href="./assets/img/logo.png">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!--link fontawesome-->
    <script src="https://kit.fontawesome.com/74b22c31cc.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./assets/css/generales.css?%s">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<header>' 
);
///////////////////////////
if( isset($_GET['error'])){printf($_GET['error']);}
//////////////////////////
if($_SESSION['utopiadesing']){
	$template.=('
	<i class="fas fa-bars menu" id="menu"></i>
	<i class="fas fa-times cerrar" id="cerrar"></i>
		<div class="header" id="header">
			<div class="subNavegador">
				<b id="nombreIngreso">'.$_SESSION['utopiadesing_nombre'].'</b>
			</div>

			<div class="navegador">
				<a href="home">Inicio</a>
				<a href="productos">Productos</a>
				<a href="imgProductos">fotos Productos</a>
				<a href="pedidos">Pedidos</a>
				<a href="salir">Salir</a>
			</div>
		</div>
</header>
');
}else{$template.=('</header>');}

$template.=('
<div class="principal" id="principal">
');

$all =(''.$template.'');
printf($all,$valor,$valor);
