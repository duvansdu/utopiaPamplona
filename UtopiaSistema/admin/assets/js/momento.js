import URL from "./url.js"
const formMomento = document.getElementById('formMomento')
const mostrarMomentos = document.getElementById('mostrarMomentos')
const mensaje = document.getElementById('mensaje')

const mostrarM = () =>{
    mostrarMomentos.innerHTML = ''
    fetch( URL.url_momento+'ver')
    .then( datos=>datos.json() )
    .then( dato=>{
        dato.forEach(element => {
            mostrarMomentos.innerHTML += `
                <form>
                    <b class="d-none">${element.mom_id}</b>
                    <input type="text" value="${element.mom_nombre}" id="nombre${element.mom_id}">
                    <input type="color" value="${element.mom_color}" id="color${element.mom_id}">
                    <input type="submit" value="editar" class="editandoMomento">
                </form>
            `
        })
    })
}

mostrarMomentos.addEventListener('click', (e)=>{
    if (e.target.className === 'editandoMomento') {
        e.preventDefault()
        let id = e.target.parentElement.children[0].innerHTML
        console.log('probando edicion'+id)

        let datosF = new FormData()
        datosF.append('id', id)
        datosF.append('nombre', document.getElementById('nombre'+id).value)
        datosF.append('color', document.getElementById('color'+id).value)
        fetch( URL.url_momento+'actualizar',{
            method: 'POST',
            body: datosF 
        })
        .then( datos=>datos.json() )
        .then( dato=>{
            if(dato === 'ok'){
                console.log(dato)
                mensaje.innerHTML = ''
                mensaje.innerHTML = `<span>Se actualizo el momento</span>`
                mostrarM()
            }
        })
    }
})

formMomento.addEventListener('submit', (e)=>{
    e.preventDefault()
    let datosForm = new FormData(formMomento)
    fetch( URL.url_momento+'crear',{
        method: 'POST',
        body: datosForm
    })
    .then(datos=>datos.json())
    .then(dato=>{
        console.log(dato)
        if (dato === 'ok') {
            formMomento.reset()
            mostrarM()
        }
    })
})

document.addEventListener('DOMContentLoaded', mostrarM())