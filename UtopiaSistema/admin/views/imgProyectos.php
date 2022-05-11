<?php
$variable = time();
$all = ('
    <link rel="stylesheet" href="./assets/css/imgProyectos.css?%s">
    <div class="caja2">
        <div class="formFoto">
            <select class="selectProductos" id="selectProductos" name="selectProductos">
                <option value="">Seleccione un proyecto</option>
            </select>
            <form id="formulario" class="formulario">
                <span class="titulo">Agregar foto al proyecto <b id="habit"></b></span>
                <input type="file" name="archivoImg" accept="image/*" id="inputFile" class="d-none">
                <button class="" id="subirFile">Seleccionar Foto</button>
                <textarea class="form-control" rows="10" name="url" placeholder="url" required></textarea>
                <input type="hidden" name="r" value="registrarProductos">
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
    <script src="./assets/js/imgProyectos.js?%s" type="module"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
');

printf($all, $variable, $variable);
?>