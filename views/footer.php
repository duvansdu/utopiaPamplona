</section>
<footer>
    <div class="pie">
        <div class="imgPie"><img src="assets/img/pagina/logo.png" alt=""></div>
        <div class="redesPie">
            <a href="" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="" target="_blank"><i class="fab fa-whatsapp"></i></a>
        </div>
        <div class="listaPie">
            <a href="nosotros" class="">Sobre nosotros</a>
            <a href="contacto" class="" id="contacto">Contacto</a> 
            <a href="contacto" class="">Términos y Condiciones</a>
            <a href="contacto" class="">Trabaja con nosotros</a>
        </div>
        <span class="derechos">© 2021 Utopia designs</span>
        <div class="mediosPagos">
            <img src='https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/pagos_procesados_por_epayco_260px.png' style='margin-top:10px; float:left'>  <img src='https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/credibancologo.png'height='40px' style='margin-top:10px; float:right'>
            </div>
        <span class="hojasoft"><i class="fas fa-code"></i>&nbsp; desarrollado por &nbsp;<a href="https://hoja-soft.com/" target="_blank"> HOJA-SOFT</a></span>
        <div class="formContacto" id="formContacto">
            <i class="fas fa-times cerrarContacto"></i>
            <div class="cajaContacto">
                <label>Contacto</label>
                <form class="contacto" id="formularioContacto">
                    <input type="email" autocomplete="off"  id="email" name="email" placeholder="Email" title="email incorrecto" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" required>
                    <input type="number" autocomplete="off" id="Whatsapp" placeholder="WhatsApp" name="whatsapp" required>
                    <input type="text" autocomplete="off" id="name" name="name" placeholder="Nombre y Apellidos" required>
                    <textarea  id="asunto" rows="3" name="asunto" placeholder="Asunto" required></textarea>
                    <button type="submit" class="btn btn-agregar">ENVIAR</button>
                    <span id="resContacto"></span>
                </form>
            </div>
        </div>
    </div>
</footer>
<script src="./assets/js/estilos.js?<?php print($versionMitienda)?>" type="module"></script>
<script src="./script.js?<?php print(time());?>"></script>
<script type="text/javascript" src="https://checkout.epayco.co/checkout.js"></script>
<script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
<script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
</body>
</html>
