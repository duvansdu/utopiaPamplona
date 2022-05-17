import URL from "./url.js"
const inputFile = document.getElementById('inputFileSocio')
const subirFile = document.getElementById('subirFileSocio')
const img = document.getElementById('imgSocio')
const formulario = document.getElementById('formularioSocio')
const respuestaFormulario = document.getElementById('respuestaFormulario')
const verSocios = document.getElementById('verSocios')
const verFiltro = document.getElementById('verFiltro')
const cuerpo = document.querySelector('body')
cuerpo.style.backgroundColor = '#fefefe'


const formatterPeso = new Intl.NumberFormat('es-CO', {
    style: 'currency',
    currency: 'COP',
    minimumFractionDigits: 0
  })

const verUsuarios = () =>{
    verSocios.innerHTML = ''
    fetch( URL.url_administradores+'ver')
    .then( datos=>datos.json() )
    .then( dato=>{
        console.log(dato)
        dato.forEach(element => {
            verSocios.innerHTML +=`
<div class="tarjeta">
<table>
  <thead>
    <tr>
            <th scope="col">id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha de Pedido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Descripción del Pedido</th>
            <th scope="col">Total</th>
            <th scope="col">Abono</th>
            <th scope="col">Saldo</th>
            <th scope="col">Fecha de Entrega</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row" data-label="Número del Pedido">${element.ped_id}</td>
            <td data-label="Nombre">${element.ped_nombre}</td>
            <td data-label="Fecha del pedido"> ${element.ped_fecha}</td>
            <td data-label="Teléfono"> ${element.ped_telefono}</td>
            <td data-label="Descripción"> ${element.ped_descripcion}</td>
            <td data-label="Total"> ${formatterPeso.format(element.ped_total)}</td>
            <td data-label="Abono"> ${formatterPeso.format(element.ped_abono)}</td>
            <td data-label="Saldo Pendiente"> ${formatterPeso.format(element.ped_saldo)}</td>
            <td data-label="Fecha de Entrega"> ${element.ped_entrega}</td>
        </tr>   
    </tbody>
</table>
 
    
        <div class="eliminar">
            <b class="d-none">${element.ped_id}</b> 
            <i class="fas fa-trash-alt fa-2x"></i>
        <b class="d-none">${element.ped_id}</b>  
        <i class="fas fa-print fa-2x"></i>
        <b class="d-none">${element.ped_id}</b>  
        <i class="fas fa-edit fa-2x"></i>
        </div>
        
    </div>
</div>

            `
        })
    })
}




formulario.addEventListener('submit',(e)=>{
    e.preventDefault()
    let numero = new Date()
    let ref = numero.getTime()
    let datos = new FormData(formulario)
    respuestaFormulario.innerHTML = `<div class="preloader"></div>`
    console.log(datos)
        fetch( URL.url_formulario_socio+'crear', {
            method: 'POST',
            body: datos,
            enctype: 'multipart/form-data'
        })
        .then( dato => dato.json() )
        .then( data =>{
            if (data === 'ok') {
                formulario.reset()
                respuestaFormulario.innerHTML = ''
                alertify.alert('Se agrego un Nuevo Pedido'); 
                formulario.reset()
                verUsuarios()
            } 
        })
    
})



document.addEventListener('DOMContentLoaded', verUsuarios)


verSocios.addEventListener('click',(e)=>{
    if(e.target.className === 'fas fa-trash-alt fa-2x'){
        console.log('eliminar')
        console.log(e)
        let ref = e.target.parentElement.children[0].innerHTML

        console.log(ref)
        let datoRef = new FormData()
        datoRef.append('ref', ref)

        fetch( URL.url_administradores+'ver2',{
            method: 'POST',
            body: datoRef,
            enctype: 'multipart/form-data'
            
        })
        .then( datos => datos.json() )
        .then( dato =>{ 
            console.log(dato)
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth'
              });
            verUsuarios()
            respuestaFormulario.innerHTML = ''
            alertify.warning('Se elimino un Pedido');
               
           
        })
    }
})    


verSocios.addEventListener('click',(e)=>{
    if(e.target.className === 'fas fa-print fa-2x'){
        console.log('clic en imprimir')
        console.log(e)
        let ref = e.target.parentElement.children[0].innerHTML

        console.log(ref)
        let datoRef = new FormData()
        datoRef.append('ref', ref)
        fetch( URL.url_administradores+'imprimir',{
            method: 'POST',
            body: datoRef,
            enctype: 'multipart/form-data'
        })
        .then( datos=>datos.json() )
        .then( dato=>{
        console.log(dato)
        dato.forEach(element => {
            verSocios.innerHTML +=`

            `
            var doc = new jsPDF('p', 'mm', [200, 110]);
            var myImage = new Image();
            myImage.src = 'assets/img/pagina/logo.png';
            myImage.onload = function(){
            doc.addImage(myImage , 'png', 35, 5, 40, 40);
            doc.setFontSize(18);
            doc.text(45, 50,'Utopia ');
            doc.setLineWidth(1.5)
            doc.line(10, 52, 100, 52)
            doc.text(10, 60,'Número de Factura: ');
            doc.setFontSize(18);
            doc.text(70, 60, element.ped_id);
            doc.setFontSize(18);
            doc.text(10, 70,'Nombre del cliente: ');
            doc.setFontSize(18);
            doc.text(10, 80, element.ped_nombre);
            doc.setFontSize(18);
            doc.text(10, 90,'Fecha del Pedido: ');
            doc.setFontSize(18);
            doc.text(65, 90, element.ped_fecha);
            doc.setFontSize(18);
            doc.text(10, 100,'Teléfono: ');
            doc.setFontSize(18);
            doc.text(65, 100, element.ped_telefono);
            doc.setFontSize(18);
            doc.text(10, 110,'Descripción: ');
            doc.setFontSize(18);
            
            /*var hola = element.ped_descripcion.split(' ') 
            console.log(hola.length);
            var dato = hola.length
            doc.text(10, 110, hola);*/
            doc.setFontSize(10);
            doc.text(10, 120, element.ped_descripcion);
            
            doc.setFontSize(18);
            doc.setLineWidth(1.5)
            doc.line(10, 140, 100, 140)
            doc.text(10, 150,'Total: ');
            doc.setFontSize(18);
            doc.text(65, 150,formatterPeso.format(element.ped_total));
            doc.setFontSize(18);
            doc.text(10, 160,'Abono: ');
            doc.setFontSize(18);
            doc.text(65, 160, formatterPeso.format(element.ped_abono));
            doc.setFontSize(18);
            doc.text(10, 170,'Saldo: ');
            doc.setFontSize(18);
            doc.text(65, 170, formatterPeso.format(element.ped_saldo));
            doc.setFontSize(18);
            doc.text(10, 180,'Fecha de entrega: ');
            doc.setFontSize(18);
            doc.text(65, 180, element.ped_entrega);
            doc.save('utopiaFactura.pdf');
        }})})

        
}})


panel.addEventListener('click',(e)=>{
    if (e.target.className === 'cerrarVentana') {
        panel.classList.remove('is-active')
        panel.innerHTML = ''
    }else if(e.target.className === 'btn btn btn-dark btnAgregar'){
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
            fetch( URL.url_formulario_socio+'actualizarSinImg',{
                method: 'POST',
                body: datosEditar,
                enctype: 'multipart/form-data'
            })
            .then( data => data.json() )
            .then( dato =>{
                alertify.alert('Se Editó un Pedido'); 
                panel.classList.remove('is-active')
                panel.innerHTML = ''
                verUsuarios()
            })
        
    }
})

verSocios.addEventListener('click',(e)=>{
    if(e.target.className === 'fas fa-edit fa-2x'){
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
        fetch( URL.url_administradores+'ver3',{
            method: 'POST',
            body: datoRef,
            enctype: 'multipart/form-data'
            
        })
        .then( datos => datos.json() )
        .then( dato =>{ 
            console.log(dato)
           
            panel.innerHTML = `
            
            
                <form class="formEditarFull" id="formEditarProducto"> 
                    <h4>Nombre:</h4>
                    <div class="inputDi1">
                        <input type="text" name="ped_nombre" class="" value="${dato[0].ped_nombre}">
                    </div>
                    <h4>Teléfono:</h4>
                    <div class="inputDi1">
                        <input type="number" class="" name="ped_telefono" value="${dato[0].ped_telefono}">
                    </div>
                    <h4>Descripción:</h4>
                    <div class="inputDi1">
                        <input type="text" class="" name="ped_descripcion" value="${dato[0].ped_descripcion}">
                    </div>
                    <div class="inputDi1">
                        <input type="hidden" class="" name="ped_total" value="${dato[0].ped_total}">
                    </div>
                    <h4>Abono:</h4>
                    <div class="inputDi1">
                        <input type="number" class="" name="ped_abono" value="${dato[0].ped_abono}">
                    </div>
                    <h4>Fecha de Entrega:</h4>
                    <div class="inputDi1">
                        <input type="date" class="" name="ped_entrega" value="${dato[0].ped_entrega}">
                    </div>
                    <input type="hidden" name="ped_id" value="${dato[0].ped_id}">
                    <button type="button" class="aca">Actualizar</button>
                </form>
            </div>
            `
            panel.classList.add('is-active')
        })
    }
})    


if(document.getElementById("btnModal")){
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("btnModal");
    var span = document.getElementsByClassName("close")[0];
    var body = document.getElementsByTagName("body")[0];

    btn.onclick = function() {
        modal.style.display = "block";

        body.style.position = "static";
        body.style.height = "100%";
        body.style.overflow = "hidden";
    }

    span.onclick = function() {
        modal.style.display = "none";

        body.style.position = "inherit";
        body.style.height = "auto";
        body.style.overflow = "visible";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";

            body.style.position = "inherit";
            body.style.height = "auto";
            body.style.overflow = "visible";
        }
    }
}

       
    