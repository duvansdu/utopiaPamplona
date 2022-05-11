<?php
class ProductosController{
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
 
    public function porTipo($id){
		return $this->producto->porTipo($id);
	}

	public function traerProductosFiltro($id){
		return $this->producto->traerProductosFiltro($id);
	}

	public function actPro($ref, $nombre, $precio, $contenido, $horma, $contenidoNeto, $imagen, $prodActivo){
		return $this->producto->actPro($ref, $nombre, $precio, $contenido, $horma, $contenidoNeto, $imagen, $prodActivo);
	}

	public function actProSinImg($ref, $nombre, $precio, $contenido, $horma, $contenidoNeto, $prodActivo){
		return $this->producto->actProSinImg($ref, $nombre, $precio, $contenido, $horma, $contenidoNeto, $prodActivo);
	}

	public function del($id = ''){
		$this->producto->del($id);
	}

	public function __destruct(){
		unset($producto);
	}
}