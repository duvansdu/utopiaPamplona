<?php
class ListaPedidosModel extends Model{

	public function set( $datosPedidos = array() ){
		foreach($datosPedidos as $key => $value){
			$$key = $value;
		}
		$this->sql = "INSERT INTO listapedido
					  VALUES(   '$lpe_id',
                                '$ped_id',
                                '$pro_ref',
                                '$lpe_cantidad',
                                '$lpe_precio',
                                '$lpe_talla',
                                '$lpe_tipo',
                                '$lpe_nombre'
							)";
		$this->set_query(); 
		return 'ok';
	}

	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM listapedido WHERE lpe_id = $id"
			:"SELECT * FROM listapedido";

		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function del( $id = '' ){
		$this->sql = "DELETE FROM listapedido WHERE lpe_id = $id";
		$this->set_query();
	}

	public function __destruct(){
		//unset($this);
	}
}
?>
