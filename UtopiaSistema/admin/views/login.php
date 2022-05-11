<link rel="stylesheet" href="./assets/css/login.css?<?php print(time());?>">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			
<div id="container-login">
    <form action="" method="POST" autocomplete="off" class="">
        <div class="login-div">
            <div class="logo">
                <img src="./assets/img/pagina/logo.png" alt="">
            </div>

            <div class="title">Inicia Sesión</div>

            <div class="fields">
                <div class="username">
                    <i class="far fa-envelope"></i>
                    <input name="user" id="username" placeholder="Correo Electronico" type="text" required class="user-input" autocomplete="off">
                </div>

                <div class="password">
                    <i class="fas fa-lock"></i>
                    <input name="pass" id="password" placeholder="Contraseña" type="password" required class="pass-input" autocomplete="off">
                </div>
            </div>
        

        <button  type="submit" class="signin-button">Iniciar Sesión</button>
    <?php
        if( isset($_GET['error'])){ 
            $template = ('<div class="alert alert-danger" role="alert"><b>Datos Incorrectos</b></div>');
            printf($template, $_GET['error']);
        }
    ?>      
    </form> 
</div>  
<script type="text/javascript" src="./assets/js/login.js?<?php print(time());?>"></script>

