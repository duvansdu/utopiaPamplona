<link rel="stylesheet" href="./assets/css/login.css?<?php print(time());?>">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			
	<div id="container-login">
        <div id="title"><i class="material-icons lock">lock</i> Utopia Desing</div>
        <form action="" method="POST" autocomplete="off" class="">
            <div class="input">
                <div class="input-addon">
				<i class="material-icons">face</i>
                </div>
                <input name="user" id="username" placeholder="Usuario" type="text" required class="validate" autocomplete="off">
            </div>

            <div class="input">
                <div class="input-addon">
				<i class="material-icons">vpn_key</i>
                </div>
                <input name="pass" id="password" placeholder="Contraseña" type="password" required class="validate" autocomplete="off">
            </div>
            <br>
            <input type="submit" value="Log In" />
        </form>
    </div>
<script type="text/javascript" src="./assets/js/login.js?<?php print(time());?>"></script>
<?php
if( isset($_GET['error'])){ 
	$template = ('<div class="error"><b>Datos Incorrectos</b></div>');
	printf($template, $_GET['error']);
}
?>
