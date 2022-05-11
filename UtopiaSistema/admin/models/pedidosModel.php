<?php
class pedidosModel extends Model{

	public function set( $cliente_data = array() ){
		foreach($cliente_data as $key => $value){
			$$key = $value;
		}
		$this->sql = "	INSERT INTO pedidos
				  		VALUES (
							 0,
							'$ped_nombre',
							'$ped_fecha',
							'$ped_telefono',
							'$ped_descripcion',
							'$ped_total',
							'$ped_abono',
							'$ped_saldo',
							'$ped_entrega'		
						)";
		$this->set_query();
	}

	public function get($id = '' ){
		$this ->sql = ($id != '' )
			?"SELECT * FROM pedidos WHERE ped_id = '$id'"
			:"SELECT * FROM pedidos";

		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function verSocios(){
		$this ->sql = "SELECT * FROM pedidos";

		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
	public function imprimir($id){
		$this ->sql = "SELECT * FROM pedidos WHERE ped_id = '$id'";
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

	public function actSocSinImg ($ref,$ped_nombre, $ped_telefono, $ped_descripcion, $ped_total, $ped_abono, $ped_saldo,$ped_entrega){
		$this ->sql = "	UPDATE pedidos
						SET ped_nombre = '$ped_nombre',
							ped_telefono = '$ped_telefono',
							ped_descripcion = '$ped_descripcion',
							ped_total = '$ped_total',
							ped_abono = '$ped_abono',
							ped_saldo = '$ped_saldo',
							ped_entrega = '$ped_entrega'
						WHERE ped_id = '$ref'";
		$this ->set_query();
	}


	public function actImg($ref,$imagen){
		$this ->sql = "	UPDATE administradores
						SET adm_img = '$imagen'
						WHERE adm_email = '$ref'";
		$this ->set_query();
	}

	public function del( $ref = '' ){
		$this ->sql = "DELETE FROM pedidos WHERE ped_id = $ref";
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
