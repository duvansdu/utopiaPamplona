import URL from "./url.js"
const inputFile = document.getElementById('inputFile')
const subirFile = document.getElementById('subirFile')
const img = document.getElementById('img')
const formulario = document.getElementById('formulario')
const verFiltro = document.getElementById('verFiltro')
const respuestaFormulario = document.getElementById('respuestaFormulario')

const cuerpo = document.querySelector('body')
cuerpo.style.backgroundColor = '#ececec'
const subir = () =>{window.scroll(0,0)}

const verIMG = () => {
    verFiltro.innerHTML = '<div class="preloader"></div>'
    fetch( URL.url_galeria+'verGaleria' ) 
    .then( datos=>datos.json() )
    .then( datos=>{
        if (datos.length === 0) {
            verFiltro.innerHTML = ''
            verFiltro.innerHTML += `no se encontrarón imagen en la galeria`
        }else{
            verFiltro.innerHTML = ''
            for(let dato of datos){
                verFiltro.innerHTML += `
                    <div class="cardHabitacion">    
                        <img src="../assets/img/galeria/${dato.img_nombre}" alt="">
                        <div class="cardHabitacionFunciones">
                            <b class="d-none">${dato.img_id}</b>
                            <i class="fas fa-times eliminarImg"></i>
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
    respuestaFormulario.innerHTML = '<div class="preloader"></div>'
    e.preventDefault()
    let numero = new Date()
    let ref = numero.getTime()
    let datos = new FormData(formulario)
    datos.append('referencia', ref)
        fetch( URL.url_galeria+'crear', {
            method: 'POST',
            body: datos,
            enctype: 'multipart/form-data'
        })
        .then( dato => dato.json() )
        .then( data =>{
            if (data === 'ok') {
                respuestaFormulario.innerHTML = 'ok'
                formulario.reset()
                img.src = ''
                verIMG()
            } 
        })  
})


verFiltro.addEventListener('click', (e)=>{
    e.preventDefault()
    if (e.target.className === 'fas fa-times eliminarImg') {
        let id = e.target.parentElement.children[0].innerHTML
        let datoEliminar = new FormData()
        datoEliminar.append('id', id)
        fetch( URL.url_galeria+'eliminar',{
            method: 'POST',
            body: datoEliminar
        })
        .then(datos=>datos.json())
        .then(dato=>{
            if (dato === 'ok') {
                verIMG()
            }
        })
    }
})

document.addEventListener('DOMContentLoaded', subir())
document.addEventListener('DOMContentLoaded', verIMG())