<?php
$variable = time();
$all = ('
    <link rel="stylesheet" href="./assets/css/imgProductos.css?%s">

    <div class ="caja1"></div>
    <div class="caja2">
        <div class="formFoto">
            <select class="selectProductos" id="selectProductos" name="selectProductos">
                <option value="">Seleccione una habitacion</option>
            </select>
            <form id="formulario" class="formulario">
                <span class="titulo">Agregar foto a la habitación <b id="habit"></b></span>
                <input type="file" name="archivoImg" accept="image/*" id="inputFile" class="d-none">
                <button class="" id="subirFile">Seleccionar Foto</button>

                <input type="hidden" name="r" value="registrarProductos">
                <input type="hidden" name="fecha" value="'.$_SESSION['utopiadesing_date'].'">
                <input type="hidden" name="usuario" value="'.$_SESSION['utopiadesing_documento'].'">
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
            <div id="verImagenes" class="verImagenes"></div>
            <div class="mensajeMostrarProducto" id="mensajeMostrarProducto"></div>
        </div>
    </div>
    <script src="./assets/js/imgProductos.js?%s" type="module"></script>
');

printf($all, $variable, $variable);