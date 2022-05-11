
const tituloCategoria = document.getElementById('tituloCategoria')
const procesarTitulo = document.getElementById('procesarTitulo')
const cuerpo = document.querySelector('body')
cuerpo.style.backgroundColor = '#ffffff'

const inicio = () =>{
    window.scroll(0,0)
    for (let titulo = 10; titulo <= 25; titulo++) {
        tituloCategoria.innerHTML += `<label id="tituloIndividual${titulo}">${procesarTitulo.innerHTML}</label>` 
        document.getElementById('tituloIndividual'+titulo).style.fontSize = titulo*5+'px'
    }
}

document.addEventListener('DOMContentLoaded', inicio())