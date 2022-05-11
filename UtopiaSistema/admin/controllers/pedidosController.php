<?php
class pedidosController{
	private $admin;

	public function __construct(){
		$this->admin = new pedidosModel();
	}

	public function set( $id = array() ){
		return $this->admin->set($id);
	}

	public function get($id = ''){
		return $this->admin->get($id);
	}

	public function actImg($ref,$imagen){
		return $this->admin->actImg($ref,$imagen);
	}

	public function actSoc($ref, $adm_pass, $adm_nombre , $imagen, $adm_subrol, $adm_telefono, $adm_activo, $adm_info ){
		return $this->admin->actSoc($ref, $adm_pass, $adm_nombre , $imagen, $adm_subrol, $adm_telefono, $adm_activo, $adm_info);
	}

	public function actSocSinImg($ref,$ped_nombre, $ped_telefono, $ped_descripcion, $ped_total, $ped_abono, $ped_saldo,$ped_entrega){
		return $this->admin->actSocSinImg($ref,$ped_nombre, $ped_telefono, $ped_descripcion, $ped_total, $ped_abono, $ped_saldo,$ped_entrega);
	}

	public function verSocios(){
		return $this->admin->verSocios();
	}

	public function del($id = ''){
		$this->admin->del($id);
	}
	public function imprimir($id = ''){
		return $this->admin->imprimir($id);
	}

	public function __destruct(){
		unset($admin);
	}
}


?>
