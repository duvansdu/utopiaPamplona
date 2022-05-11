<?php
class TipoProductosControllers{
	private $tipo;

	public function __construct(){
		$this->tipo = new TipoProductosModel();
	}

	public function set( $id = array() ){
		return $this->tipo->set($id);
	}

	public function get($id = ''){
		return $this->tipo->get($id);
	}

	public function verproducto($id){
		return $this->tipo->verproducto($id);
	}

	public function del($id = ''){
		$this->tipo->del($id);
	}

	public function __destruct(){
		unset($tipo);
	}
}
