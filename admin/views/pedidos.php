<?php
$variable = time(); 

$informe = ('
    <link rel="stylesheet" href="./assets/css/informes.css?%s">
    <div class ="caja1"></div>
    <div class="caja2">
        <div class="cajaInformes">
            <i class="fas fa-file-pdf btnInforme" id="impVentas"></i>
            <i class="fas fa-file-excel btnExcel" id="excel"></i>

            <div class="formulario">
                <span class="titulo">Pedidos</span>
                <form id="formularioVentas" class="formularioVentas">
                <input type="date" id="fecha" name="fecha" required>
                <button type="submit" class="btnAgregar">Buscar por fecha</button>
                </form>

                <form id="formularioIDReserva" class="formularioVentas">
                <input type="text" id="idReserva" name="idReserva" required>
                <button type="submit" class="btnAgregar" id="botonIDReserva">Buscar id reserva</button>
                </form>
 
                <form id="formReserva" class="formReserva">
                    <span id="mensajesFormularioReservas" class="mensajesFormularioReservas"></span>
                    <div class="">
                        <label for="exampleFormControlInput1" class="form-label" >Fecha Ingreso</label>
                        <input type="date" id="fechaIngreso" name="fechaIngreso" required>
                    </div>
                    <div class="">
                        <label for="exampleFormControlInput1" class="form-label">Fecha Salida</label>
                        <input type="date" id="fechaSalida" name="fechaSalida" required>
                    </div>
                    <div class="">
                        <label for="exampleFormControlInput1" class="form-label" >Habitación</label>
                        <select class="selectHabitaciones" id="selectHabitaciones" name="selectHabitaciones">
                            <option value="">Seleccione una habitacion</option>
                        </select>
                    </div>
                    <button type="submit" id="botonCrearReserva" class="botonBuscarHabitacion">Reservar</button>
                </form>
            </div>
            
            <div class="respuesta"> 
                <table class="table" id="reporteVentasImprimir">
                <div id="datosReserva"></div>
                    <thead>
                        <tr class="tituloTabla">
                            <th scope="col">#</th>
                            <th scope="col">ID Reserva</th>
                            <th scope="col">DATOS COMPRADOR</th>
                            <th scope="col">Dia Reservado</th>
                            <th scope="col">Habitaci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody id="resultadoVentas"></tbody>
                </table>
            </div> 
        </div>
    </div>
    <script src="./assets/js/excel/xlsx.full.min.js"></script>
    <script src="./assets/js/excel/FileSaver.min.js"></script>
    <script src="./assets/js/excel/tableexport.min.js"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="./assets/js/informes.js?%s" type="module"></script>
    ');

printf($informe,$variable,$variable);
?>
