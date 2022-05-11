import URL from "./url.js"
const inputFileIMG = document.getElementById('inputFileIMG')
const img = document.getElementById('img')
const formularioProducto = document.getElementById('formularioProducto')
const respuestaFormulario = document.getElementById('respuestaFormulario')
const cajaFoto = document.getElementById('cajaFoto')
const cuerpo = document.querySelector('body')
cuerpo.style.backgroundColor = '#ffffff'

const subir = () =>{window.scroll(0,0)}

const CrearProducto = () =>{
    respuestaFormulario.innerHTML = '<div class="preloader"></div>'
    let datos = new FormData(formularioProducto)
    console.log(datos)
        fetch( URL.url_proyectos+'crear', {
            method: 'POST',
            body: datos,
            enctype: 'multipart/form-data'
        })
        .then( dato => dato.json() )
        .then( data =>{
            if (data === 'ok'){
                formularioProducto.reset()
                respuestaFormulario.innerHTML = 'se creó con éxito un proyecto'
                img.src = ''
            } 
        })  
}
 
inputFileIMG.addEventListener('change', (e)=>{
    let imagen = inputFileIMG.files[0]
    let reader = new FileReader()
    reader.readAsDataURL(imagen)
    reader.onload = function (){
        img.src = reader.result
    }
})

formularioProducto.addEventListener('submit',(e)=>{
    e.preventDefault()
    CrearProducto()
})

cajaFoto.addEventListener('click', (e)=>{
    if (e.target.className === 'subirFile') {
        console.log('click en la foto')
        inputFileIMG.click()
    }
})

document.addEventListener('DOMContentLoaded', subir())