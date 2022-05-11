<?php
class ImagenesModel extends Model{

	public function set( $datos = array() ){
		foreach($datos as $key => $value){
			$$key = $value;	
		}
		$this->sql = "INSERT INTO imagenes
                      VALUES (  '$img_id',
					  			'$hab_ref',
					  			'$img_nombre'
                              )";
		$this->set_query();
		return 'ok';
	}
	
	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM imagenes WHERE img_id = $id"
			:"SELECT * FROM imagenes";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

    public function imgPro($ref){
		$this ->sql = "SELECT * FROM imagenes WHERE pro_ref = $ref";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	

	public function del( $id = '' ){
		$this ->sql = "DELETE FROM imagenes WHERE img_id = $id";
		$this ->set_query();
		return 'ok';
	}
	
	public function __destruct(){
		//unset($this);
	}
}
?>