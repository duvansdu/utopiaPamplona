
<div id="productos" class="productos"></div>
<div class="cajaPagar" id="cajaPagar">
    <h1 class="titulo"><strong>Formulario de pago</strong></h1>
    <form id="formularioPago">
      <div id="mensajesform" class="mt-1 ml-1 mr-1"></div>
        <div class="datosPrincipal">    
          <div class="caja1">
            <h5 class="titulo"><strong>Datos del COMPRADOR</strong></h5>
            <div class="form-group">
                <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Cedula" title="error en la cedula" pattern="^[0-9]+$" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Tel&eacute;fono" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" title="email incorrecto" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" autocomplete="off" required>
            </div>
          </div>

          <div class="caja2">
            <h5 class="titulo"><strong>Datos de ENV&Iacute;O</strong></h5>
            <div class="form-group">
                <select class="form-control" id="departamento" name="departamento" placeholder="Departamento">
                  <option value="">Seleccione Departamento</option>
                  <option value="Antioquia">Antioquia</option>
                  <option value="Atlántico">Atlántico</option>
                  <option value="Arauca">Arauca</option>
                  <option value="Atlántico">Atlántico</option>
                  <option value="Bolívar">Bolívar</option>
                  <option value="Boyacá">Boyacá</option>
                  <option value="Caldas">Caldas</option>
                  <option value="Caquetá">Caquetá</option>
                  <option value="Casanare">Casanare</option>
                  <option value="Cauca">Cauca</option>
                  <option value="Cesar">Cesar</option>
                  <option value="Chocó">Chocó</option>
                  <option value="Cundinamarca">Cundinamarca</option>
                  <option value="Córdoba">Córdoba</option>
                  <option value="Guainía">Guainía</option>
                  <option value="Guaviare">Guaviare</option>
                  <option value="Huila">Huila</option>
                  <option value="La Guajira">La Guajira</option>
                  <option value="Magdalena">Magdalena</option>
                  <option value="Meta">Meta</option>
                  <option value="Nariño">Nariño</option>
                  <option value="Norte de Santander">Norte de Santander</option>
                  <option value="Putumayo">Putumayo</option>
                  <option value="Quindío">Quindío</option>
                  <option value="Risaralda">Risaralda</option>
                  <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                  <option value="Santander">Santander</option>
                  <option value="Sucre">Sucre</option>
                  <option value="Tolima">Tolima</option>
                  <option value="Valle del Cauca">Valle del Cauca</option>
                  <option value="Vaupés">Vaupés</option>
                  <option value="Vichada">Vichada</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="municipio" name="municipio">
                  <option value="">Seleccione municipio</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direcci&oacute;n">
            </div>

            <div class="form-group">
                <textarea class="form-control" id="detalles" rows="3" name="detalles" placeholder="M&aacute;s datos de envio"></textarea>
            </div>
          </div>
          <div class="cajadatostarjeta">
              <div class="caja3">
                <label for="exampleInputEmail1">Datos de pago</label>
                <h5 class="titulo"><strong>Datos de PAGO</strong></h5>
                <div class="form-group">
                    <select class="form-control" id="formaPago" name="formaPago">
                      <option value="">Forma de pago</option>
                      <option value="contraentrega">PAGO CONTRAENTREGA SOLO PAMPLONA NS</option>
                      <option value="nequi">Nequi</option>
                      <option value="bancolombia">Transferencia Bancolombia</option>
                      <option value="daviplata">Daviplata</option>
                      <option value="Efectivo">Efectivo</option>
                      <option value="Credito">Tarjeta Credito</option>
                      <option value="PSE">Tarjeta debito</option>
                      <option value="epayco">epayco</option>
                    </select>
                </div>
                <div class="form-group" id="cajaFormaPago">
                    <b>No se ha seleccionado la forma de pago</b>
                </div>
              </div>
          </div>
        </div>
    </form>
</div>
<script src="./assets/js/pagar.js?<?php print($versionMitienda)?>" type="module"></script>