
    <link rel="stylesheet" href="./assets/css/crearPedido.css?%s">
    <link rel="stylesheet" type="text/css" href="./assets/css/alertify.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
 
    <div class="caja2">
            <form id="formularioSocio" class="formulario">
                
                
                
                <button id="btnModal" class="btn btn-primary">Crear Pedido</button> 
                <div id="myModal" class="modalContainer">
                    <div class="modal-content">
                    <span class="close">×</span>
                    <h1 class="titulo">Agregar Pedido</h1>
                    <input type="text" class="form-control" name="ped_nombre" placeholder="Nombre del Cliente" id="ped_id" required></br> 
                    <h4>Fecha del Pedido:</h4>
                    <input type="date" class="form-control" name="ped_fecha" placeholder="Fecha del pedido" id="ped_fecha" required></br>  
                    <input type="number" class="form-control" name="ped_telefono" placeholder="Teléfono" id="ped_telefono" required></br>   
                    <input type="textarea" class="form-control" name="ped_descripcion" placeholder="Descripción del pedido" id="ped_descripcion" required></br>  
                    <input type="number" class="form-control" name="ped_total" placeholder="Total del Pedido $" id="ped_total" required></br>
                    <input type="number" class="form-control" name="ped_abono" placeholder="Abono del Pedido $" id="ped_abono" required></br>  
                    <h4>Fecha del Entrega:</h4>         
                    <input type="date" class="form-control" name="ped_entrega" placeholder="Fecha de Entrega" id="ped_entrega" required></br>  
                     <center><button type=submit" class="btn btn-primary">Agregar Pedido</button></center>
    
                    </div>
                </div> 
                <label id="respuestaFormulario"></label>
            </form>
                                 
                     <div class="verSocio" id="verSocios"><br></div>    
                                               
            </div>
       
    <div class="panel" id="panel"></div>
    <script src="JsBarcode.all.min.js"></script>
    <script src="./assets/dist/jspdf.min.js"></script>
    <script src="./assets/js/crearPedido.js?%s" type="module"></script>
    <script src="./assets/js/alertify.js" type="module"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
