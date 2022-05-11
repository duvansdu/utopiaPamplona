<?php 
class Autoload_api{
	public function __construct(){
		spl_autoload_register(function($class_name){
			$models_path = '../../HULAGOMALL/models/' . $class_name . '.php' ;
			$controllers_path = '../HULAGOMALL/controllers/' . $class_name . '.php' ;
			if( file_exists($models_path))  {
				require_once($models_path);
				//echo "<p>$models_path</p>";
			}
			if( file_exists($controllers_path))	{
				require_once($controllers_path);
				//echo "<p>$controllers_path</p>";
			}
		});
	}

	public function __destruct() {
		unset($models_path, $controllers_path);
	}
}

?>