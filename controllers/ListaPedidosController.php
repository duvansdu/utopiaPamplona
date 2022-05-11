<?php
class ListaPedidosController{
	private $pedidos;

	public function __construct(){
		$this->pedidos = new ListaPedidosModel();
	}
	public function set( $array = array() ){ 
		$this->pedidos->set($array);
	}
	public function get($ref = ''){
		return $this->pedidos->get($ref);
	}
	
	public function del($ref = ''){
		$this->pedidos->del($ref);
	}

	public function __destruct(){
		unset($this->pedidos);
	}
}
?>
