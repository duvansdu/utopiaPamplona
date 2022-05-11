<?php
class ClientesController{
	private $clientes;

	public function __construct(){
		$this->clientes = new ClientesModel();
	}

	public function set( $array = array() ){ 
		return $this->clientes->set($array);
	}

	public function get($ref = ''){
		return $this->clientes->get($ref);
	}

	public function del($ref = ''){
		$this->clientes->del($ref);
	}

	public function __destruct(){
		unset($this->clientes);
	}
}
?> 