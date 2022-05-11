import URL from "./url.js"
const inputFile = document.getElementById('inputFile')
const subirFile = document.getElementById('subirFile')
const img = document.getElementById('img')
const formulario = document.getElementById('formulario')
const respuestaFormulario = document.getElementById('respuestaFormulario')
const verFiltro = document.getElementById('verFiltro')

const cuerpo = document.querySelector('body')
cuerpo.style.backgroundColor = '#ececec'
const subir = () =>{window.scroll(0,0)}

const Filtrar = () => {
    verFiltro.innerHTML = '<div class="preloader"></div>'

    fetch( URL.url_servicios+'ver')
    .then( datos=>datos.json() )
    .then( datos=>{
        console.log(datos)
        if (datos.length === 0) {
            verFiltro.innerHTML = ''
            verFiltro.innerHTML += `No se encontraron servicios`
        }else{
            verFiltro.innerHTML = ''
            for(let dato of datos){
                verFiltro.innerHTML += `
                    <div class="cardServicios">    
                        <div class="cardServiciosIMG">
                            <img src="../assets/img/servicios/${dato.ser_img}" alt="">
                        </div>
                        <div class="cardServiciosInfo">
                            <input type="text" id="nombreHabit" value="${dato.ser_nombre}" class="nombreHabit" autocomplete="off">
                            <textarea id="detallesHabit" rows="3" name="detalles" autocomplete="off" >${dato.ser_descripcion}</textarea>
                        </div>
                        <div class="cardServiciosFunciones">
                            <b class="d-none">${dato.ser_id}</b>
                            <button class="editServicio">Actualizar</button>
                            <button class="editServicio">Eliminar</button>
                        </div>    
                    </div>    
                    `    
            }
        }
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
    let datosFormSer = new FormData(formulario)
        fetch( URL.url_servicios+'crear', {
            method: 'POST',
            body: datosFormSer,
            enctype: 'multipart/form-data'
        })
        .then( dato => dato.json() )
        .then( data =>{
            if (data === 'ok') {
                formulario.reset()
                respuestaFormulario.innerHTML = 'se creó un servicio'
                img.src = ''
                Filtrar()
            } 
        })  
})

verFiltro.addEventListener('click', (e)=>{
    if(e.target.innerHTML === 'Actualizar'){
        let newNombre = document.getElementById('nombreHabit').value
        let newDescripcion = document.getElementById('detallesHabit').value
        let id = e.target.parentElement.children[0].innerHTML
        let datosEdit = new FormData()
        datosEdit.append('newNombre', newNombre)
        datosEdit.append('newDescripcion', newDescripcion)
        datosEdit.append('id', id)

        fetch( URL.url_servicios+'editar',{
            method: 'POST',
            body: datosEdit,
            enctype: 'multipart/form-data'
        })
        .then( datos=>datos.json() )
        .then( dato=>{
            console.log(dato)
            if(dato === 'ok'){
                console.log('se actualizo el servicio')
                Filtrar()
            }
        })
    }else if(e.target.innerHTML === 'Eliminar'){
        let id = e.target.parentElement.children[0].innerHTML
        console.log(id)
        let datosEdit = new FormData()
        datosEdit.append('id', id)
        console.log('eliminando')
        fetch( URL.url_servicios+'eliminar',{
            method: 'POST',
            body: datosEdit,
            enctype: 'multipart/form-data'
        })
        .then( datos=>datos.json() )
        .then( dato=>{
            console.log(dato)
            if(dato === 'ok'){
                console.log('se eliminó el servicio')
                Filtrar()
            }
        })
    }
})

document.addEventListener('DOMContentLoaded', subir())
document.addEventListener('DOMContentLoaded', Filtrar())