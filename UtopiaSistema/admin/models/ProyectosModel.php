<?php
class  ProyectosModel extends Model{

	public function set( $datos = array() ){
		foreach($datos as $key => $value){
			$$key = $value;	
		}
		$this->sql = "INSERT INTO  proyectos_momento 
                      VALUES (  '$pry_id',
                      			'$mom_id',
                      			'$pry_img',
								'$pry_nombre',
								'$pry_contenido',
								'$prov_estado'
                              )";
		$this->set_query();
		return 'ok';
	}
	
	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM  proyectos_momento WHERE pry_id = $id"
			:"SELECT * FROM  proyectos_momento";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function traerProyectoMomento($id){
		$this ->sql = "SELECT * FROM  proyectos_momento WHERE mom_id = $id";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function actPro($ref, $nombre, $contenido, $imagen, $prodActivo){
		$this ->sql = "	UPDATE  proyectos_momento
						SET pry_nombre = '$nombre',
							pry_contenido = '$contenido',
							pry_img = '$imagen',
							prov_estado = '$prodActivo'
						WHERE pry_id = $ref";
		$this ->set_query();
		return 'ok';
	}

	public function actProSinImg($ref, $nombre, $contenido, $prodActivo){
		$this ->sql = "	UPDATE  proyectos_momento
						SET pry_nombre = '$nombre',
							pry_contenido = '$contenido',
							prov_estado = '$prodActivo'
						WHERE pry_id = $ref";
		$this ->set_query();
		return 'ok';
	}


	public function del( $id = '' ){
		$this ->sql = "DELETE FROM  proyectos_momento WHERE pro_ref = $id";
		$this ->set_query();
	}
	
	public function __destruct(){
		//unset($this);
	}
}
?>