<?php
class SessionControllers{
	private $session;

	public function __construct(){
		$this->session = new AdministradoresModel();
	}

	public function login($usuario, $pass){
		return $this->session->validate_admin($usuario, $pass);
	}

	public function logout(){
		session_start();
		session_destroy();
		header('Location: ./');
	} 
}
