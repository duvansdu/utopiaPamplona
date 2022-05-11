<?php
class PedidosController{
	private $pedidos;

	public function __construct(){
		$this->pedidos = new PedidosModel();
	}
	public function set( $array = array() ){ 
		return $this->pedidos->set($array);
	}
	public function get($ref = ''){
		return $this->pedidos->get($ref);
	}
	
    public function traerProductos($id){
		return $this->pedidos->traerProductos($id);
	}
	
	public function del($ref = ''){
		$this->pedidos->del($ref);
	}

	public function __destruct(){
		unset($this->pedidos);
	}
}
?>
