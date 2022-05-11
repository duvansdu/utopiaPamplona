<?php
$variable = time();
$template =('
<form action="" method="POST" enctype="multipart/form-data" id="formularioProducto">
    <div class="cajaContenido">
      <select class="form-control" name="tipo" id="selTipo">
        <option value="">tipo de producto</option>');
        $tipo = new TipoProductosControllers();
        $ver = $tipo->get();

        for ($i=0; $i < count($ver); $i++) { 
          $template.=('<option value="'.$ver[$i]['tip_id'].'">'.$ver[$i]['tip_producto'].'</option>');
        }
        $template.=(' 
      </select>

      <input type="text" class="form-control" name="nombre" placeholder="Nombre del producto" required>
      <input type="number" class="form-control" name="precio" placeholder="Precio IVA INCLUIDO" required>
      <textarea class="form-control" rows="10" name="descripcion" placeholder="Descripcion" required></textarea>
      <input type="text" class="form-control" name="neto" placeholder="Contenido neto" required>
    </div>
');

$all = ('
<link rel="stylesheet" href="./assets/css/productos.css?%s">
<label class="titulo">Crear un productos</label>
<div class="cajaProductos">
  '.$template.'
    <div class="cajaFoto">
      <img src="" id="img">
      <input type="file" name="archivoImg" accept="image/*" id="inputFile" class="d-none">
      <i class="fas fa-image subirFile" id="subirFile"></i>
    </div>
    <div class="tallas" id="seleccioneTalla">tallas</div>
    <span id="respuestaFormulario" class="respuestaFormulario"></span>
    <input class="btnCrearProducto" type="submit" value="Agregar">
  </form>
  
</div>
<script src="./assets/js/mostrarTipo.js?%s" type="module"></script>
<script src="./assets/js/productos.js?%s" type="module"></script>
');
printf($all,$variable,$variable,$variable);