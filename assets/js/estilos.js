import URL from "./url.js"
const buscador = document.getElementById('buscador')
const formBuscador = document.getElementById('formBuscador')
const cantidadCarrito = document.getElementById('cantidadCarrito')
const item = document.getElementById('item')
const categorias = document.getElementById('categorias')
const principal = document.getElementById('principal')
const mostrarProducto = document.getElementById('mostrarProducto')
const mostrarFiltro = document.getElementById('mostrarFiltro')
const imgPeque = document.getElementById('imgPeque')
const imgGrande = document.getElementById('imgGrande')
const info = document.getElementById('info')
const agregando = document.getElementById('agregando')
const texto = document.getElementById('texto')
const botonAgregar = document.getElementById('botonAgregar')
const zoom = document.getElementById('zoom')
const cerrar = document.getElementById('cerrar')
const acaTalla = document.getElementById('acaTalla')
const defineTalla = document.getElementById('defineTalla')
const mensajes = document.getElementById('mensajes')
const contacto = document.getElementById('contacto')
const formContacto = document.getElementById('formContacto')
const cuerpo = document.querySelector('body')
cuerpo.style.backgroundColor = '#ffffff'

const formatterPeso = new Intl.NumberFormat('es-CO', {
    style: 'currency',
    currency: 'COP',
    minimumFractionDigits: 0
})

let arrayCarrito = []

//////////// FUNCIONES /////////////
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

const actualizarDB = () => {
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'));
    if(arrayCarrito === null){arrayCarrito = [];}
    else{arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'));
}}

const sumarCantidad = (ref,talla,tipo) =>{
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'))
    if (tipo === '1' || tipo === '2' || tipo === '3') {
        let indexArray = arrayCarrito.findIndex((element)=>element.referencia === ref && element.talla === talla)
        arrayCarrito[indexArray].cantidad = (parseInt(arrayCarrito[indexArray].cantidad,10) + 1).toString()
        GuardarBD()
    }else{
        let indexArray = arrayCarrito.findIndex((element)=>element.referencia === ref)
        arrayCarrito[indexArray].cantidad = (parseInt(arrayCarrito[indexArray].cantidad,10) + 1).toString()
        GuardarBD()
    }
}

const CrearItem = (ref,nombre,precio,img,tipo,talla) => {
    let coincidencia = 0
    let cantidadCarrito = 0
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'))
    if (arrayCarrito === null){
        arrayCarrito = []
    }else{
        if (tipo === '1' || tipo === '2' || tipo === '3') {
            arrayCarrito.forEach(element =>{
                if(element.referencia === ref && element.talla === talla){
                    coincidencia = 1
                    cantidadCarrito = element.cantidad
                }
            })
        }else{
            arrayCarrito.forEach(element =>{
                if(element.referencia === ref){
                    coincidencia = 1
                    //cantidadCarrito = element.cantidad OJO CON ESTO REVISAR
                }
            })
        }  
    }
    
    if (coincidencia === 0) {
        let item = {
            referencia: ref, 
            tipo: tipo,
            nombre: nombre,
            talla: talla,
            precio: precio,
            img: img,
            cantidad: 1
        }
        arrayCarrito.push(item);
        mensajes.innerHTML = ''
        mensajes.innerHTML = `<span class="mensajeAgrego">Se agreg&oacute; al carrito</span>`
        return item;
    }else{
        let indexArray
        let nc

        let datosBusqueda = new FormData()
        datosBusqueda.append('refe', ref)
        datosBusqueda.append('tall', talla)
        fetch( URL.url_tallas+'cantidad' ,{
            method: 'POST',
            body: datosBusqueda
            })
            .then( datos => datos.json() )
            .then( dato=>{
                let laCantidad = dato[0].talla_cantidad
                console.log(laCantidad)
                if ( cantidadCarrito+1 < laCantidad ) {
                    nc = parseInt(cantidadCarrito) + 1
                    arrayCarrito.forEach((element ,index) => {
                        if(element.referencia === ref && element.talla === talla){
                            indexArray = index;
                        }  
                    })
                    arrayCarrito[indexArray].cantidad = nc.toString();
                    sumarCantidad(ref,talla,tipo)
                    mensajes.innerHTML = ''
                    mensajes.innerHTML = `<span class="mensajeAgrego">Se agreg&oacute; al carrito</span>`
                }else{
                    alert('no disponemos de mas inventario')
                }
            })
        
    }
}

const GuardarBD = () => {
    localStorage.setItem('carritoUtopia', JSON.stringify(arrayCarrito));
    cantidadCarrito.innerHTML = ''
    cantidadCarrito.innerHTML = `<i class="fas fa-cart-plus"></i><b>${calcularProductos()}</b>`
}

const pintarCarrito = () => {
    imgPeque.style.minHeight = '0rem'
    principal.innerHTML = '<div class="preloader"></div>'
    arrayCarrito = JSON.parse(localStorage.getItem('carritoUtopia'))
    if(calcularProductos() === 0){
        arrayCarrito = [];
        principal.innerHTML = `
        <div class="cajaCarroVacio">
            <span>El carrito está vacio </span>
            <i class="far fa-sad-cry"></i>
            <a href="home">Volver al inicio</a>
        </div>
        `
    }else{
        principal.innerHTML = `
        <h2 class="tituloCategoria">En el carrito</h2>
        `
        arrayCarrito.forEach(element => {
            if (element.tipo === '1' || element.tipo === '2' || element.tipo === '3') {
                principal.innerHTML+= `
                <div class="cajapc">
                    <div class="cajapcImg">
                        <b class="d-none">${element.img}</b>
                        <b class="d-none">${element.referencia}</b>
                        <img src="${element.img}">
                    </div>    
                    <div class="cajapcInf">
                        <label for="">${element.nombre}  <br>
                        Precio = ${formatterPeso.format(element.precio)}</label>     
                        <p>
                            Ref: ${element.referencia} <br>
                            talla: ${element.talla} <br>
                        </p>   
                    </div>
                    <div class="cajapcCantidad">
                        <div>
                            <b class="d-none">${element.referencia}</b>
                            <b class="d-none">${element.talla}</b>
                            <b class="d-none">${element.tipo}</b>
                            <b class="d-none">${element.cantidad}</b>
                            
                            <i class="fas fa-minus btnSigno"></i>
                            <b>${element.cantidad}</b>
                            <i class="fas fa-plus btnSigno"></i>
                            <i class="fas fa-trash-alt eliminarProd"></i>
                        </div>
                    </div>    
                </div>
                `;
            }else{
                principal.innerHTML+= `
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
                        <div>
                            <b class="d-none">${element.referencia}</b>
                            <b class="d-none">${element.talla}</b>
                            <b class="d-none">${element.tipo}</b>
                            <b class="d-none">${element.cantidad}</b>
                            <i class="fas fa-minus btnSigno"></i>
                            <b>${element.cantidad}</b>
                            <i class="fas fa-plus btnSigno"></i>
                            <i class="fas fa-trash-alt eliminarProd"></i>
                        </div>    
                    </div>   
                </div>
                `;
            }
            
        });
        principal.innerHTML+= `
        <div class="cajaValorComprar">
            <div><label>Cantida de Productos</label><b>${calcularProductos()}</b></div>
            <div><label>Valor a pagar</label> <b>${formatterPeso.format(calcularValor())}</b></div>
            <a href="pagar"><button class="btnComprar">Ir a pagar</button></a>
        </div>
        `
    } 
}

const mas = (ref,talla,tipo,cantidad) =>{
    let indexArray
    let nc

        let datosBusqueda = new FormData()
        datosBusqueda.append('refe', ref)
        datosBusqueda.append('tall', talla)
        fetch( URL.url_tallas+'cantidad' ,{
            method: 'POST',
            body: datosBusqueda
            })
            .then( datos => datos.json() )
            .then( dato=>{
                let laCantidad = dato[0].talla_cantidad
                console.log(laCantidad)
                if (cantidad < laCantidad ) {
                    nc = parseInt(cantidad) + 1
                    arrayCarrito.forEach((element ,index) => {
                        if(element.referencia === ref && element.talla === talla){
                            indexArray = index;
                        }  
                    })
                    arrayCarrito[indexArray].cantidad = nc.toString();
                        GuardarBD()
                        pintarCarrito()
                }else{
                    alert('no disponemos de mas inventario')
                }
            })
    
}

const menos = (ref,talla,tipo,cantidad) =>{
    let indexArray
    
    if(cantidad === '1'){
        alert('la cantidad no puede ser 0')
    }else{
        let nc = parseInt(cantidad) - 1
        if (tipo === '1' || tipo === '2') {
            arrayCarrito.forEach((element ,index) => {
                if(element.referencia === ref && element.talla === talla){
                    indexArray = index;
                }  
            });
        }else{
            arrayCarrito.forEach((element ,index) => {
                if(element.referencia === ref){
                    indexArray = index;
                }  
             });
        }
        
        arrayCarrito[indexArray].cantidad = nc.toString()
        GuardarBD()
        pintarCarrito()
    }
}

const Eliminar = (ref,talla,tipo) =>{
    let indexArray;
    if(tipo === '1' || tipo === '2'){
        arrayCarrito.forEach((element ,index) => {
            if(element.referencia === ref && element.talla === talla){
                indexArray = index;
            }  
        });
    }else{
        arrayCarrito.forEach((element ,index) => {
            if(element.referencia === ref){
                indexArray = index;
            }  
        });
    }
    
    arrayCarrito.splice(indexArray,1)
    GuardarBD()
    pintarCarrito()
    alert('se eliminará el producto del carrito')
}

const Filtrar = () => {
    window.scrollTo(0,0) 
    principal.innerHTML = '<div class="preloader"></div>'
    principal.innerHTML = ''
    let texto = buscador.value.toLowerCase();
    let datosB = new FormData()
    datosB.append('texto',texto)
    if (texto === '') {
        principal.innerHTML = ''
        principal += 'El campo de busqueda está vacio, escribe lo que quieres buscar'
    }else{
    fetch( URL.url_producto+'filtrar',{
        method: 'POST',
        body: datosB
    })
    .then( datos=>datos.json() )
    .then( datos=>{
        if (datos.length === 0) {
            principal.innerHTML = ''
            principal.innerHTML += `No se encontraron productos con este texto "${texto}"`}
        else{
            principal.innerHTML = ''
            principal.innerHTML = `<h2 class="tituloCategoria">Resultados del filtro</h2>`
                for (let index = 0; index < datos.length; index++) {
                const dato = datos[index];
                    if(dato.tip_id === '1' || dato.tip_id === '2' || dato.tip_id === '3'){
                        principal.innerHTML += `
                        <div class="cajaProducto">
                            <img src="./assets/img/productos/${dato.pro_img}" alt="${dato.pro_ref}" class="esProducto">
                            <div class="cajainfo">
                                <label>${dato.pro_nombre}</label>
                                <span>$ ${dato.pro_precio}</span>
                            </div>
                        </div>
                        `
                    }
                }  
            }
        }
    )
}}

///////////// EVENTOS ////////////////// 
formBuscador.addEventListener('submit', (e)=>{
    e.preventDefault()
    Filtrar()
    //guardarFiltro()
    formBuscador.reset()
    imgPeque.innerHTML = ''
        imgGrande.innerHTML = ''
        acaTalla.innerHTML = ''
        defineTalla.innerHTML = ''
        defineTalla.style.height = '0'
        defineTalla.style.width = '100%'
        defineTalla.style.alignItems = 'center'
        defineTalla.style.justifyContent = 'left'
        texto.innerHTML = ''
        botonAgregar.innerHTML = ''
        cerrar.innerHTML = ''
        mostrarProducto.style.backgroundColor = '#ffffff'
        mostrarProducto.style.paddingTop = '0'
        mostrarProducto.style.paddingBottom = '0'
        imgPeque.style.minHeight = '.1rem'
        imgPeque.style.marginTop = '.1rem'
        acaTalla.style.border = 'none'
})

principal.addEventListener('click',(e)=>{
    if(e.target.className === 'fas fa-minus btnSigno'){
        let ref = e.target.parentElement.children[0].innerHTML
        let talla = e.target.parentElement.children[1].innerHTML
        let tipo = e.target.parentElement.children[2].innerHTML
        let cantidad = e.target.parentElement.children[3].innerHTML
        menos(ref,talla,tipo,cantidad)
    }else if (e.target.className === 'fas fa-plus btnSigno') {
        let ref = e.target.parentElement.children[0].innerHTML
        let talla = e.target.parentElement.children[1].innerHTML
        let tipo = e.target.parentElement.children[2].innerHTML
        let cantidad = e.target.parentElement.children[3].innerHTML
        mas(ref,talla,tipo,cantidad)
    }else if (e.target.className === 'fas fa-trash-alt eliminarProd') {
        let ref = e.target.parentElement.children[0].innerHTML
        let talla = e.target.parentElement.children[1].innerHTML
        let tipo = e.target.parentElement.children[2].innerHTML
        console.log('eliminando prod')
        Eliminar(ref,talla,tipo)
    }else if(e.target.tagName === 'IMG' && e.target.className === 'esProducto'){
        let imgInicial = e.target.currentSrc
        mostrarProducto.style.transition = 'transform 1s ease, opacity 1s ease'
        mostrarProducto.style.transition = '1s ease-in-out'
        mostrarProducto.style.backgroundColor = '#ffffff'
        mostrarProducto.style.paddingTop = '3rem'
        mostrarProducto.style.paddingBottom = '3rem'
        mostrarProducto.style.marginTop = '6rem'
        imgPeque.style.minHeight = '5rem'
        imgPeque.style.marginTop = '.5rem'
        window.scrollTo(0,0) 
        let id = e.target.alt
        console.log(id)
        let datosID = new FormData()
        datosID.append('id', id)

        fetch( URL.url_imagenes+'verProductos',{
            method: 'POST',
            body: datosID
        })
        .then( datos => datos.json())
        .then( datos =>{
            console.log(datos)
                imgPeque.innerHTML = ''
                imgPeque.innerHTML = `<img src="${imgInicial}" alt="">`
                for(let dato of datos){
                imgPeque.innerHTML += `
                    <img src="./assets/img/productos/${dato.img_html}" alt=""> 
                `
                }
        })
        acaTalla.innerHTML = ''
        defineTalla.innerHTML = ''
        defineTalla.style.height = '0'
        defineTalla.style.width = '100%'
        defineTalla.style.alignItems = 'center'
        defineTalla.style.justifyContent = 'left'
        defineTalla.style.color = 'white'
        fetch( URL.url_producto+'verProducto',{ 
            method: 'POST',
            body: datosID
        })
        .then( datos => datos.json() )
        .then( dato => {
            console.log(dato)
            let referencia = dato[0].pro_ref
            imgGrande.innerHTML = `
                <img src="./assets/img/productos/${dato[0].pro_img}" alt="${dato[0].pro_img}">
            `
            texto.innerHTML = `
            <h1>${dato[0].pro_nombre}</h1>
            <span>Referencia: ${dato[0].pro_ref}</span><br>
            <h3><b>Precio:</b> ${formatterPeso.format(dato[0].pro_precio)} COP</h3><br>
            <p class="descripcionProd">${dato[0].pro_descripcion}</p><br>
            <span>Producto: ${dato[0].pro_estado}</span><br>
            <span>Horma: ${dato[0].pro_horma}</span><br>
            <b class="proMarca">Tallas</b>
            `
            defineTalla.innerHTML = 'definir una talla'

            botonAgregar.innerHTML = `
            <b class="d-none">${referencia}</b>
            <b class="d-none">${dato[0].pro_nombre}</b>
            <b class="d-none">${dato[0].pro_precio}</b>
            <b class="d-none">${e.target.currentSrc}</b>
            <b class="d-none">${dato[0].tip_id}</b>
            <button class="btnComprar">agregar al carrito</button>`

            cerrar.innerHTML += `<i id="cerrar" class="fas fa-times cerrar"></i>`
            
            fetch( URL.url_tallas+referencia)
            .then( datos => datos.json() )
            .then( dato=>{
                console.log(dato)
                for(let element of dato){
                    document.getElementById('acaTalla').innerHTML += `
                    <div id="${element.talla_id}">${element.talla_numero}</div>
                    `
                }
            }) 
            
        })
    }
})

item.addEventListener('click',(e)=>{
    categorias.style.backgroundImage = ''
    categorias.classList.remove('is-activeCategorias')
    let item = e.target.innerHTML
    if(item === 'HOMBRE'){
        categorias.style.backgroundImage = 'url("assets/img/pagina/hombre.jpg")'
        categorias.style.backgroundRepeat = 'no-repeat'
        categorias.style.backgroundSize = 'cover'
        categorias.classList.toggle('is-activeCategorias')
        categorias.innerHTML = `
            <i id="cerrarhombre" class="fas fa-times"></i> 
            <!--<span>Chaquetas</span>
            <div class="chaquetas-hombre" id="chaquetas-hombre">
                <a href="chaquetas-hombre-antifluidos">Antifluidos</a>
                <a href="chaquetas-hombre-jean">Jean</a>
            </div>-->

            <span class="spanhombre">Jeans </span>
            <div class="jeans-hombre" id="jeans-hombre">
                <a class="itemhombre" href="jeans-hombre-clasico">Clásico</a>
                <!--<a href="jeans-mujer-mom-jeans">Mom Jeans</a>-->
            </div>

            <!--<span><a href="pijamas-hombre">Pijamas</a></span>-->

            <span class="spanhombre">Bioseguridad</span>
            <div class="bioseguridad-hombre" id="bioseguridad-hombre">
                <a class="itemhombre" href="tapabocas-hombre">Tapabocas</a>
                <a class="itemhombre" href="gorros-hombre">Gorros</a>
            </div>
            `
    }else if(item === 'MUJER'){
        categorias.style.backgroundImage = 'url("assets/img/pagina/mujer.jpg")'
        categorias.style.backgroundRepeat = 'no-repeat'
        categorias.style.backgroundSize = 'cover'
        categorias.classList.toggle('is-activeCategorias')
        categorias.innerHTML = `
            <i id="cerrarmujer" class="fas fa-times"></i> 
            <span class="spanmujer">Jeans</span>
            <div class="jeans-mujer" id="jeans-mujer">
                <a class="itemmujer" href="jeans-mujer-clasico">Clásico</a>
                <!--<a href="jeans-mujer-mom-jeans">Mom Jeans</a>-->
            </div>
            <span class="spanmujer">Pijamas</span>
            <div class="pijamas-mujer" id="pijamas-mujer">
                <a class="itemmujer" href="pijamas-mujer-jogger">Jogger</a>
                <a class="itemmujer" href="pijamas-mujer-blusones">Blusones</a>
                <a class="itemmujer" href="pijamas-mujer-short">Short</a>
                <a class="itemmujer" href="pijamas-mujer-pantalon">Pantalón</a>
            </div>

            <!--<span>Chaquetas </span>
            <div class="chaquetas-mujer" id="chaquetas-mujer">
                <a href="chaquetas-mujer-antifluidos">Antifluidos</a>
                <a href="chaquetas-mujer-jean">Jean</a>
            </div>-->

            <span class="spanmujer">BioSeguridad</span>
            <div class="bioseguridad-mujer" id="bioseguridad-mujer">
                <a class="itemmujer" href="tapabocas-mujer">Tapabocas</a>
                <a class="itemmujer" href="gorros-mujer">Gorros</a>
            </div>
            `
    }else if(item === 'OTROS'){
        categorias.style.backgroundImage = 'url("assets/img/pagina/otros.jpg")'
        categorias.style.backgroundRepeat = 'no-repeat'
        categorias.style.backgroundSize = 'cover'
        categorias.classList.toggle('is-activeCategorias')
        categorias.innerHTML = `
            <i class="fas fa-times"></i> 
            <span><a href="sublimacion">Sublimación</a></span>
            <span><a href="personalizacion">Personalización</a></span>
            <span><a href="pocillos">Pocillos</a></span>
            `
    }
})

categorias.addEventListener('click', (e)=>{
    //const chaquetaHombre = document.getElementById('chaquetas-hombre')
    const bioSeguridadHombre = document.getElementById('bioseguridad-hombre')
    const pijamaMujer = document.getElementById('pijamas-mujer')
    //const chaquetasMujer = document.getElementById('chaquetas-mujer')
    const jeansMujer = document.getElementById('jeans-mujer')
    const jeansHombre = document.getElementById('jeans-hombre')
    const bioSeguridadMujer = document.getElementById('bioseguridad-mujer')

    if(e.target.className === 'fas fa-times'){
        categorias.classList.toggle('is-activeCategorias')
    }else if(e.target.innerHTML === 'Bioseguridad'){
        bioSeguridadHombre.classList.toggle('acordeon-active')
        jeansHombre.classList.remove('acordeon-active')
    }else if(e.target.innerHTML.indexOf('</') !== -1){
        console.log('ningun lado')
    }else if(e.target.innerHTML === 'Pijamas'){
        pijamaMujer.classList.toggle('acordeon-active')
        jeansMujer.classList.remove('acordeon-active')
        bioSeguridadMujer.classList.remove('acordeon-active')
    }else if(e.target.innerHTML === 'Chaquetas '){
        pijamaMujer.classList.remove('acordeon-active')
        jeansMujer.classList.remove('acordeon-active')
        bioSeguridadMujer.classList.remove('acordeon-active')
    }else if(e.target.innerHTML === 'Jeans'){
        jeansMujer.classList.toggle('acordeon-active')
        pijamaMujer.classList.remove('acordeon-active')
        bioSeguridadMujer.classList.remove('acordeon-active')
    }else if(e.target.innerHTML === 'BioSeguridad'){
        bioSeguridadMujer.classList.toggle('acordeon-active')
        pijamaMujer.classList.remove('acordeon-active')
        jeansMujer.classList.remove('acordeon-active')
    }else if(e.target.innerHTML === 'Jeans '){
        jeansHombre.classList.toggle('acordeon-active')
        bioSeguridadHombre.classList.remove('acordeon-active')
    }
})

mostrarProducto.addEventListener('click',(e)=>{
    if(e.target.className === 'fas fa-times cerrar'){
        imgPeque.innerHTML = ''
        imgGrande.innerHTML = ''
        acaTalla.innerHTML = ''
        defineTalla.innerHTML = ''
        defineTalla.style.height = '0'
        defineTalla.style.width = '100%'
        defineTalla.style.alignItems = 'center'
        defineTalla.style.justifyContent = 'left'
        texto.innerHTML = ''
        botonAgregar.innerHTML = ''
        cerrar.innerHTML = ''
        mostrarProducto.style.backgroundColor = '#ececec'
        mostrarProducto.style.paddingTop = '0'
        mostrarProducto.style.paddingBottom = '0'
        mostrarProducto.style.marginTop = '0'
        imgPeque.style.minHeight = '.1rem'
        imgPeque.style.marginTop = '.1rem'
        acaTalla.style.border = 'none'
        mensajes.innerHTML = ''
    }else if(e.target.innerHTML === 'agregar al carrito'){
        if (defineTalla.innerHTML === 'definir una talla') {
            mensajes.innerHTML = 'por favor seleccione una talla'
            acaTalla.style.border = 'red solid 2px'
        }else{
            let ref = e.target.parentElement.children[0].innerHTML
            let nombre = e.target.parentElement.children[1].innerHTML
            let precio = e.target.parentElement.children[2].innerHTML
            let img = e.target.parentElement.children[3].innerHTML
            let tipo = e.target.parentElement.children[4].innerHTML
            let talla = defineTalla.innerHTML
            CrearItem(ref,nombre,precio,img,tipo,talla)
            GuardarBD()
        }
    }
})

imgPeque.addEventListener('click', (e)=>{
    if(e.target.tagName === 'IMG'){
        let imgCambio = e.target.outerHTML
        imgGrande.innerHTML =`
        ${imgCambio}
        `
    }
})

imgGrande.addEventListener('mousemove', (e)=>{
    if(e.target.tagName === 'IMG'){
        let imgCambio = e.target.currentSrc
        let width = imgGrande.offsetWidth
        let height = imgGrande.offsetHeight
        let mouseX = e.offsetX
        let mouseY = e.offsetY
        let bgPosX = (mouseX / width * 100)
        let bgPosY = (mouseY / height * 100) 
        info.style.display = 'none'
        zoom.style.display = 'block'
        zoom.style.backgroundImage = `url(${imgCambio})`
        zoom.style.backgroundPosition = `${bgPosX}% ${bgPosY}%`
        zoom.style.backgroundRepeat = 'no-repeat'
    }
})

imgGrande.addEventListener('mouseleave', ()=>{
    zoom.innerHTML = ``
    info.style.display = 'block'
    zoom.style.display = 'none'
    zoom.style.backgroundImage = ``
});

cantidadCarrito.addEventListener('click', (e) =>{ 
    e.preventDefault()
    imgPeque.innerHTML = ''
    imgGrande.innerHTML = ''
    acaTalla.innerHTML = ''
    defineTalla.innerHTML = ''
    defineTalla.style.height = '0'
    cerrar.innerHTML = ''
    texto.innerHTML = ''
    botonAgregar.innerHTML = ''
    botonAgregar.style.height = '0'
    mostrarProducto.style.backgroundColor = '#ffffff'
    mostrarProducto.style.paddingTop = '0'
    mostrarProducto.style.paddingBottom = '0'
    mostrarFiltro.innerHTML = ''
    mensajes.innerHTML = ''
    pintarCarrito()
})

acaTalla.addEventListener('click',(e)=>{
    if (e.target.innerHTML.indexOf('</div>') !== -1) {
        console.log('ningun lado')
    }else{
    acaTalla.style.border = 'none'
    let talla = e.target.innerHTML
    let id = e.target.id
    mensajes.innerHTML = ''
    defineTalla.innerHTML = ``
    defineTalla.innerHTML = `${talla}`
    defineTalla.style.width = '4rem'
    defineTalla.style.height = '2rem'
    defineTalla.style.backgroundColor = '#e3e3e3'
    defineTalla.style.color = '#000'
    defineTalla.style.fontSize = '1.8rem'
    defineTalla.style.marginTop = '1rem'
    defineTalla.style.justifyContent = 'center'
    }
})

contacto.addEventListener('click', (e)=>{
    e.preventDefault()
    console.log('contacto')
    formContacto.style.transform = 'translate(0, 0)'
})

formContacto.addEventListener('click', (e)=>{
    console.log('cli en cerrar')
    if (e.target.className === 'fas fa-times cerrarContacto') {
        formContacto.style.transform = 'translate(-100%, 0)'
    }
})

document.addEventListener('DOMContentLoaded', actualizarDB)
document.addEventListener('DOMContentLoaded', GuardarBD)