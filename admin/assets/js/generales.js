import URL from "./url.js"
const header = document.getElementById('header')
const menu = document.getElementById('menu')
const cerrar = document.getElementById('cerrar')

menu.addEventListener('click', (e)=>{
    header.classList.toggle('is-active')
    menu.classList.toggle('ocultar')
    cerrar.classList.toggle('desocultar')
})
cerrar.addEventListener('click', (e)=>{
    header.classList.toggle('is-active')
    menu.classList.toggle('ocultar')
    cerrar.classList.toggle('desocultar')
})


