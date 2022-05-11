<?php
$variable = time();
$all = ('
    <link rel="stylesheet" href="./assets/css/habitaciones.css?%s">

    <div class ="caja1"></div>
    <div class="caja2">
        <div class="formFoto">
            <form id="formulario" class="formulario">
                <h4 class="titulo">Agregar imagen a la galeria</h4>
                <input type="file" name="archivoImg" accept="image/*" id="inputFile" class="d-none">
                <button class="" id="subirFile">Seleccionar Foto</button>

                <input type="hidden" name="r" value="registrarProductos">
                <input type="hidden" name="fecha" value="'.$_SESSION['hotelVasconia_date'].'">
                <input type="hidden" name="usuario" value="'.$_SESSION['hotelVasconia_documento'].'">
                <input type="hidden" name="crud" value="set">
                <button type=submit" class="">Agregar </button>
                <label id="respuestaFormulario"></label>
            </form>
            <div class="cajaFoto">
                <img src="" id="img" class="mostrarFoto">
            </div>
        </div>
        <div class="mostrarProductos">
            <div id="verFiltro" class="verFiltro"></div>
        </div>
    </div>
    <div class="panel" id="panel"></div>
    <script src="./assets/js/galeria.js?%s" type="module"></script>
');

printf($all, $variable, $variable);