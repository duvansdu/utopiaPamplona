<?php
class MomentosModel extends Model{

	public function set( $cliente_data = array() ){
		foreach($cliente_data as $key => $value){
			$$key = $value;
		}
		$this->sql = "	INSERT INTO momentos
				  		VALUES (
							'$mom_id',
							'$mom_nombre',
							'$mom_color'
						)";
		$this->set_query();
		return 'ok';
	}

	public function get($id = '' ){
		$this ->sql = ($id != '' )
			?"SELECT * FROM momentos WHERE mom_id = '$id'"
			:"SELECT * FROM momentos";

		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function verSocios(){
		$this ->sql = "SELECT * FROM videos";

		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function actSoc($ref, $adm_pass, $adm_nombre , $imagen, $adm_subrol, $adm_telefono, $adm_activo, $adm_info){
		$this ->sql = "	UPDATE administradores
						SET adm_pass = '$adm_pass',
							adm_nombre = '$adm_nombre',
							adm_img = '$imagen',
							adm_subrol = '$adm_subrol',
							adm_telefono = '$adm_telefono',
							adm_activo = '$adm_activo',
							adm_info = '$adm_info'
						WHERE adm_email = '$ref'";
		$this ->set_query();
	}

	public function actualizarMomento ($id, $nombre, $color){
		$this ->sql = "	UPDATE momentos
						SET mom_nombre = '$nombre',
							mom_color = '$color'
						WHERE mom_id = $id";
		$this ->set_query();
		return 'ok';
	}


	public function actImg($ref,$imagen){
		$this ->sql = "	UPDATE administradores
						SET adm_img = '$imagen'
						WHERE adm_email = '$ref'";
		$this ->set_query();
	}

	public function del( $ref = '' ){
		$this ->sql = "DELETE FROM videos WHERE vid_id = $ref";
		$this ->set_query();
	}
	public function validate_admin($usuario, $pass){//busca el usuario y pass y compara los roles si es necesario
		$this->sql = "SELECT * FROM administradores WHERE adm_email = '$usuario' AND adm_pass = '$pass' AND adm_rol = 'admin'";
		$this->get_query();
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
	public function __destruct(){
		//unset($this);
	}
}
?>
