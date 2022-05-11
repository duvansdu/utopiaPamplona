import URL from "./url.js"
const productos = document.getElementById('productos')
const departamento = document.getElementById('departamento')
const municipio = document.getElementById('municipio')
const formaPago = document.getElementById('formaPago')
const formulario = document.getElementById('formularioPago')
const nombres = document.getElementById('nombres')
const apellidos = document.getElementById('apellidos')
const cedula = document.getElementById('cedula')
const telefono = document.getElementById('telefono')
const email = document.getElementById('email')
const direccion = document.getElementById('direccion')
const detallesDir = document.getElementById('detalles')
const cajaFormaPago = document.getElementById('cajaFormaPago')
const pintarC = document.getElementById('pintarC')
const cantidadCarrito = document.getElementById('cantidadCarrito')

let arrayDatosUtopia = []
let arrayCarrito = []
const ua = navigator.userAgent

const formatterPeso = new Intl.NumberFormat('es-CO', {
    style: 'currency',
    currency: 'COP',
    minimumFractionDigits: 0
})
/////////  funciones  ///////////////
const CrearItemDatos = (datosCompraArray) => {
    let itemDatos = {
        cedula: datosCompraArray.cedulaarray,
        nombres: datosCompraArray.nombresarray,
        apellidos: datosCompraArray.apellidosarray,
        telefono: datosCompraArray.telefonoarray,
        email: datosCompraArray.emailarray,
        departamento: datosCompraArray.departamentoarray,
        municipio: datosCompraArray.municipioarray,
        direccion: datosCompraArray.direccionarray,
        detallesDir: datosCompraArray.detallesDirarray
    }
    arrayDatosUtopia.push(itemDatos);
    return itemDatos;
}

const GuardarBDDatos = () => {
    localStorage.setItem('datosCompradorUtopia', JSON.stringify(arrayDatosUtopia));
}

const calcularProductos = () =>{
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'))
    if (arrayCarrito === null) {arrayCarrito = [];}
    else {
        let totalProductos = 0
        arrayCarrito.forEach(element => {
            totalProductos = totalProductos +  parseInt(element.cantidad, 10);
        })
        return(totalProductos)
    }
}

const calcularValor = () =>{
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'))
    if (arrayCarrito === null) {arrayCarrito = [];}
    else {
        let totalValor = 0
        arrayCarrito.forEach(element => {
            totalValor = totalValor + (parseInt(element.cantidad,10)*parseInt(element.precio,10))
        })
        return(totalValor)
    }
}

const pintarCarrito = () => {
    productos.innerHTML = '<div class="preloader"></div>'
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'))
    if(calcularProductos() === 0){
        arrayCarrito = [];
        productos.innerHTML = `
        <div class=""cajaCarroVacio>
            <h2>El carrito está vacio =(</h2>
        </div>
        `
    }else{
        productos.innerHTML = ''
        arrayCarrito.forEach(element => {
            if (element.tipo === '1' || element.tipo === '2' || element.tipo === '3') {
                productos.innerHTML+= `
                <div class="cajapc">
                    <div class="cajapcImg">
                        <b class="d-none">${element.img}</b>
                        <b class="d-none">${element.referencia}</b>
                        <img src="${element.img}">
                    </div>    
                    <div>
                        <label for="">${element.nombre}  <br>
                        Precio = ${formatterPeso.format(element.precio)}</label>     
                        <p>
                            Ref: ${element.referencia} <br>
                            talla: ${element.talla} <br>
                        </p>   
                    </div>
                    <div class="cajapcCantidad">
                        <b class="d-none">${element.referencia}</b>
                        <b class="d-none">${element.talla}</b>
                        <b class="d-none">${element.tipo}</b>
                        <b class="d-none">${element.cantidad}</b>
                        <b>Cantidad = ${element.cantidad}</b>
                        <i class="fas fa-trash-alt eliminarProd"></i>
                    </div>      
                </div>
                `;
            }else{
                productos.innerHTML+= `
                <div class="cajapc">
                    <div class="cajapcImg">
                        <b class="d-none">${element.img}</b>
                        <b class="d-none">${element.referencia}</b>
                        <img src="${element.img}">
                    </div>    
                    <div>
                        <label for="">${element.nombre}  <br>
                            Precio = ${formatterPeso.format(element.precio)}</label>     
                        <p>
                            Ref: ${element.referencia} <br>
                        </p>   
                    </div>
                    <div class="cajapcCantidad">
                    <label>Cantidadsasdasd</label>
                        <div>
                            <b class="d-none">${element.referencia}</b>
                            <b class="d-none">${element.talla}</b>
                            <b class="d-none">${element.tipo}</b>
                            <b class="d-none">${element.cantidad}</b>
                            <b>${element.cantidad}</b>
                            <i class="fas fa-trash-alt eliminarProd"></i>
                        </div>    
                    </div>   
                </div>
                `;
            }
            
        });
        productos.innerHTML+= `
        <div class="cajaValorComprar">
            <div><label>Cantida de Productos</label><b>${calcularProductos()}</b></div>
            <div><label>Valor a pagar</label> <b>$ ${calcularValor()}</b></div>
        </div>
        `
    } 
}

const respuestaPedido = (forma_pago) =>{
    if (forma_pago === 'nequi') {
        formulario.innerHTML = `
        <div class="respuestaCompra">
            <h4 class="naranja">Pedido Pendiente por pago</h4>
            <span>Datos cuenta nequi</span>
            <span class="naranja">Celular: 3046236417</span>
            <span class="naranja">Cantidad: ${calcularValor()} </span>
            <span>Mensaje: nombre del comprador<span>
            <p>Enviar la captura de pantalla de pago por nequi a este whatsapp +57 3046236417</p>
            <p>Su pedido entra a proceso de despacho de 1 a 5 días habiles después de realizar el pago.</p>
            <p>Su pedido se enviará contraentrega</p>
        </div>
    
    <h3>Mis productos</h3>
    `
    }else if (forma_pago === 'bancolombia') {
        formulario.innerHTML = `
        <div class="respuestaCompra">
            <h4 class="naranja">Pedido Pendiente por pago</h4>
            <span>Datos cuenta bancolombia</span>
            <span class="naranja">Valor: ${calcularValor()} </span>
            <span class="naranja"># cuenta: 47684057762</span>
            <span class="naranja">Cuenta de ahorros</span>
            <span>Edgar Duvan Leal Ropero</span>
            <span>C.C 1094270086</span>
            <p>Enviar la captura de pantalla de pago por bancolombia a este whatsapp +57 3046236417</p>
            <p>Su pedido entra a proceso de despacho de 1 a 5 días habiles después de realizar el pago.</p>
            <p>Su pedido se enviará contraentrega</p>
        </div>
    
    <h3>Mis productos</h3>
    `
    }else if (forma_pago === 'contraentrega') {
        formulario.innerHTML = `
        <div class="respuestaCompra">
            <h4 class="naranja">Realizará el pago cuando le llevemos su pedido</h4>
            <span>PAGO CONTRAENTREGA</span>
            <span class="naranja">Valor que debe cancelar: ${calcularValor()} </span>
            <p>Su pedido entra a proceso de despacho de 1 a 5 días habiles después de verificar tus datos.</p>
            <p>Su pedido se enviará contraentrega</p>
        </div>
    
    <h3>Mis productos</h3>
    `
    }else if (forma_pago === 'daviplata') {
        formulario.innerHTML = `
        <div class="respuestaCompra">
            <h4 class="naranja">Pedido Pendiente por pago</h4>
            <span>Datos cuenta daviplata</span>
            <span class="naranja">Valor: ${calcularValor()} </span>
            <span class="naranja">Numero daviplata: 3102294954</span>
            <span class="naranja">Cedula: 88034965</span>
            <p>Enviar la captura de pantalla de pago por daviplata a este whatsapp +57 3102294954</p>
            <p>Su pedido entra a proceso de despacho de 1 a 5 días habiles después de realizar el pago.</p>
            <p>Su pedido se enviará contraentrega</p>
        </div>
    
    <h3>Mis productos</h3>
    `
    }else{
        formulario.innerHTML = `
        <div class="respuestaCompra">
            <h4 class="naranja">Transacción exitosa</h4>
            <span>Estado de la orden</span>
            <span class="naranja">${state}</span>
            <span>ID de la orden</span>
            <span class="naranja">${orderId}</span>
            <span>ID transacción</span>
            <span class="naranja">${transactionId}</span>
            <h4>A tener en cuenta</h4>
            <p>Su pedido entra a proceso de despacho de 1 a 5 días habiles</p>
            <p>Su pedido se enviará contraentrega</p>
        </div>
    
    <h3>Mis productos</h3>
    `
    }
     
}

const crearCliente = () =>{
    let datosCliente = new FormData(formulario)
    fetch( URL.url_clientes+'crearCliente',{
        method: 'POST',
        body: datosCliente
    })
    .then( datos => datos.json() )
    .then( data =>{
    })
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

const crearPedido = (datosCompraArray,orderId,transactionId,forma_pago,state) =>{
    let hoy = new Date()
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'));
    let arrayCarritoJSON = JSON.stringify(arrayCarrito)
    let precio=0

    let datosEnvio = `
    <p>Departamento: ${datosCompraArray.departamentoarray}</p>
    <p>Municipio: ${datosCompraArray.municipioarray}</p>
    <p>Dirección: ${datosCompraArray.direccionarray}</p>
    <p>Detalles: ${datosCompraArray.detallesDirarray}</p>
    `

    for (let j = 0; j < arrayCarrito.length; j++) {
        let element = arrayCarrito[j]; 
        formulario.innerHTML += `
        <div class="CajaProductoPrincipal">
                <div>
                    <label for="">Producto: ${element.nombre}</label> 
                    <label class="precio">Precio:${element.precio}</label>
                </div>
                <div class="cajaProducto">    
                    <div class="cajaProducto1">
                        <img src="${element.img}" alt="${element.nombre}">
                    </div>
                    <div class="cajaProducto2">
                        <p>Ref: ${element.referencia} <br></p>
                        <label>${element.cantidad}</label>
                    </div>
                </div>
            </div>`
        precio = precio + (parseInt(element.precio, 10) * parseInt(element.cantidad, 10))
    }
    let idPedido = hoy.getTime()
    let crearPedido = new FormData()
    crearPedido.append('id', idPedido)
    crearPedido.append('cedulaComprador', datosCompraArray.cedulaarray)
    crearPedido.append('datosEnvio', datosEnvio)
    crearPedido.append('listaCompra',arrayCarritoJSON)
    crearPedido.append('precioPedido', precio)
    crearPedido.append('formaPago', forma_pago)
    crearPedido.append('orderId', orderId)
    crearPedido.append('transactionId', transactionId)
    crearPedido.append('fechaCompra', hoy)
    crearPedido.append('estadopayu', state)
    fetch( URL.url_pedidos+'crear',{
        method: 'POST',
        body: crearPedido
    })
    .then(datos=>datos.json() )
    .then(datos=>{
        if (datos === 'ok') {
            crearListaPedido(idPedido)
        }
    })   
}

const enviarCorreoAlComprador = (datosCompraArray,orderId,transactionId,forma_pago) =>{
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'));
    let precio=0
    let listaCompra = `
    <h3>Que compre</h3>
    <div>
    <table>
        <thead>
        <tr>
            <th scope="col">ITEM</th>
            <th scope="col">Referencia</th>
            <th scope="col">Nombre</th>
            <th scope="col">Detalles</th>
            <th scope="col">Valor</th>
            <th scope="col">Cantidad</th>
        </tr>
        </thead>
        <tbody>
    `
    for (let j = 0; j < arrayCarrito.length; j++) {
        let element = arrayCarrito[j]; 
        listaCompra +=`
        <tr>
            <td>${j}</td>
            <td>${element.referencia}</td>
            <td>${element.nombre}</td>
            <td>${element.talla}</td>
            <td>${element.precio}</td>
            <td>${element.cantidad}</td>
        </tr>
        `
        precio = precio + (parseInt(element.precio, 10) * parseInt(element.cantidad, 10))
    }
    listaCompra += `</tbody></table></div>`
    let datosCorreoComprador = new FormData()
    datosCorreoComprador.append('emailComprador', datosCompraArray.emailarray)
    datosCorreoComprador.append('nombreComprador', datosCompraArray.nombresarray)
    datosCorreoComprador.append('orderId', orderId)
    datosCorreoComprador.append('transactionId', transactionId)
    datosCorreoComprador.append('valorPagado', precio)
    datosCorreoComprador.append('listaCompra', listaCompra)
    datosCorreoComprador.append('formaPago', forma_pago)
    
    fetch( URL.url_correo_comprador ,{
        method: 'POST',
        body: datosCorreoComprador,
        mode: "no-cors"
        })
}

const enviarCorreoAlVendedor = (forma_pago) =>{
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'));
    let precio=0
    let listaCompra = `
    <h3>Que compre</h3>
    <div>
    <table>
        <thead>
        <tr>
            <th scope="col">ITEM</th>
            <th scope="col">Referencia</th>
            <th scope="col">Nombre</th>
            <th scope="col">Detalles</th>
            <th scope="col">Valor</th>
            <th scope="col">Cantidad</th>
        </tr>
        </thead>
        <tbody>
    `

    for (let j = 0; j < arrayCarrito.length; j++) {
        let element = arrayCarrito[j]; 
        listaCompra +=`
        <tr>
            <td>${j}</td>
            <td>${element.referencia}</td>
            <td>${element.nombre}</td>
            <td>${element.talla}</td>
            <td>${element.precio}</td>
            <td>${element.cantidad}</td>
        </tr>
        `
        precio = precio + (parseInt(element.precio, 10) * parseInt(element.cantidad, 10))
    }
    listaCompra += `</tbody></table></div>`
    for (let y = 0; y < arrayCarrito.length; y++) {
        let element = arrayCarrito[y];

            let datosCorreoCompra = new FormData()
            datosCorreoCompra.append('lista', listaCompra)
            datosCorreoCompra.append('valorPagado', precio)
            datosCorreoCompra.append('nombre', element.nombre)
            datosCorreoCompra.append('emailVendedor', element.emailVendedor)
            datosCorreoCompra.append('formaPago', forma_pago)
                
            fetch( URL.url_correo_vendedor ,{ 
                method: 'POST',
                body: datosCorreoCompra,
                mode: "no-cors"
            })     
    }
}
///////// eventos  ///////////////
formaPago.addEventListener('change', ()=>{
    cajaFormaPago.innerHTML = ''
    let pago = formaPago.value
    if (pago === 'Credito') {
        cajaFormaPago.innerHTML = `
            <h3>DATOS DEL PAGADOR</h3>
            <div id="cajaSINO" class="cajaSINO">
                <label>Son los mismos datos del comprador</label>
                <div>
                    <b>SI</b>
                    <b>NO</b>
                </div>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="cedulaPagador" name="cedulaPagador" placeholder="Documento" title="error en la cedula" pattern="^[0-9]+$" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="telefonoPagador" name="telefonoPagador" placeholder="Tel&eacute;fono" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="nombresPagador" name="nombresPagador" placeholder="Nombres" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="apellidosPagador" name="apellidosPagador" placeholder="Apellidos" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="emailPagador" name="emailPagador" placeholder="Email" title="email incorrecto" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" required>
            </div>

            <div class="form-group">
                <input type="number" class="form-control" id="postal" name="postal" placeholder="Codigo postal" required>
            </div>
            <h3>DATOS DE LA TARJETA</h3>
            <div class="form-group">
                <select class="form-control" id="TTarjeta" name="TTarjeta" required>
                  <option value="">Seleccione el tipo de tarjeta</option>
                  <option value="VISA">VISA</option>
                  <option value="MASTERCARD">MASTERCARD</option>
                  <option value="AMEX">AMERICAN EXPRESS</option>
                  <option value="DINERS">DINERS CLUB</option>
                </select>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="Ntarjeta" name="Ntarjeta" placeholder="N&uacute;mero de tarjeta">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="Nsugridad" name="Nseguridad" placeholder="N&uacute;mero de seguridad">
            </div>
            <label>fecha de vencimiento</label>
            <div class="form-group fechaVen">
                <select class="form-control" id="mes" name="mes" required>
                    <option value="">MES</option>
                    <option value="01">enero</option>
                    <option value="02">febrero</option>
                    <option value="03">marzo</option>
                    <option value="04">abril</option>
                    <option value="05">mayo</option>
                    <option value="06">junio</option>
                    <option value="07">julio</option>
                    <option value="08">agosto</option>
                    <option value="09">septiembre</option>
                    <option value="10">octubre</option>
                    <option value="11">noviembre</option>
                    <option value="12">diciembre</option>
                </select>
                <select class="form-control" id="ano" name="ano" required>
                    <option value="">AÑO</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                </select>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="Ncuotas" name="Ncoutas" placeholder="N&uacute;mero de Coutas">
            </div>
        `
        document.getElementById('cajaSINO').addEventListener('click', (e)=>{
            e.preventDefault()
            if(e.target.innerHTML === 'SI'){
                document.getElementById('cedulaPagador').value = document.getElementById('cedula').value
                document.getElementById('telefonoPagador').value = document.getElementById('telefono').value
                document.getElementById('nombresPagador').value = document.getElementById('nombres').value
                document.getElementById('apellidosPagador').value = document.getElementById('apellidos').value
                document.getElementById('emailPagador').value = document.getElementById('email').value
            }else if(e.target.innerHTML === 'NO'){
                document.getElementById('cedulaPagador').value = ''
                document.getElementById('telefonoPagador').value = ''
                document.getElementById('nombresPagador').value = ''
                document.getElementById('apellidosPagador').value = ''
                document.getElementById('emailPagador').value = ''
            }
        })
    }else if(pago === 'Efectivo'){
        cajaFormaPago.innerHTML = `
        <select class="form-control" id="efectyBaloto" name="efectyBaloto">
                  <option value="">Forma de pago</option>
                  <option value="Efecty">Efecty</option>
                  <option value="Baloto">Baloto</option>
        </select>
        `
    }else if(pago === 'PSE'){
        cajaFormaPago.innerHTML = `
        PSE
        `
    }else if(pago === 'nequi'){
        cajaFormaPago.innerHTML = `
        Transferencia por NEQUI
        `
    }else if(pago === 'bancolombia'){
        cajaFormaPago.innerHTML = `
        Transferencia por BANCOLOMBIA
        `
    }else if(pago === 'daviplata'){
        cajaFormaPago.innerHTML = `
        Transferencia por DAVIPLATA
        `
    }else if(pago === 'contraentrega'){
        cajaFormaPago.innerHTML = `
        PAGO CONTRAENTREGA
        `
    }else{
        cajaFormaPago.innerHTML = `<b>No se ha seleccionado la forma de pago</b>`
    }
})

departamento.addEventListener('change', () =>{
    municipio.innerHTML = ''
    municipio.innerHTML = `
				<option value="">Seleccione municipio</option>
			`
    let dep = departamento.value
    fetch( URL.url_municipios )
	.then( datos=>datos.json() )
	.then( datos=>{
        for(let dato of datos){
            if (dato.departamento.indexOf(dep) !== -1) {
                for (let j = 0; j < dato.ciudades.length; j++) {
                    let element = dato.ciudades[j]; 
                    municipio.innerHTML+= `
                        <option value="${element}">${element}</option>
                    `
                }
                
            }
		}
	})
})

formulario.addEventListener('submit', (e)=>{
    e.preventDefault()
        let datos = new FormData(formulario)
        console.log(datos.get('cedula'))
        if (datos.get('cedula') === '' || datos.get('telefono') === '' || datos.get('nombres') === '' || datos.get('apellidos') === '' || datos.get('departamento') === '' || datos.get('municipio') === '' || datos.get('direccion') === '' || datos.get('formaPago') === '' || datos.get('efectyBaloto') === '' || datos.get('postal') === '' || datos.get('Ntarjeta') === '' || datos.get('Nseguridad') === '' || datos.get('Fechaexpedicion') === '' || datos.get('Ncuotas') === '' ) {
            if (datos.get('cedula') === '') {cedula.style.border = 'solid 1px red'}else{cedula.style.border = 'solid 1px transparent'}
            if (datos.get('telefono') === '') {telefono.style.border = 'solid 1px red'}else{telefono.style.border = 'solid 1px transparent'}
            if (datos.get('nombres') === '') {nombres.style.border = 'solid 1px red'}else{nombres.style.border = 'solid 1px transparent'}
            if (datos.get('apellidos') === '') {apellidos.style.border = 'solid 1px red'}else{apellidos.style.border = 'solid 1px transparent'}
            if (datos.get('departamento') === '') {departamento.style.border = 'solid 1px red'}else{departamento.style.border = 'solid 1px transparent'}
            if (datos.get('municipio') === '') {municipio.style.border = 'solid 1px red'}else{municipio.style.border = 'solid 1px transparent'}
            if (datos.get('direccion') === '') {direccion.style.border = 'solid 1px red'}else{direccion.style.border = 'solid 1px transparent'}
            if (datos.get('formaPago') === '') {formaPago.style.border = 'solid 1px red'}else{formaPago.style.border = 'solid 1px transparent'}
            if (datos.get('efectyBaloto') === '') {cajaFormaPago.style.border = 'solid 1px red'}else{cajaFormaPago.style.border = 'solid 1px transparent'}

            alert('llenar todos los datos')      
        }else{
            if (datos.get('cedula') === '') {cedula.style.border = 'solid 1px red'}else{cedula.style.border = 'solid 1px transparent'}
            if (datos.get('telefono') === '') {telefono.style.border = 'solid 1px red'}else{telefono.style.border = 'solid 1px transparent'}
            if (datos.get('nombres') === '') {nombres.style.border = 'solid 1px red'}else{nombres.style.border = 'solid 1px transparent'}
            if (datos.get('apellidos') === '') {apellidos.style.border = 'solid 1px red'}else{apellidos.style.border = 'solid 1px transparent'}
            if (datos.get('departamento') === '') {departamento.style.border = 'solid 1px red'}else{departamento.style.border = 'solid 1px transparent'}
            if (datos.get('municipio') === '') {municipio.style.border = 'solid 1px red'}else{municipio.style.border = 'solid 1px transparent'}
            if (datos.get('direccion') === '') {direccion.style.border = 'solid 1px red'}else{direccion.style.border = 'solid 1px transparent'}
            if (datos.get('formaPago') === '') {formaPago.style.border = 'solid 1px red'}else{formaPago.style.border = 'solid 1px transparent'}
            if (datos.get('efectyBaloto') === '') {cajaFormaPago.style.border = 'solid 1px red'}else{cajaFormaPago.style.border = 'solid 1px transparent'}

            if (datos.get('formaPago') === 'Efectivo') {
                if(datos.get('efectyBaloto') === ''){cajaFormaPago.classList.add('rojo')}else{cajaFormaPago.classList.remove('rojo')}
            }else if (datos.get('formaPago') === 'Credito') {
                if(datos.get('postal') === '' || datos.get('Ntarjeta') === '' || datos.get('Nseguridad') === '' || datos.get('Fechaexpedicion') === '' || datos.get('Ncuotas') === '' ){cajaFormaPago.classList.add('rojo')}else{cajaFormaPago.classList.remove('rojo')}
            }else if (datos.get('formaPago') === 'PSE') {

            }
            console.log('ok') 
            let forma_pago = datos.get('formaPago')
            let datosCompraArray = {
                nombresarray: datos.get('nombres'),
                apellidosarray: datos.get('apellidos'),
                cedulaarray: datos.get('cedula'),
                telefonoarray: datos.get('telefono'),
                emailarray: datos.get('email'),
                departamentoarray: datos.get('departamento'),
                municipioarray: datos.get('municipio'),
                direccionarray: datos.get('direccion'),
                detallesDirarray: datos.get('detalles'),
            }
            CrearItemDatos(datosCompraArray)
            //GuardarBDDatos()
            crearCliente()
            formulario.reset()
            cajaBtnComprar.innerHTML = `<div class="preloader"></div>`
            /////////////////////  SDK PAYU  ///////////////////////
            if(forma_pago === 'nequi'){
                respuestaPedido(forma_pago)
                crearPedido(datosCompraArray,'nequi','nequi',forma_pago,'pendiente')
                enviarCorreoAlComprador(datosCompraArray,'nequi','nequi',forma_pago)
                //enviarCorreoAlVendedor(forma_pago)
                //borrarCarrito()
            }else if(forma_pago === 'bancolombia'){
                crearPedido(datosCompraArray,'bancolombia','bancolombia',forma_pago,'pendiente')
                cargarBilletera('bancolombia')
                enviarCorreoAlComprador(datosCompraArray,'bancolombia','bancolombia',forma_pago)
                enviarCorreoAlVendedor(forma_pago)
                enviarCorreoHulagomall(datosCompraArray,forma_pago)
                borrarCarrito()
            }else if(forma_pago === 'contraentrega'){
                crearPedido(datosCompraArray,'contraentrega','contraentrega',forma_pago,'pendiente')
                cargarBilletera('contraentrega')
                enviarCorreoAlComprador(datosCompraArray,'contraentrega','contraentrega',forma_pago)
                enviarCorreoAlVendedor(forma_pago)
                enviarCorreoHulagomall(datosCompraArray,forma_pago)
                borrarCarrito()
            }else if(forma_pago === 'daviplata'){
                crearPedido(datosCompraArray,'daviplata','daviplata',forma_pago,'pendiente')
                cargarBilletera('daviplata')
                enviarCorreoAlComprador(datosCompraArray,'daviplata','daviplata',forma_pago)
                enviarCorreoAlVendedor(forma_pago)
                enviarCorreoHulagomall(datosCompraArray,forma_pago)
                borrarCarrito()
            }else if(forma_pago === 'Credito'){
                let datosPayu = new FormData()
                datosPayu.append('nombres', datos.get('nombres'))
                datosPayu.append('apellidos', datos.get('apellidos'))
                datosPayu.append('cedula',datos.get('cedula'))
                datosPayu.append('telefono', datos.get('telefono'))
                datosPayu.append('email', datos.get('email'))
                datosPayu.append('departamento', datos.get('departamento'))
                datosPayu.append('municipio', datos.get('municipio'))
                datosPayu.append('direccion', datos.get('direccion'))
                datosPayu.append('detalles', datos.get('detalles'))
                datosPayu.append('formaPago', forma_pago)
                datosPayu.append('valortotal', calcularValor())
                datosPayu.append('postal', datos.get('postal'))
                datosPayu.append('TTarjeta', datos.get('TTarjeta'))
                datosPayu.append('Ntarjeta', datos.get('Ntarjeta'))
                datosPayu.append('Nseguridad', datos.get('Nseguridad'))
                datosPayu.append('expiration', datos.get('ano')+'/'+datos.get('mes'))
                datosPayu.append('Ncoutas', datos.get('Ncoutas'))
                datosPayu.append('cedulaPagador', datos.get('cedulaPagador'))
                datosPayu.append('nombresPagador', datos.get('nombresPagador'))
                datosPayu.append('apellidosPagador', datos.get('apellidosPagador'))
                datosPayu.append('telefonoPagador', datos.get('telefonoPagador'))
                datosPayu.append('emailPagador', datos.get('emailPagador'))
                datosPayu.append('userAgente', ua)

                fetch( URL.url_pagos+forma_pago,{
                    method: 'POST',
                    body: datosPayu
                    })
                    .then( res => res.json())
                    .then( data => {
                            let orderId = (data.transactionResponse.orderId)
                            let transactionId = (data.transactionResponse.transactionId)
                            let state = (data.transactionResponse.state)
                            if(state === 'APPROVED'){
                                crearPedido(datosCompraArray,orderId,transactionId,forma_pago,state)
                                //enviarCorreoAlComprador(datosCompraArray,orderId,transactionId,forma_pago)
                                //enviarCorreoAlVendedor(forma_pago)
                                //enviarCorreoHulagomall(datosCompraArray,forma_pago)
                                //actualizarInventario()
                            }else if(state === 'DECLINED'){
                                formulario.innerHTML = ''
                                pintarC.innerHTML = ''
                                cajaBtnComprar.innerHTML = `transación negada`
                                transaccionNegada()
                            }else if(state === 'PENDING'){
                                let pendingReason = data.transactionResponse.pendingReason
                                transaccionPendiente()
                            }else if(state === 'ERROR'){
                                let pendingReason = data.transactionResponse.pendingReason
                                transaccionPendiente()
                            }
                })
            }
        }        
})

document.addEventListener('DOMContentLoaded', pintarCarrito)
