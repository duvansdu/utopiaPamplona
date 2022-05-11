import URL from "./url.js"
const formularioVentas = document.getElementById('formularioVentas')
const formularioIDReserva = document.getElementById('formularioIDReserva')
const formReserva = document.getElementById('formReserva')
const resultadoVentas = document.getElementById('resultadoVentas')
const datosReserva = document.getElementById('datosReserva')
const impVentas = document.getElementById('impVentas')
const reporteVentasImprimir = document.getElementById('reporteVentasImprimir')
const selectHabitaciones = document.getElementById('selectHabitaciones')
const botonCrearReserva = document.getElementById('botonCrearReserva')
const idReserva = document.getElementById('idReserva')
const botonIDReserva = document.getElementById('botonIDReserva')
const excel = document.getElementById('excel')

const subir = () =>{
    window.scroll(0,0)
}

const imprimirElemento = (impresion) => {
    let ventana = window.open('', 'Print Window', 'height=600,width=800');
    ventana.document.write(`<html><head><style type="text/css">
    .table{
        width: 100%;
        text-aling: center;
    }
    th, td{
        text-aling: justify;
        border-bottom: 1px solid #000;
    }
    .formularioBuscarGuias{
        display: none;
    }
    </style>`);
    ventana.document.write(`${impresion.innerHTML}`);
    ventana.document.write('</body></html>');
    ventana.focus();
    ventana.print();
    ventana.close();
    return true;
}

const imprimirElementoPDF = (element) => {
    html2pdf().from(element).save();
}

const llenarSelect = () => {
    fetch( URL.url_habitaciones+'traer')
    .then(datos=>datos.json())
    .then(dato=>{
        dato.forEach(element => {
            selectHabitaciones.innerHTML += `
            <option value="${element.hab_ref}">${element.hab_nombre}</option>
            `
        });
        
    })
}

const crearReservaHabitaciones = (id,fechaI,fechaF,habitacion) =>{
    let fechaInicio = new Date(fechaI)
    let fechaFin    = new Date(fechaF)
    while(fechaFin.getTime() >= fechaInicio.getTime()){
        fechaInicio.setDate(fechaInicio.getDate() + 1)
        let anho = fechaInicio.getFullYear()
        let mes = fechaInicio.getMonth() + 1
        let dia = fechaInicio.getDate()
        
        if (mes < 10) {var newmes = '0'+mes}else{var newmes = mes}
        if (dia < 10) {var newdia = '0'+dia}else{var newdia = dia}

        let fechaReserva = (anho + '-' + (newmes) + '-' + newdia)
        console.log(fechaReserva)
        let datosHabitaciones = new FormData()
        datosHabitaciones.append('res_id',id)
        datosHabitaciones.append('hab_ref',habitacion)
        datosHabitaciones.append('res_fecha_ocupacion',fechaReserva)
        fetch( URL.url_reservacion_fecha_habitacion+'crearHabitacionfecha',{
            method: 'POST',
            body: datosHabitaciones
        })
        .then(datos=>datos.json())
        .then(dato=>{
            if (dato === 'ok') {
                
            }
        })
    }
    
}

const crearReserva = (documento,orderId,transactionId,forma_pago,state,fechaI,fechaF,habitacion) =>{
    let id = new Date().getTime()
    let fechaDeLaReserva = new Date()
    //fechaDeLaReserva.setDate(fechaDeLaReserva.getDate() + 1)
    let anho = fechaDeLaReserva.getFullYear()
    let mes = fechaDeLaReserva.getMonth() + 1
    let dia = fechaDeLaReserva.getDate()
    if (mes < 10) {var newmes = '0'+mes}else{var newmes = mes}
    if (dia < 10) {var newdia = '0'+dia}else{var newdia = dia}
    let hoy = (anho + '-' + (newmes) + '-' + newdia)
    console.log(hoy)

    let datosReserva = new FormData()
    datosReserva.append('res_id',id)
    datosReserva.append('cli_documento',documento)
    datosReserva.append('res_fecha_reserva',hoy)
    datosReserva.append('res_fecha_desde',fechaI)
    datosReserva.append('res_fecha_hasta',fechaF)
    datosReserva.append('res_nhabitaciones','-')
    datosReserva.append('res_npersonas','-')
    datosReserva.append('res_valor_total','50000')
    datosReserva.append('res_medio_pago',forma_pago)
    datosReserva.append('res_IDorden_payu',orderId)
    datosReserva.append('res_transactionId_payu',transactionId)
    datosReserva.append('res_urlpdf','urlpdf')
    datosReserva.append('res_urlhtml','urlhtml')
    datosReserva.append('res_estadopayu',state)
    datosReserva.append('res_estadohotel','exitosa')

    fetch( URL.url_reservaciones+'crearReserva',{
        method: 'POST',
        body: datosReserva
    })
    .then(datos=>datos.json())
    .then(dato=>{
        if (dato === 'ok') {
            idReserva.value = id
            resultadoVentas.innerHTML = `se creo la reserva exitosa con el iD = ${id}`
            crearReservaHabitaciones(id,fechaI,fechaF,habitacion)
        }
    })
}

formularioIDReserva.addEventListener('submit',(e)=>{
    e.preventDefault()
    resultadoVentas.innerHTML = '<div class="preloader"></div>';
    
    let datos = new FormData(formularioIDReserva)
    fetch( URL.url_reservaciones+'verReservasID',{
        method: 'POST',
        body: datos,
        enctype: 'multipart/form-data'
    })
    .then(datos => datos.json() )
    .then(dato =>{
        console.log(dato)
        resultadoVentas.innerHTML = ''
        if (dato.length === 0){
            resultadoVentas.innerHTML = 'No se encontraron Ventas'
        }else{
            let item = 0
            if (dato[0].res_estadohotel === 'pendiente') {
                var selector = `
                <select name="nuevoEstado" id="nuevoEstado">
                    <option value="" selected>${dato[0].res_estadohotel}</option>
                    <option value="exitosa">Reserva exitosa</option>
                </select>
                <buttom class="botonActualizarEstado">Actualizar estado</buttom>
                <span id="mensajeEstado"></span>
                `
            }else{
                var selector = 'La reserva ya se valido'
            }
            datosReserva.innerHTML = ``
            datosReserva.innerHTML = `
            <b class="d-none">${dato[0].res_id}</b>
            <span>ID reserva: ${dato[0].res_id}</span><br>
            <span>Fecha de la reservaci&oacute;n: ${dato[0].res_fecha_reserva}</span><br>
            <span>Fecha Ingreso: ${dato[0].res_fecha_desde}</span><br>
            <span>Fecha Salida: ${dato[0].res_fecha_hasta}</span><br>
            <span>Medio de PAGO: ${dato[0].res_medio_pago}</span><br>
            <span>Estado de la Reserva: ${dato[0].res_estadohotel}</span><br>
            ${selector}
            <br>
            <h4>Datos comprador</h4>
            Documento: ${dato[0].cli_documento}<br>
            Nombre: ${dato[0].cli_nombre + ' ' + dato[0].cli_apellidos}<br>
            Email: ${dato[0].cli_email}<br>
            Tel&eacute;fono: ${dato[0].cli_telefono}<br>
            Ubicaci&oacute;n: ${dato[0].cli_ubicacion}<br>
            
            `
            for(let data of dato){
                item = item + 1
                resultadoVentas.innerHTML += `
                <tr class="paraImprimir">
                    <th scope="row">${item}</th>
                    <th scope="row">${data.res_id}</th>
                    <td>${data.cli_nombre + ' ' + data.cli_apellidos}</td>
                    <td>${data.res_fecha_ocupacion}</td>
                    <td>
                        ref: ${data.hab_ref}<br>
                        Nombre: ${data.hab_nombre}<br>
                        Precio d&iacute;a: ${data.hab_precio_dia}<br>
                    </td>
                </tr><br>
                `
            }
        }  
    })
    formularioVentas.reset()
})

formularioVentas.addEventListener('submit',(e)=>{
    e.preventDefault()
    resultadoVentas.innerHTML = '<div class="preloader"></div>';
    let fecha = document.getElementById('fecha').value
    let fechaBusqueda = new Date(fecha)
    fechaBusqueda.setDate(fechaBusqueda.getDate() + 1)
    let anho = fechaBusqueda.getFullYear()
    let mes = fechaBusqueda.getMonth() + 1
    let dia = fechaBusqueda.getDate()
    if (mes < 10) {var newmes = '0'+mes}else{var newmes = mes}
    if (dia < 10) {var newdia = '0'+dia}else{var newdia = dia}
    let fechaReserva = (anho + '-' + (newmes) + '-' + newdia)
    console.log('fecha de reserva: '+fechaReserva)
    let datos = new FormData()
    datos.append('fecha',fechaReserva)
    fetch( URL.url_pedidos+'verPedidos',{
        method: 'POST',
        body: datos,
        enctype: 'multipart/form-data'
    })
    .then(datos => datos.json() )
    .then(dato =>{
        console.log(dato)
        resultadoVentas.innerHTML = ''
        if (dato.length === 0){
            resultadoVentas.innerHTML = 'No se encontraron Ventas'
        }else{
            let item = 0
            datosReserva.innerHTML = ``
            for(let data of dato){
                item = item + 1
                resultadoVentas.innerHTML += `
                <tr class="paraImprimir">
                    <th scope="row">${item}</th>
                    <th scope="row">${data.res_id}</th>
                    <td>
                        Nombre: ${data.cli_nombre + ' ' + data.cli_apellidos}<br>
                    </td>
                    <td>${data.res_fecha_ocupacion}</td>
                    <td>
                        ref: ${data.hab_ref}<br>
                        Nombre: ${data.hab_nombre}<br>
                        Precio d&iacute;a: ${data.hab_precio_dia}<br>
                    </td>
                </tr><br>
                `
            }
        }  
    })
    formularioVentas.reset()
})

impVentas.addEventListener('click',(e)=>{
    imprimirElementoPDF(reporteVentasImprimir)
})

excel.addEventListener('click', (e)=>{
    e.preventDefault()
    let fecha = new Date()
    let tableExport = new TableExport(reporteVentasImprimir, {
        exportButtons: false, // No queremos botones
        filename: fecha, //Nombre del archivo de Excel
        sheetname: fecha, //Título de la hoja
    });
    let datos = tableExport.getExportData();
    let preferenciasDocumento = datos.reporteVentasImprimir.xlsx;
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
    
})

datosReserva.addEventListener('click', (e)=>{
    if(e.target.innerHTML === 'Actualizar estado'){
        let idReserva = e.target.parentElement.children[0].innerHTML
        let newEstado = document.getElementById('nuevoEstado').value
        let msnEstado = document.getElementById('mensajeEstado')
        if (newEstado === '') {
            msnEstado.innerHTML = `seleccione otro estado para la reserva`
        }else{
            console.log(newEstado)
            let datosCambioEstado = new FormData()
            datosCambioEstado.append('id',idReserva)
            datosCambioEstado.append('estado',newEstado)
            fetch( URL.url_reservaciones+'editEstado',{
                method: 'POST',
                body: datosCambioEstado
            })
            .then(datos=>datos.json())
            .then(dato=>{
                console.log(dato)
            })
        }
    }
})

formReserva.addEventListener('submit', (e)=>{
    e.preventDefault()
    let fechaI = document.getElementById('fechaIngreso').value
    let fechaF = document.getElementById('fechaSalida').value
    let habitacion = document.getElementById('selectHabitaciones').value
    crearReserva('0000','hotel','hotel','hotel','exitosa',fechaI,fechaF,habitacion)
})

document.addEventListener('DOMContentLoaded', subir())
document.addEventListener('DOMContentLoaded', llenarSelect())