import URL from "./url.js"
const referencia = document.getElementById('referencia')
const fecha = document.getElementById('fecha')
const respuesta = document.getElementById('respuesta')
const motivo = document.getElementById('motivo')
const banco = document.getElementById('banco')
const recibo = document.getElementById('recibo')
const autorizacion = document.getElementById('autorizacion')
const total = document.getElementById('total')
const laRespuesta = document.getElementById('laRespuesta')

let arrayCarrito = []

const getQueryParam = (param) =>{
    location.search.substr(1)
    .split('&')
    .some(function(item){
        return item.split('=')[0] == param && (param = item.split('=')[1])
    })
return param
}

const crearListaPedido = (id) =>{
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'));
    arrayCarrito.forEach(element => {
        let listaPedido = new FormData()
        listaPedido.append('idPedido', id)
        listaPedido.append('ref', element.referencia)
        listaPedido.append('nombre', element.nombre)
        listaPedido.append('precio', element.precio)
        listaPedido.append('talla', element.talla)
        listaPedido.append('tipo', element.tipo)
        listaPedido.append('cantidad', element.cantidad)
        fetch( URL.url_lista_pedido+'crearLista',{
            method: 'POST',
            body: listaPedido
        })
        .then(datos=>datos.json())
        .then(dato=>{
            if (dato === 'ok'){
                
            }
        })
        return 'creado'
    })
}

const crearPedido = (idPedido, direccion,orderId,transactionId,forma_pago,state, cedula, fechaCompra) =>{
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'));
    let arrayCarritoJSON = JSON.stringify(arrayCarrito)
    let precio=0
    

    for (let j = 0; j < arrayCarrito.length; j++) {
        let element = arrayCarrito[j]; 
        precio = precio + (parseInt(element.precio, 10) * parseInt(element.cantidad, 10))
    }

    let crearPedido = new FormData()
    crearPedido.append('id', idPedido)
    crearPedido.append('cedulaComprador', cedula)
    crearPedido.append('datosEnvio', direccion)
    crearPedido.append('listaCompra',arrayCarritoJSON)
    crearPedido.append('precioPedido', precio)
    crearPedido.append('formaPago', forma_pago)
    crearPedido.append('orderId', orderId)
    crearPedido.append('transactionId', transactionId)
    crearPedido.append('fechaCompra', fechaCompra)
    crearPedido.append('estadoEpayco', state)
    fetch( URL.url_pedidos+'crear',{
        method: 'POST',
        body: crearPedido
    })
    .then(datos=>datos.json() )
    .then(datos=>{
        if (datos === 'ok') {
            console.log('ingresando')
            crearListaPedido(idPedido)
        }
    })
}

const consultaRespuesta = () =>{
    let ref_payco = getQueryParam('ref_payco');
    fetch( URL.urlapp+ref_payco )
    .then( datos => datos.json() )
    .then( response=>{
        console.log(response)
        if (response.success) {
            if (response.data.x_cod_response == 1) {//Codigo personalizado
                laRespuesta.innerHTML = 'Transaccion Aprobada'
                let idPedido = response.data.x_id_invoice
                console.log(idPedido)
                let direccion = response.data.x_extra2
                console.log(direccion)
                let forma_pago = response.data.x_type_payment
                console.log(forma_pago)
                let cedula = response.data.x_extra1
                console.log(cedula)
                let fechaCompra = response.data.x_fecha_transaccion
                console.log(fechaCompra)
                crearPedido(idPedido, direccion,'epayco','epayco',forma_pago,'APROBADO', cedula, fechaCompra)
            }else if(response.data.x_cod_response == 2) {//Transaccion Rechazada
                console.log('transacción rechazada');
            }else if(response.data.x_cod_response == 3) {//Transaccion Pendiente
                console.log('transacción pendiente');
            }else if(response.data.x_cod_response == 4) {//Transaccion Fallida
                console.log('transacción fallida');
            }else{
                alert('Error consultando la información');
            }
            fecha.innerHTML = response.data.x_transaction_date
            respuesta.innerHTML = response.data.x_response
            referencia.innerHTML = response.data.x_id_invoice
            motivo.innerHTML = response.data.x_response_reason_text
            recibo.innerHTML = response.data.x_transaction_id
            banco.innerHTML = response.data.x_bank_name
            autorizacion.innerHTML = response.data.x_approval_code
            total.innerHTML = response.data.x_amount + ' ' + response.data.x_currency_code    
        }
    })
}

document.addEventListener('DOMContentLoaded', consultaRespuesta())
