<?php
class TipoProductosModel extends Model{

	public function set( $cliente_data = array() ){
		foreach($cliente_data as $key => $value){
			$$key = $value;	
		}
		$this->sql = "INSERT INTO tipo_productos VALUES ('$tip_id', '$tip_producto')";
		$this->set_query();
	}
	
	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM tipo_productos WHERE tip_id = '$id'"
			:"SELECT * FROM tipo_productos";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function verproducto($id){
		$this ->sql = "	SELECT * FROM tipo_productos
						WHERE tip_id = $id";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function del( $id = '' ){
		$this ->sql = "DELETE FROM tipo_productos WHERE tip_id = $id";
		$this ->set_query();
	}
	
	public function __destruct(){
		//unset($this);
	}
}
?>