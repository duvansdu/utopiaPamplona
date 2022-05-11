<?php
class TallasController{
	private $talla;
	
    public function __construct(){
		$this->talla = new TallasModel();
    }
    public function set( $ref = array() ){
		return $this->talla->set($ref);
	}
	public function get( $ref = '' ){
		return $this->talla->get($ref);
	}
	public function traerTallas($id){
		return $this->talla->traerTallas($id);
	}
	public function buscarCantidad($ref,$talla){
		return $this->talla->buscarCantidad($ref,$talla);
	}
	public function actualizarTalla($ref,$talla){
		$this->talla->actualizarTalla($ref,$talla);
	}
	public function sumarTodoActualizarCantidad($ref,$talla,$cantidad,$cantidadencarrito){
		$this->talla->sumarTodoActualizarCantidad($ref,$talla,$cantidad,$cantidadencarrito);
	}
	public function sumarActualizarCantidad($ref,$talla,$cantidad){
		$this->talla->sumarActualizarCantidad($ref,$talla,$cantidad);
	}
	public function restarActualizarCantidad($ref,$talla,$cantidadCarrito,$cantidadBD){
		$this->talla->restarActualizarCantidad($ref,$talla,$cantidadCarrito,$cantidadBD);
	}
	public function del($ref = ''){
		$this->talla->del($ref);
	}
	public function __destruct(){
		unset($this->talla);
	}

}