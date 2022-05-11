<?php
$variable = time();
$all = ('
    <link rel="stylesheet" href="./assets/css/servicios.css?%s">

    <div class="caja1"></div>
    <div class="caja2">
            <form id="formulario" class="formulario">
                <span class="titulo">Crear Servicio</span>
                <input type="file" name="archivoImg" accept="image/*" id="inputFile" class="d-none">
                <button class="" id="subirFile">Seleccionar Foto</button>
                
                <input type="text" name="nombre" placeholder="Nombre" id="nombre" autocomplete="off" required>
                <textarea id="detalles" rows="3" name="detalles" placeholder="Descripción" autocomplete="off"></textarea> 

                <input type="hidden" name="r" value="registrarProductos">
                <input type="hidden" name="fecha" value="'.$_SESSION['hotelVasconia_date'].'">
                <input type="hidden" name="usuario" value="'.$_SESSION['hotelVasconia_documento'].'">
                <input type="hidden" name="crud" value="set">
                <input type="hidden" name="precio" value="0">
                <button type=submit" class="">Agregar </button>
                <label id="respuestaFormulario"></label>
            </form>
            <div class="cajaFoto">
                <img src="" id="img" class="mostrarFoto">
            </div>
            <div class="mostrarProductos">
                <label class="titulo">Ver Servicios</label>
                <div id="verFiltro" class="verFiltro"></div>
                <div class="mensajeMostrarProducto" id="mensajeMostrarProducto"></div>
            </div>
    </div>
    <div class="panel" id="panel"></div>
    <script src="./assets/js/servicios.js?%s" type="module"></script>
');

printf($all, $variable, $variable);