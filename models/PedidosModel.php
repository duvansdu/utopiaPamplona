<?php
class PedidosModel extends Model{

	public function set( $datosPedidos = array() ){
		foreach($datosPedidos as $key => $value){
			$$key = $value;
		}
		$this->sql = "INSERT INTO pedidos
					  VALUES (  '$ped_id',
					  			'$cli_documento',
					  			'$ped_datosEnvio',
					  			'$ped_fecha_compra',
								'$ped_valor_productos',
								'$ped_valor_flete',
								'$ped_valor_total',
								'$ped_forma_pago',
								'$ped_IDorden_epayco',
								'$ped_estado_epayco',
								'$ped_estadoUtopia'
								)";
		$this->set_query();
		return 'ok';
	}

	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM pedidos WHERE ped_id = $id"
			:"SELECT * FROM pedidos";

		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function del( $id = '' ){
		$this->sql = "DELETE FROM pedidos WHERE ped_id = $id";
		$this->set_query();
	}

	public function __destruct(){
		//unset($this);
	}
}
?>
