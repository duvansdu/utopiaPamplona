<?php
class DatosModel extends Model{

	public function set( $datos = array() ){
		foreach($datos as $key => $value){
			$$key = $value;	
		}
		$this->sql = "INSERT INTO datos
                      VALUES (  '$img_id',
								'$img_nombre'
                              )";
		$this->set_query();
		return 'ok';
	}
	
	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM datos WHERE img_id = $id"
			:"SELECT * FROM datos";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function verNombre($texto){
		$this ->sql = "SELECT * FROM datos WHERE dato_nombre = '$texto'";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function del( $id = '' ){
		$this ->sql = "DELETE FROM galeria WHERE img_id = $id";
		$this ->set_query();
		return 'ok';
	}
	
	public function __destruct(){
		//unset($this);
	}
}
?>