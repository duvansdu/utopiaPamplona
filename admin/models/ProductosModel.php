<?php
class ProductosModel extends Model{

	public function set( $datos = array() ){
		foreach($datos as $key => $value){
			$$key = $value;	
		}
		$this->sql = "INSERT INTO productos 
                      VALUES (  '$pro_ref',
                      			'$tip_id',
                      			'$adm_email',
								'$pro_nombre',
								'$pro_precio',
								'$pro_img',
								'$pro_contenido',
								'$pro_cantidad',
								'$pro_fechaCreacion',
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

	public function inventarioAll(){
		$this ->sql = " SELECT * 
						FROM productos 
						INNER JOIN factura
						ON productos.fac_id = factura.fac_id";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function inventarioCantidad($cantidad){
		$this ->sql = "	SELECT * 
						FROM productos 
						INNER JOIN factura
						ON productos.fac_id = factura.fac_id
						WHERE pro_inventario = $cantidad";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function verCantidad($ref){
		$this ->sql = "	SELECT * FROM productos WHERE pro_ref = '$ref'";
		
		$this ->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function actualizar($id,$encarrito,$cantidad){
		$newcantidad = $cantidad - $encarrito;
		$this ->sql = "	UPDATE productos SET pro_inventario = $newcantidad WHERE pro_ref = '$id'";
		$this ->set_query();
		return 'ok';
	}

	public function actInventario($ref,$cantidad){
		$this ->sql = "	UPDATE productos SET pro_cantidad = $cantidad WHERE pro_ref = '$ref'";
		$this ->set_query();
		return 'ok';
	}

	public function actPro($ref, $nombre, $precio, $contenido, $cantidad, $imagen){
		$this ->sql = "	UPDATE productos
						SET pro_nombre = '$nombre',
							pro_contenido = '$contenido',
							pro_cantidad = '$cantidad',
							pro_precio = '$precio',
							pro_img = '$imagen'
						WHERE pro_ref = '$ref'";
		$this ->set_query();
	}

	public function actProSinImg($ref, $nombre, $precio, $contenido, $cantidad){
		$this ->sql = "	UPDATE productos
						SET pro_nombre = '$nombre',
							pro_contenido = '$contenido',
							pro_cantidad = '$cantidad',
							pro_precio = '$precio'
						WHERE pro_ref = '$ref'";
		$this ->set_query();
	}

	public function traerProductosFiltro($id){
		$this ->sql = " SELECT * 
						FROM productos
						WHERE productos.pro_nombre LIKE '%$id%'
						";

		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function traerProductosFiltroRef($id){
		$this ->sql = " SELECT * 
						FROM productos
						WHERE productos.pro_ref = '$id'
						";

		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
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