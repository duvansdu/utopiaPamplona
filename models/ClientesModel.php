<?php
class ClientesModel extends Model{

	public function set( $datos = array() ){
		foreach($datos as $key => $value){
			$$key = $value;	
		}
		$this->sql = "INSERT INTO clientes
                      VALUES (  '$cli_documento',
                                '$cli_nombre',
                                '$cli_apellidos',
                                '$cli_telefono',
                                '$cli_email',
                                '$cli_departamento',
                                '$cli_municipio',
                                '$cli_direccion',
                                '$cli_detalles'
                              )";
		$this->set_query();
		return 'ok';
	}
	
	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM clientes WHERE cli_documento = $id"
			:"SELECT * FROM clientes";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function del( $id = '' ){
		$this ->sql = "DELETE FROM clientes WHERE id = $id";
		$this ->set_query();
	}
	
	public function __destruct(){
		//unset($this);
	}
}
?>