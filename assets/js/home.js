
const uno = document.getElementById('uno')
const dos = document.getElementById('dos')
const tres = document.getElementById('tres')
const vista = document.getElementById('vista')
const slider = document.getElementById('slider')
let contador = 0
const inicio = () =>{window.scroll(0,0)}

uno.addEventListener('click', (e)=>{
    e.preventDefault()
    slider.scrollLeft = 0
    slider.style.scrollBehavior = 'smooth'
    contador = 4
})

dos.addEventListener('click', (e)=>{
    e.preventDefault()
    let ancho = vista.clientWidth
    slider.scrollLeft = ancho
    slider.style.scrollBehavior = 'smooth'
    contador = 4
})

tres.addEventListener('click', (e)=>{
    e.preventDefault()
    let ancho = vista.clientWidth*3
    slider.scrollLeft = ancho
    slider.style.scrollBehavior = 'smooth'
    contador = 4
})

setInterval(() => {
    if (contador === 0) {
        let ancho = vista.clientWidth*1
        slider.scrollLeft = ancho
        slider.style.scrollBehavior = 'smooth'
        contador = 1
    }else if(contador === 1){
        let ancho = vista.clientWidth*2
        slider.scrollLeft = ancho
        slider.style.scrollBehavior = 'smooth'
        contador = 2
    }else if(contador === 2){
        let ancho = vista.clientWidth*3
        slider.scrollLeft = ancho
        slider.style.scrollBehavior = 'smooth'
        contador = 3
    }else if(contador === 3){
        let ancho = vista.clientWidth*0
        slider.scrollLeft = ancho
        slider.style.scrollBehavior = 'smooth'
        contador = 0
    }
}, 3000);

document.addEventListener('DOMContentLoaded', inicio())