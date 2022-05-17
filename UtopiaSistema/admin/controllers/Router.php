<?php
class Router{
public $route;

public function __construct($route){

	if( !isset($_SESSION) )session_start();
	if( !isset($_SESSION['utopia'])){$_SESSION['utopia'] = false;}

	//programacion del enrutador
		
	if($_SESSION['utopia']){
		$this->route = isset($_GET['r']) ? $_GET['r'] : 'crearPedido' ;
		$controller = new ViewController();
		switch ($this->route) {
		case 'crearPedido':
		if (!isset($_POST['r'])) {$controller->load_view('crearPedido');}
		break;

		case 'momento'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('momento');}
		else if( $_POST['r'] == 'momento'){$controller->load_view('momento');}
		break;

		case 'proyecto'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('proyecto');}
		else if( $_POST['r'] == 'proyecto'){$controller->load_view('proyecto');}
		break;

		case 'imgProyectos'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('imgProyectos');}
		else if( $_POST['r'] == 'imgProyectos'){$controller->load_view('imgProyectos');}
		break;

		case 'crearPedido'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('crearPedido');}
		else if( $_POST['r'] == 'crearPedido'){$controller->load_view('crearPedido');}
		break;

		case 'encuesta'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('encuesta');}
		else if( $_POST['r'] == 'encuesta'){$controller->load_view('encuesta');}
		break;

		case 'editarPerfil'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('editarPerfil');}
		else if( $_POST['r'] == 'editarPerfil'){$controller->load_view('editarPerfil');}
		break;

		case 'salir'://salir si se inicia sesion
		$stock_session = new SessionControllers();
		$stock_session->logout();
		break;

		default:
		$controller->load_view('home');
			break;
		}
	}else{
			if ((!isset($_POST['user'])) && (!isset($_POST['pass']))) {
				$login_form = new ViewController();
				$login_form->load_view('login');
			}else{
				$app_session = new SessionControllers();
				$session = $app_session->login($_POST['user'], $_POST['pass']);
				if(empty($session)) { 
					$login_form = new ViewController();
					$login_form->load_view('home'); 
					header('Location: ./?error' );
				}else{
					//si encuentra los datos correctos inicia sesion y se crean variable de sesion si es necesario
					$_SESSION['utopia'] = true;
					date_default_timezone_set("America/Bogota");
					foreach ($session as $row) {
							$_SESSION['utopia_nombre'] = $row['adm_nombre'];
							$_SESSION['utopia_rol'] = $row['adm_rol'];
							$_SESSION['utopia_usuario'] = $row['adm_email'];
							$_SESSION['utopia_date'] = date('Y-m-d');
					}
					header('Location: ./');
				}
			}
	}
}
	public function __destruct(){
	unset($route);
	}
}
?>
