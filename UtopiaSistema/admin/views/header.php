<?php
$valor = time();
$template=('<!DOCTYPE html>
<html lang="es">

<head>
	<title>Utopia Sistema de Control</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/png" href="./assets/img/logo.png">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!--link fontawesome-->
    <script src="https://kit.fontawesome.com/74b22c31cc.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./assets/css/generales.css?%s">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="./assets/css/styles.css" rel="stylesheet">
         
</head>
<body class="sb-nav-fixed">
<header>' 
);
///////////////////////////
if( isset($_GET['error'])){printf($_GET['error']);}
//////////////////////////
if($_SESSION['utopia']){
	$template.=('
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="home">Utopia Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="salir">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
			
			

			<div class="subNavegador">
			Nombre Usuario: 	<span id="nombreIngreso">'.$_SESSION['utopia_nombre'].'</span>
			Correo Usuario: 	<span id="usuarioIngreso">'.$_SESSION['utopia_usuario'].'</span>
				
			</div>
                    <a class="nav-link" href="crearPedido">
                        <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                        Crear Pedido
                    </a>
                    
                    <a class="nav-link" href="salir">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Salir
                    </a>
                           
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logeado Cómo</div>
                        <b id="nombreIngreso">'.$_SESSION['utopia_nombre'].'</b>
                    </div>
                </nav>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <!--<script src="./assets/js/datatables-simple-demo.js"></script>-->
   </header>
');
}else{
    $template.=('');
}

$template.=('
<div class="principal" id="principal">
');

$all =(''.$template.'');
printf($all,$valor,$valor);
