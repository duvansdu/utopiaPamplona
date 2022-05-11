<?php
class AdministradoresController{
	private $admin;

	public function __construct(){
		$this->admin = new AdministradoresModel();
	}

	public function set( $id = array() ){
		return $this->admin->set($id);
	}

	public function get($id = ''){
		return $this->admin->get($id);
	}

	public function actImg($ref,$imagen){
		return $this->admin->actImg($ref,$imagen);
	}

	public function verSocios(){
		return $this->admin->verSocios();
	}

	public function del($id = ''){
		$this->admin->del($id);
	}

	public function __destruct(){
		unset($admin);
	}
}


?>
