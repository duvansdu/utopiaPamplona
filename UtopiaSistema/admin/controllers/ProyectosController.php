<?php
class ProyectosController{
	private $proyecto;

	public function __construct(){
		$this->proyecto = new ProyectosModel();
	}
 
	public function set( $id = array() ){
		return $this->proyecto->set($id);
    }

	public function get($id = ''){
		return $this->proyecto->get($id);
	}

	public function traerProyectoMomento($id){
		return $this->proyecto->traerProyectoMomento($id);
	}

	public function traerproyectosFiltro($id){
		return $this->proyecto->traerproyectosFiltro($id);
	}

	public function traerproyectosFiltroRef($id){
		return $this->proyecto->traerproyectosFiltroRef($id);
	}

	public function actualizar($id,$encarrito,$cantidad){
		return $this->proyecto->actualizar($id,$encarrito,$cantidad);
	}

	public function actInventario($ref,$cantidad){
		return $this->proyecto->actInventario($ref,$cantidad);
	}

	public function inventarioAll(){
		return $this->proyecto->inventarioAll();
	}
	
	public function inventarioCantidad($cantidad){
		return $this->proyecto->inventarioCantidad($cantidad);
	}

	public function verCantidad($ref){
		return $this->proyecto->verCantidad($ref);
	}

	public function actPro($ref, $nombre, $contenido, $imagen, $prodActivo){
		return $this->proyecto->actPro($ref, $nombre, $contenido, $imagen, $prodActivo);
	}

	public function actProSinImg($ref, $nombre, $contenido, $prodActivo){
		return $this->proyecto->actProSinImg($ref, $nombre, $contenido, $prodActivo);
	}

	public function del($id = ''){
		$this->proyecto->del($id);
	} 

	public function __destruct(){
		unset($proyecto);
	}
}