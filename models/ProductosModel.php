<?php
class ProductosModel extends Model{

	public function set( $datos = array() ){
		foreach($datos as $key => $value){
			$$key = $value;	
		}
		$this->sql = "INSERT INTO productos 
                      VALUES (  '$pro_ref',
								'$tip_id',
								'$pro_nombre',
								'$pro_precio',
								'$pro_img',
								'$pro_descripcion',
								'$pro_horma',
								'$pro_contenido_neto',
								'$pro_estado',
								'$pro_fechaCreacion',
								'$pro_prioridad',
								'$pro_activo'
                              )";
		$this->set_query();
		return 'ok';
	}
	
	public function get( $id = '' ){
		$this ->sql = ( $id != '' )
			?"SELECT * FROM productos WHERE pro_ref = '$id'"
			:"SELECT * FROM productos";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		} 
		return $data;
	}

    public function porTipo($id){
		$this ->sql = "	SELECT * FROM productos WHERE tip_id = $id";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function traerProductosFiltro($texto){
		$this ->sql = " SELECT * FROM productos 
						WHERE pro_nombre LIKE '%$texto%'
						AND pro_activo ='SI'
						";

		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function actPro($ref, $nombre, $precio, $contenido, $horma, $contenidoNeto, $imagen, $prodActivo){
		$this ->sql = "	UPDATE productos
						SET pro_nombre = '$nombre',
							pro_precio = '$precio',
							pro_descripcion = '$contenido',
							pro_horma = '$horma',
							pro_contenido_neto = '$contenidoNeto',
							pro_estado = '$prodActivo',
							pro_img = '$imagen'
						WHERE pro_ref = '$ref'";
		$this ->set_query();
		return 'ok';
	}

	public function actProSinImg($ref, $nombre, $precio, $contenido, $horma, $contenidoNeto, $prodActivo){
		$this ->sql = "	UPDATE productos
						SET pro_nombre = '$nombre',
							pro_precio = '$precio',
							pro_descripcion = '$contenido',
							pro_horma = '$horma',
							pro_contenido_neto = '$contenidoNeto',
							pro_estado = '$prodActivo'
						WHERE pro_ref = '$ref'";
		$this ->set_query();
		return 'ok';
	}

	public function del( $id = '' ){
		$this ->sql = "DELETE FROM productos WHERE pro_ref = $id";
		$this ->set_query();
	}
	
	public function __destruct(){
		//unset($this);
	}
}
?>