<?php
class ImagenesModel extends Model{

	public function set( $datos = array() ){
		foreach($datos as $key => $value){
			$$key = $value;	
		}
		$this->sql = "INSERT INTO proyectos_img
                      VALUES (  '$pmg_id',
					  			'$pry_id',
					  			'$pmg_img', 
					  			'$pmg_url'
                              )";
		$this->set_query();
		return 'ok';
	}
	
	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM proyectos_img WHERE pmg_id = $id"
			:"SELECT * FROM proyectos_img";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

    public function imgProyecto($id){
		$this ->sql = "SELECT * FROM proyectos_img WHERE pry_id = $id";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function del( $id = '' ){
		$this ->sql = "DELETE FROM proyectos_img WHERE pmg_id = $id";
		$this ->set_query();
		return 'ok';
	}
	
	public function __destruct(){
		//unset($this);
	}
}
?>