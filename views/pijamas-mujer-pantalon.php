<?php
$tipo = 2;
$productos = new ProductosController();
$verProductos = $productos->porTipo($tipo);
$template = ('
<b id="procesarTitulo" class="procesarTitulo">Pijamas Mujer Pantal&oacute;n</b>
<div id="cajaCategorias" class="cajaCategorias">
    <div class="tituloCategoria" id="tituloCategoria"></div>
    ');
        for ($i=0; $i<count($verProductos); $i++) { 
            $template.= ('
            <div class="cajaProducto">
                <img src="./assets/img/productos/'.$verProductos[$i]['pro_img'].'" alt="'.$verProductos[$i]['pro_ref'].'" class="esProducto">
                <div class="cajainfo">
                    <label>'.$verProductos[$i]['pro_nombre'].'</label>
                    <span>'.$verProductos[$i]['pro_precio'].'</span>
                </div>
            </div>
            ');
        }
$template.= ('
    </div>
</div>
<script src="./assets/js/estilosCategorias.js?%s" type="module"></script>
');

printf($template, $versionMitienda);
?>