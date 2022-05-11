import URL from "./url.js"
const inputFile = document.getElementById('inputFile')
const subirFile = document.getElementById('subirFile')
const img = document.getElementById('img')
const formulario = document.getElementById('formulario')
const respuestaFormulario = document.getElementById('respuestaFormulario')
const verFiltro = document.getElementById('verFiltro')
const verImagenes = document.getElementById('verImagenes')
const selectProductos = document.getElementById('selectProductos')
const habit = document.getElementById('habit')
const cuerpo = document.querySelector('body')
cuerpo.style.backgroundColor = '#ececec'
const subir = () =>{window.scroll(0,0)}
const formatterPeso = new Intl.NumberFormat('es-CO', {style: 'currency',currency: 'COP',minimumFractionDigits: 0})

const Filtrar = (id) => {
    verFiltro.innerHTML = '<div class="preloader"></div>'
    let busq = new FormData()
    busq.append('id',id)
    
    fetch( URL.url_productos+'buscarPro',{
        method: 'POST',
        body: busq
    })
    .then( datos=>datos.json() )
    .then( dato=>{
        console.log(dato)
        if (dato.length === 0) {
            verFiltro.innerHTML = ''
            verFiltro.innerHTML += `No se encontraron productos con este texto "${texto}"`
        }else{
            if (dato[0].hab_estado === 'activo') {
                var textoActivo = 'desactivar'
                var valueActivo = 'inactivo'
            } else {
                var textoActivo = 'activar'
                var valueActivo = 'activo'
            }
            verFiltro.innerHTML = ''
            verFiltro.innerHTML += `
                <form class="formEditar" id="formEditar">
                    <label class="titulo">Actualizar Producto</label> 
                    <div class="cajaImg">
                        <input type="file" name="archivoPro" accept="image/*" id="inputFileEdit" class="d-none">
                        <i id="subirFileEdit" class="fas fa-upload btnAgregar"></i>  
                        <img src="../assets/img/productos/${dato[0].pro_img}" alt="" id="imgEdit" class="mostrarFoto">
                    </div>        
                    <div>
                        <span>Nombre</span>
                        <input type="text" name="nombre" value="${dato[0].pro_nombre}">
                    </div>
                    <div>
                        <span>Precio</span>
                        <input type="number" name="precio" value="${dato[0].pro_precio}">
                    </div>
                    <div>
                        <span>Horma</span>
                        <input type="texto" name="horma" value="${dato[0].pro_horma}">
                    </div>
                    <div>
                        <span>Contenido</span>
                        <input type="texto" name="contenidoNeto" value="${dato[0].pro_contenido_neto}">
                    </div>
                    <div>
                        <span>Información</span>
                        <textarea col="5" row="10" name="informacion">${dato[0].pro_descripcion}</textarea>
                    </div>
                    <div>
                        <select name="activar">
                            <option selected value="${dato[0].pro_estado}">${dato[0].pro_estado}</option>
                            <option value="${valueActivo}">${textoActivo}</option>
                        </select>
                    </div>
                    
                    <input type="hidden" name="refPro" value="${dato[0].pro_ref}">
                    <input type="hidden" name="imgPro" value="${dato[0].pro_img}">
                    <i class="material-icons agregar">Actualizar</i>
                </form>
                `
        }
    })
        
}

const FiltrarIMG = (id) => {
    verImagenes.innerHTML = '<div class="preloader"></div>'
    let busqIMG = new FormData()
    busqIMG.append('id',id)
    
    fetch( URL.url_imagenes+'verProductos',{
        method: 'POST',
        body: busqIMG
    })
    .then( datos=>datos.json())
    .then(dato=>{
        console.log(dato)
        verImagenes.innerHTML = ''
        dato.forEach(element => {
            verImagenes.innerHTML += `
            <div>
                <b class="d-none">${element.img_id}</b>
                <img src="../assets/img/productos/${element.img_html}" alt="">
                <i class="fas fa-times eliminarImg"></i>
            </div>
            `
        });
    }) 
}

const llenarSelect = () => {
    fetch( URL.url_productos+'traer')
    .then(datos=>datos.json())
    .then(dato=>{
        dato.forEach(element => {
            selectProductos.innerHTML += `
            <option value="${element.pro_ref}">${element.pro_nombre}</option>
            `
        });
    })
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
    respuestaFormulario.innerHTML = '<div class="preloader"></div>'
    let id = selectProductos.value
    let numero = new Date()
    let ref = numero.getTime()
    let datos = new FormData(formulario)
    datos.append('ref', ref)
    datos.append('id', id)
        fetch( URL.url_imagenes+'crearIMG', {
            method: 'POST',
            body: datos,
            enctype: 'multipart/form-data'
        })
        .then( dato => dato.json() )
        .then( data =>{
            if (data === 'ok') {
                formulario.reset()
                respuestaFormulario.innerHTML = 'se creó un producto'
                img.src = ''
                FiltrarIMG(id)
                Filtrar(id)
            } 
        })  
})

selectProductos.addEventListener('change', (e)=>{
    let id = selectProductos.value
    habit.innerHTML = `${id}`
    Filtrar(id)
    FiltrarIMG(id)
})

verFiltro.addEventListener('click',(e)=>{
    if(e.target.className === 'fas fa-upload btnAgregar'){
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
    }else if(e.target.className === 'material-icons agregar'){
        let formEditar = document.getElementById('formEditar')
        let datosEditar = new FormData(formEditar)
        let inputFileEdit = document.getElementById('inputFileEdit')
        if (inputFileEdit.value === '') {
            fetch( URL.url_productos+'actualizarSinImg',{
                method: 'POST',
                body: datosEditar,
                enctype: 'multipart/form-data'
            })
            .then( data => data.json() )
            .then( dato =>{
                if (dato === 'ok') {
                    let ref = selectProductos.value
                    Filtrar(ref)
                }
            })
        }else{
            fetch( URL.url_productos+'actualizarConImg',{
                method: 'POST',
                body: datosEditar,
                enctype: 'multipart/form-data'
            })
            .then( data => data.json() )
            .then( dato =>{
                if (dato === 'ok') {
                    console.log('entrando a la res')
                    let ref = selectProductos.value
                    Filtrar(ref)
                }
            })
        }
    }
})

verImagenes.addEventListener('click',(e)=>{
    if (e.target.className === 'fas fa-times eliminarImg') {
        let id = e.target.parentElement.children[0].innerHTML
        let datoEliminar = new FormData()
        datoEliminar.append('id', id)
        fetch( URL.url_imagenes+'eliminar',{
            method: 'POST',
            body: datoEliminar
        })
        .then(datos=>datos.json())
        .then(dato=>{
            if (dato === 'ok') {
                let ref = selectProductos.value
                FiltrarIMG(ref)
            }
        })
    }
})


document.addEventListener('DOMContentLoaded', llenarSelect())
document.addEventListener('DOMContentLoaded', subir)