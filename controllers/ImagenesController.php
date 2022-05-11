<?php
class ImagenesController{
	private $imagenes;

	public function __construct(){
		$this->imagenes = new ImagenesModel();
	}

	public function set( $array = array() ){ 
		return $this->imagenes->set($array);
	}

	public function get($ref = ''){
		return $this->imagenes->get($ref);
	}

    public function imgPro($ref){
		return $this->imagenes->imgPro($ref);
	}

	public function del($ref = ''){
		return $this->imagenes->del($ref);
	}

	public function __destruct(){
		unset($this->habitacion);
	}
}
?> 