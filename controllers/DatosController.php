<?php
class DatosController{
	private $datos;

	public function __construct(){
		$this->datos = new DatosModel();
	}

	public function set( $array = array() ){ 
		return $this->datos->set($array);
	}

	public function get($ref = ''){
		return $this->datos->get($ref);
	}

	public function verNombre($texto){
		return $this->datos->verNombre($texto);
	}

	public function del($ref = ''){
		return $this->datos->del($ref);
	}

	public function __destruct(){
		unset($this->datos);
	}
}
?> 