<?php
class AdministradoresModel extends Model{

	public function set( $cliente_data = array() ){
		foreach($cliente_data as $key => $value){
			$$key = $value;
		}
		$this->sql = "	INSERT INTO administradores 
				  		VALUES (
							'$admin_email',
							'$adm_pass',
							'$adm_nombre',
							'$adm_img',
							'$adm_rol',
							'$adm_subrol',
							'$adm_telefono',
							'$adm_activo',
							'$adm_time'
						)";
		$this->set_query();
	}

	public function get($documento = '' ){
		$this ->sql = ($documento != '' )
			?"SELECT * FROM administradores WHERE adm_documento = $documento"
			:"SELECT * FROM administradores";

		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function verSocios(){
		$this ->sql = "SELECT * FROM administradores ORDER BY adm_time DESC";

		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function actImg($ref,$imagen){
		$this ->sql = "	UPDATE administradores
						SET adm_img = '$imagen'
						WHERE adm_email = '$ref'";
		$this ->set_query();
	}

	public function del( $doc = '' ){
		$this ->sql = "DELETE FROM administradores WHERE adm_documento = $doc";
		$this ->set_query();
	}

	public function validate_admin($usuario, $pass){//busca el usuario y pass y compara los roles si es necesario
		$this->sql = "SELECT * FROM administradores WHERE adm_documento = '$usuario' AND adm_pass = '$pass' AND adm_rol = 'admin'";
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
