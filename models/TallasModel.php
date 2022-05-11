<?php
class TallasModel extends Model{

	public function set( $datos = array() ){
		foreach($datos as $key => $value){
			$$key = $value;	
		}
		$this->sql = "INSERT INTO tallas 
                      VALUES (  '$talla_id',
								'$pro_ref',
								'$talla_numero',
								'$talla_cantidad'
                              )";
		$this->set_query();
	}
	
	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM tallas WHERE talla_id = '$id'"
			:"SELECT * FROM tallas";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data; 
	}

	public function traerTallas($id){
		$this ->sql = "	SELECT * FROM tallas WHERE pro_ref = '$id' AND talla_cantidad > 0";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data; 
	}

	public function buscarCantidad($ref,$talla){
		$this ->sql = "	SELECT * FROM tallas WHERE pro_ref = '$ref' AND talla_numero = '$talla'";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function actualizarTalla($ref,$talla){
		$this ->sql = "	UPDATE tallas SET talla_cantidad = $cantidad WHERE pro_ref = '$ref' AND talla_numero = '$talla'";
		$this ->set_query();
	}

	public function restarActualizarCantidad($ref,$talla,$cantidadCarrito,$cantidadBD){
		$cantidadNew = $cantidadBD - $cantidadCarrito;
		$this ->sql = "	UPDATE tallas SET talla_cantidad = $cantidadNew WHERE pro_ref = '$ref' AND talla_numero = '$talla'";
		$this ->set_query();
	}
	public function sumarActualizarCantidad($ref,$talla,$cantidad){
		$cantidadNew = $cantidad + 1;
		$this ->sql = "	UPDATE tallas SET talla_cantidad = $cantidadNew WHERE pro_ref = '$ref' AND talla_numero = '$talla'";
		$this ->set_query();
	}
	public function sumarTodoActualizarCantidad($ref,$talla,$cantidad,$cantidadencarrito){
		$cantidadNew = $cantidad + $cantidadencarrito;
		$this ->sql = "	UPDATE tallas SET talla_cantidad = $cantidadNew WHERE pro_ref = '$ref' AND talla_numero = '$talla'";
		$this ->set_query();
	}

	public function del( $id = '' ){
		$this ->sql = "DELETE FROM talla WHERE talla_id = $id";
		$this ->set_query();
	}
	
	public function __destruct(){
		//unset($this);
	}
}
?>