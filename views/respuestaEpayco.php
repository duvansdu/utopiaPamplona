

<header id='main-header' style='margin-top:20px'>
    <div class='row'>
        <div class='col-lg-12 franja'>
            <img class='center-block' src='./assets/img/pagina/utopiaImagen.jpg'>
        </div>
    </div>
</header>
<div class='container'>
    <div class='row' style='margin-top:20px'>
        <div class='col-lg-8 col-lg-offset-2 '>
            <h4 style='text-align:left'> Respuesta de la Transacción  <b id="laRespuesta"></b></h4><br>
        </div >
        <div class='col-lg-8 col-lg-offset-2'>
            <div class='table-responsive'>
                <table class='table table-bordered'>
                    <tbody>
                        <tr>
                            <td>Referencia </td>
                            <td id='referencia'> </td>
                        </tr>
                        <tr>
                            <td class='bold'> Fecha </td>
                            <td id='fecha'></td>
                        </tr>
                        <tr>
                            <td> Respuesta (ID pedido)</td>
                            <td id='respuesta'></td>
                        </tr>
                        <tr>
                            <td> Motivo </td>
                            <td id='motivo'></td>
                        </tr>
                        <tr>
                            <td class='bold'> Banco </td>
                            <td id='banco'></td>
                        </tr>
                        <tr>
                            <td class='bold'> Recibo </td>
                            <td id='recibo'></td>
                        </tr>
                        <tr>
                            <td class='bold'> C&oacute;digo aprovaci&oacute;n </td>
                            <td id='autorizacion'></td>
                        </tr>
                        <tr>
                            <td class='bold'> Total </td>
                            <td id='total'></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<footer>
    <div class='row'>
        <div class='container'>
            <div class='col-lg-8 col-lg-offset-2'>
                <img src='https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/pagos_procesados_por_epayco_260px.png' style='margin-top:10px; float:left'>  <img src='https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/credibancologo.png'height='40px' style='margin-top:10px; float:right'>
            </div>
        </div>
    </div>
</footer>

<script src="./assets/js/respuestaEpayco.js?<?php print(time());?>" type="module"></script>

</body>
</html>  