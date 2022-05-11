<?php
class Router{
public $route;

public function __construct($route){

	if( !isset($_SESSION) )session_start();
	if( !isset($_SESSION['utopiadesing'])){$_SESSION['utopiadesing'] = false;}

	//programacion del enrutador
		
	if($_SESSION['utopiadesing']){
		$this->route = isset($_GET['r']) ? $_GET['r'] : 'home' ;
		$controller = new ViewController();
		switch ($this->route) {
		case 'home':
		if (!isset($_POST['r'])) {$controller->load_view('home');}
		break;

		case 'productos'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('productos');}
		else if( $_POST['r'] == 'productos'){$controller->load_view('productos');}
		break;

		case 'imgProductos'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('imgProductos');}
		else if( $_POST['r'] == 'imgProductos'){$controller->load_view('imgProductos');}
		break;

		case 'tipo_productos'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('tipo_productos');}
		else if( $_POST['r'] == 'tipo_productos'){$controller->load_view('tipo_productos');}
		break;

		case 'pedidos'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('pedidos');}
		else if( $_POST['r'] == 'pedidos'){$controller->load_view('pedidos');}
		break;
		
		case 'informes'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('informes');}
		else if( $_POST['r'] == 'informes'){$controller->load_view('informes');}
		break;

		case 'galeria'://variable get
		if (!isset($_POST['r'])) {$controller->load_view('galeria');}
		else if( $_POST['r'] == 'galeria'){$controller->load_view('galeria');}
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
					$_SESSION['utopiadesing'] = true;
					date_default_timezone_set("America/Bogota");
					foreach ($session as $row) {
							$_SESSION['utopiadesing_nombre'] = $row['adm_nombre'];
							$_SESSION['utopiadesing_rol'] = $row['adm_rol'];
							$_SESSION['utopiadesing_documento'] = $row['adm_documento'];
							$_SESSION['utopiadesing_date'] = date('Y-m-d');
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
