<?php
class Router{
	//atributo
	public $route;

	public function __construct($route){
		//----------------switch enrrutador-------------------//
		$this->route = isset($_GET['r']) ? $_GET['r'] : 'home' ;
			$controller = new ViewController();
			switch ($this->route) {
				case 'home':
				if(!isset($_POST['r'])){$controller->load_view('home');}
				break;

				case 'pasarela':
				if(!isset($_POST['r'])){$controller->load_view('pasarela');}
				else if( $_POST['r'] == 'pasarela'){$controller->load_view('pasarela');}
				break;

				case 'url':
				if(!isset($_POST['r'])){$controller->load_view('url');}
				else if( $_POST['r'] == 'url'){$controller->load_view('url');}
				break;

				//////////////  hombre  //////////////// 
				case 'jeans-hombre-clasico':
				if(!isset($_POST['r'])){$controller->load_view('jeans-hombre-clasico');}
				else if( $_POST['r'] == 'jeans-hombre-clasico'){$controller->load_view('jeans-hombre-clasico');}
				break;
				
				case 'tapabocas-hombre':
				if(!isset($_POST['r'])){$controller->load_view('tapabocas-hombre');}
				else if( $_POST['r'] == 'tapabocas-hombre'){$controller->load_view('tapabocas-hombre');}
				break;

				case 'gorros-hombre':
				if(!isset($_POST['r'])){$controller->load_view('gorros-hombre');}
				else if( $_POST['r'] == 'gorros-hombre'){$controller->load_view('gorros-hombre');}
				break;

				///////////////  mujer  ///////////////
				case 'pijamas-mujer-jogger':
				if(!isset($_POST['r'])){$controller->load_view('pijamas-mujer-jogger');}
				else if( $_POST['r'] == 'pijamas-mujer-jogger'){$controller->load_view('pijamas-mujer-jogger');}
				break;

				case 'pijamas-mujer-blusones':
				if(!isset($_POST['r'])){$controller->load_view('pijamas-mujer-blusones');}
				else if( $_POST['r'] == 'pijamas-mujer-blusones'){$controller->load_view('pijamas-mujer-blusones');}
				break;

				case 'pijamas-mujer-short':
				if(!isset($_POST['r'])){$controller->load_view('pijamas-mujer-short');}
				else if( $_POST['r'] == 'pijamas-mujer-short'){$controller->load_view('pijamas-mujer-short');}
				break;

				case 'pijamas-mujer-pantalon':
				if(!isset($_POST['r'])){$controller->load_view('pijamas-mujer-pantalon');}
				else if( $_POST['r'] == 'pijamas-mujer-pantalon'){$controller->load_view('pijamas-mujer-pantalon');}
				break;

				case 'jeans-mujer-clasico':
				if(!isset($_POST['r'])){$controller->load_view('jeans-mujer-clasico');}
				else if( $_POST['r'] == 'jeans-mujer-clasico'){$controller->load_view('jeans-mujer-clasico');}
				break;


				case 'tapabocas-mujer':
				if(!isset($_POST['r'])){$controller->load_view('tapabocas-mujer');}
				else if( $_POST['r'] == 'tapabocas-mujer'){$controller->load_view('tapabocas-mujer');}
				break;

				case 'gorros-mujer':
				if(!isset($_POST['r'])){$controller->load_view('gorros-mujer');}
				else if( $_POST['r'] == 'gorros-mujer'){$controller->load_view('gorros-mujer');}
				break;

				//////////////  otros  ////////////////
				case 'sublimacion':
				if(!isset($_POST['r'])){$controller->load_view('sublimacion');}
				else if( $_POST['r'] == 'sublimacion'){$controller->load_view('sublimacion');}
				break;

				case 'personalizacion':
				if(!isset($_POST['r'])){$controller->load_view('personalizacion');}
				else if( $_POST['r'] == 'personalizacion'){$controller->load_view('personalizacion');}
				break;

				case 'pocillos':
				if(!isset($_POST['r'])){$controller->load_view('pocillos');}
				else if( $_POST['r'] == 'pocillos'){$controller->load_view('pocillos');}
				break;
				//////////////  pagina  ///////////////
				
				case 'nosotros':
				if(!isset($_POST['r'])){$controller->load_view('nosotros');}
				else if( $_POST['r'] == 'nosotros'){$controller->load_view('nosotros');}
				break;

				case 'pagar':
				if(!isset($_POST['r'])){$controller->load_view('pagar');}
				else if( $_POST['r'] == 'pagar'){$controller->load_view('pagar');}
				break;

				case 'respuestaEpayco':
				if(!isset($_POST['r'])){$controller->load_view('respuestaEpayco');}
				else if( $_POST['r'] == 'respuestaEpayco'){$controller->load_view('respuestaEpayco');}
				break;

				case 'salir':
				$usu_session = new SessionControllers();
				$usu_session->logout();
				break;

				default:
				$controller->load_view('home');
				break;
			}
	}
	public function __destruct(){
		unset($route);
	}
}
?>