import URL from "./url.js"
const inputFile = document.getElementById('inputFileProducto')
const subirFile = document.getElementById('subirFileProducto')
const img = document.getElementById('imgProducto')
const formulario = document.getElementById('formularioProducto')
const respuestaFormulario = document.getElementById('respuestaFormulario')
const formBuscador = document.getElementById('formBuscador')
const buscador = document.getElementById('buscador')
const verFiltro = document.getElementById('verFiltro')
const panel = document.getElementById('panel')

const cuerpo = document.querySelector('body')
cuerpo.style.backgroundColor = '#2b2b2b'

const Filtrar = () => {
    verFiltro.innerHTML = '<div class="preloader"></div>'
    let texto = buscador.value.toLowerCase();
    let busq = new FormData()
    busq.append('texto',texto)
    
        if (texto === '') {
            verFiltro.innerHTML += 'El campo de busqueda está vacio, escribe lo que quieres buscar'
        }else{
            fetch( URL.url_productos_filtro,{
                method: 'POST',
                body: busq
            })
            .then( datos=>datos.json() )
            .then( datos=>{
                if (datos.length === 0) {principal.innerHTML += `No se encontraron productos con este texto "${texto}"`}
                else{
                    verFiltro.innerHTML = ''
                    for(let dato of datos){
                        if (dato.pro_cantidad === '0') {
                            verFiltro.innerHTML += `
                            <div class="card">
                                    <b class="d-none">${dato.pro_ref}</b>
                                    <b class="d-none">${dato.pro_nombre}</b>
                                    <b class="d-none">${dato.pro_precio}</b>
                                    <b class="d-none">${dato.pro_img}</b>
                                    <label>${dato.pro_nombre}</label>
                                    <div class="cajapImg">
                                        <img src="./assets/img/productos/${dato.pro_img}" alt="">
                                    </div>
                                    <p>
                                        <b>$ ${dato.pro_precio}</b>
                                        <i>Contenido: ${dato.pro_contenido}</i>
                                        <i>Cantidad: ${dato.pro_cantidad}</i>    
                                    </p>
                                    <div class="editar">
                                        <b class="d-none">${dato.pro_ref}</b>    
                                        <i class="fas fa-pen"></i>
                                    </div>
                                    <b>Existencias en 0</b>
                            </div>    
                            `
                        } else {
                            verFiltro.innerHTML += `
                            <div class="card">
                                    <b class="d-none">${dato.pro_ref}</b>
                                    <b class="d-none">${dato.pro_nombre}</b>
                                    <b class="d-none">${dato.pro_precio}</b>
                                    <b class="d-none">${dato.pro_img}</b>
                                    <label>${dato.pro_nombre}</label>
                                    <div class="cajapImg">
                                        <img src="./assets/img/productos/${dato.pro_img}" alt="">
                                    </div>
                                    <p>
                                        <b>$ ${dato.pro_precio}</b>
                                        <i>Contenido: ${dato.pro_contenido}</i>
                                        <i>Cantidad: ${dato.pro_cantidad}</i>    
                                    </p>
                                    <div class="editar">
                                        <b class="d-none">${dato.pro_ref}</b>    
                                        <i class="fas fa-pen"></i>
                                    </div>
                            </div>    
                            `
                        }
                    
                    }
                }
            })
        }
}

subirFile.addEventListener('click', (e)=>{
    e.preventDefault()
    inputFile.click()
})

inputFile.addEventListener('change', (e)=>{
    let imagen = inputFile.files[0]
    let reader = new FileReader()
    reader.readAsDataURL(imagen)
    reader.onload = function (){
        img.src = reader.result
    }
})

formulario.addEventListener('submit',(e)=>{
    e.preventDefault()
    let numero = new Date()
    let ref = numero.getTime()
    let datos = new FormData(formulario)
    datos.append('referencia', ref)
    console.log(datos)
    let nombre_pro = document.getElementById('nombrePro').value
    console.log(nombre_pro)
    if (ref === '') {
        alert('seleccione una factura o ingrese referencia')
    }else{
        fetch( URL.url_formulario_producto+'crear', {
            method: 'POST',
            body: datos,
            enctype: 'multipart/form-data'
        })
        .then( dato => dato.json() )
        .then( data =>{
            if (data === 'ok') {
                formulario.reset()
                respuestaFormulario.innerHTML = 'se agrego un producto'
                img.src = ''
                buscador.value = nombre_pro
                Filtrar()
            } 
        })
    }
})

formBuscador.addEventListener('submit', (e)=>{
    e.preventDefault()
    Filtrar()
    formBuscador.reset()
})

verFiltro.addEventListener('click',(e)=>{
    if(e.target.className === 'fas fa-pen'){
        console.log('editar')
        window.scrollTo({
            top: 0,
            behavior:'smooth'
        })
        let ref = e.target.parentElement.children[0].innerHTML
        console.log(ref)
        let datoRef = new FormData()
        datoRef.append('ref', ref)
        panel.innerHTML = ''
        panel.innerHTML = '<div class="preloader"></div>'
        fetch( URL.url_formulario_producto+'ver',{
            method: 'POST',
            body: datoRef,
            enctype: 'multipart/form-data'
        })
        .then( datos => datos.json() )
        .then( dato =>{
            panel.innerHTML = `
            <i class="fas fa-times cerrar"></i>
            <div>
                <form class="formEditar" id="formEditarProducto">
                    <div class="">
                        <input type="file" name="archivoPro" accept="image/*" id="inputFileEdit" class="d-none">
                        <button class="btn btn-warning btnAgregar" id="subirFileEdit">Cambiar Foto</button>   
                        <img src="./assets/img/productos/${dato[0].pro_img}" alt="" id="imgEdit" class="mostrarFoto">
                    </div>
                    
                    <div>
                        <span>Nombre</span>
                        <input type="text" name="nombrePro" value="${dato[0].pro_nombre}">
                    </div>
                    <div>
                        <span>Contenido</span>
                        <textarea col="5" row="10" name="contenidoPro">${dato[0].pro_contenido}</textarea>
                    </div>
                    <div>
                        <span>Cantidad Inventario</span>
                        <input type="number" name="cantidadPro" value="${dato[0].pro_cantidad}">
                    </div>
                    <div>
                        <span>Precio de venta</span>
                        <input type="number" name="precioPro" value="${dato[0].pro_precio}">
                    </div>
                    <input type="hidden" name="refPro" value="${dato[0].pro_ref}">
                    <input type="hidden" name="imgPro" value="${dato[0].pro_img}">
                    <button type="button" class="btn btn-warning">Actualizar</button>
                </form>
            </div>
            `
            panel.classList.add('is-active')
        })
    }
})

panel.addEventListener('click',(e)=>{
    if (e.target.className === 'fas fa-times cerrar') {
        panel.classList.remove('is-active')
        panel.innerHTML = ''
    }else if(e.target.className === 'btn btn-warning btnAgregar'){
        e.preventDefault()
        let inputFileEdit = document.getElementById('inputFileEdit')
        inputFileEdit.click()
        inputFileEdit.addEventListener('change', (e)=>{
            let imgEdit = document.getElementById('imgEdit')
            let imagen = inputFileEdit.files[0]
            let reader = new FileReader()
            reader.readAsDataURL(imagen)
            reader.onload = function (){
                imgEdit.src = reader.result
            }
        })
    }else if(e.target.innerHTML === 'Actualizar'){
        let formEditar = document.getElementById('formEditarProducto')
        let datosEditar = new FormData(formEditar)
        let inputFileEdit = document.getElementById('inputFileEdit')
        if (inputFileEdit.value === '') {
            fetch( URL.url_formulario_producto+'actualizarSinImg',{
                method: 'POST',
                body: datosEditar,
                enctype: 'multipart/form-data'
            })
            .then( data => data.json() )
            .then( dato =>{
                alert('se actualizo el producto')
                panel.classList.remove('is-active')
                panel.innerHTML = ''
                buscador.value = dato
                Filtrar()
            })
        }else{
            fetch( URL.url_formulario_producto+'actualizarConImg',{
                method: 'POST',
                body: datosEditar,
                enctype: 'multipart/form-data'
            })
            .then( data => data.json() )
            .then( dato =>{
                alert('se actualizo el producto')
                panel.classList.remove('is-active')
                panel.innerHTML = ''
                buscador.value = dato
                Filtrar()
            })
        }
    }
})
