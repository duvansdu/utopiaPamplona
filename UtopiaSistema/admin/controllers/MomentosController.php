<?php
class MomentosController{
	private $moment;

	public function __construct(){
		$this->moment = new MomentosModel();
	}

	public function set( $id = array() ){
		return $this->moment->set($id);
	}

	public function get($id = ''){
		return $this->moment->get($id);
	}

	public function actualizarMomento($id,$nombre,$color){
		return $this->moment->actualizarMomento($id,$nombre,$color);
	}

	public function del($id = ''){
		$this->moment->del($id);
	}

	public function __destruct(){
		unset($moment);
	}
}


?>
