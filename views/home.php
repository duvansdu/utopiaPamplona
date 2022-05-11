<link rel="stylesheet" href="./assets/css/home.css?<?php print(time());?>">

<div class="vista" id="vista">
    <div class="slider" id="slider">
        <div class="presentacion">
            <div class="imagen">
                <img src="./assets/img/pagina/foto2.jpg" alt="">
            </div>
        </div>

        <div class="presentacion2">
            <img src="./assets/img/pagina/foto1.jpg" alt="">
            <div class="caja2">
            </div>
        </div>

        <div class="presentacion3">
            <img src="./assets/img/pagina/foto3.jpg" alt="">
            <div class="caja2">
            </div>
        </div>   
    </div>
    
    <div class="botones" id="botones">
        <span class="uno" id="uno">1</span>
        <span class="dos" id="dos">2</span>
        <span class="tres" id="tres">3</span>
    </div>
</div>

<div class="cajaC">
        <div id="galeria" class="galeria">
            <div class="items"><a href="pijamas-mujer-jogger"><img src="./assets/img/pagina/jogger.jpg" alt=""></a></div>
            <div class="items"><a href="pijamas-mujer-blusones"><img src="./assets/img/pagina/blusones.jpg" alt=""></a></div>
            <div class="items"><a href="pijamas-mujer-short"><img src="./assets/img/pagina/short.jpg" alt=""></a></div>
            <div class="items"><a href="pijamas-mujer-pantalon"><img src="./assets/img/pagina/pantalon.jpg" alt=""></a></div>
            
        </div>

        <div id="galeriaOculta" class="galeriaOculta">
            <i class="fas fa-times cerrargaleriaOculta"></i>
            <div id="imgG" class="imgG"></div>
        </div>
   </div>
<script src="./assets/js/home.js?<?php print(time());?>" type="module"></script>