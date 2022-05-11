<?php
$variable = time();
$all = ('
<link rel="stylesheet" href="./assets/css/proyecto.css?%s">
<div class="cajaProyecto">
  <form action="" method="POST" enctype="multipart/form-data" id="formularioProducto">
    <div class="cajaContenido">
        <select class="form-control" name="tipo" id="selTipo">
            <option value="">tipo de producto</option>');
            $tipo = new MomentosController();
            $ver = $tipo->get();

            for ($i=0; $i < count($ver); $i++) { 
            $all.=('<option value="'.$ver[$i]['mom_id'].'">'.$ver[$i]['mom_nombre'].'</option>');
            }
            $all.=(' 
        </select>

        <input type="text" class="form-control" name="nombre" placeholder="Nombre del producto" required>
        <textarea class="form-control" rows="10" name="descripcion" placeholder="Descripcion" required></textarea>
    </div>
    <div class="cajaFoto" id="cajaFoto">
      <img src="" id="img">
      <input type="file" name="archivoImg" accept="image/*" id="inputFileIMG" class="d-none">
      <b class="subirFile">Elegir Foto</b>
    </div>
    <span id="respuestaFormulario" class="respuestaFormulario"></span>
    <input class="btnCrearProducto" type="submit" value="Agregar">
  </form>
</div>
<script src="./assets/js/proyecto.js?%s" type="module"></script>
');
printf($all,$variable,$variable);