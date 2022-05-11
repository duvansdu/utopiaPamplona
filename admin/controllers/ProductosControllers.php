<?php
class ProductosControllers{
	private $producto;

	public function __construct(){
		$this->producto = new ProductosModel();
	}
 
	public function set( $id = array() ){
		return $this->producto->set($id);
    }

	public function get($id = ''){
		return $this->producto->get($id);
	}

	public function traerProductosFiltro($id){
		return $this->producto->traerProductosFiltro($id);
	}

	public function traerProductosFiltroRef($id){
		return $this->producto->traerProductosFiltroRef($id);
	}

	public function actualizar($id,$encarrito,$cantidad){
		return $this->producto->actualizar($id,$encarrito,$cantidad);
	}

	public function actInventario($ref,$cantidad){
		return $this->producto->actInventario($ref,$cantidad);
	}

	public function inventarioAll(){
		return $this->producto->inventarioAll();
	}
	
	public function inventarioCantidad($cantidad){
		return $this->producto->inventarioCantidad($cantidad);
	}

	public function verCantidad($ref){
		return $this->producto->verCantidad($ref);
	}

	public function actPro($ref, $nombre, $precio, $contenido, $cantidad, $imagen){
		return $this->producto->actPro($ref, $nombre, $precio, $contenido, $cantidad, $imagen);
	}

	public function actProSinImg($ref, $nombre, $precio, $contenido, $cantidad){
		return $this->producto->actProSinImg($ref, $nombre, $precio, $contenido, $cantidad);
	}

	public function del($id = ''){
		$this->producto->del($id);
	} 

	public function __destruct(){
		unset($producto);
	}
}