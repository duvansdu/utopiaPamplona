import URL from "./url.js"
const inputFile = document.getElementById('inputFile')
const subirFile = document.getElementById('subirFile')
const img = document.getElementById('img')
const formularioProducto = document.getElementById('formularioProducto')
const respuestaFormulario = document.getElementById('respuestaFormulario')

const cuerpo = document.querySelector('body')
cuerpo.style.backgroundColor = '#ffffff'
const subir = () =>{window.scroll(0,0)}

const CrearProducto = () =>{
    respuestaFormulario.innerHTML = '<div class="preloader"></div>'
    let numero = new Date()
    let ref = numero.getTime()
    let datos = new FormData(formularioProducto)
    datos.append('referencia', ref)
    datos.append('fechaCreacion', numero)
    console.log(datos)
        fetch( URL.url_productos+'crear', {
            method: 'POST',
            body: datos,
            enctype: 'multipart/form-data'
        })
        .then( dato => dato.json() )
        .then( data =>{
            if (data === 'ok'){
                formularioProducto.reset()
                respuestaFormulario.innerHTML = 'se creó con éxito un producto'
                img.src = ''
                seleccioneTalla.innerHTML = ''
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

formularioProducto.addEventListener('submit',(e)=>{
    e.preventDefault()
    CrearProducto()
})

document.addEventListener('DOMContentLoaded', subir())