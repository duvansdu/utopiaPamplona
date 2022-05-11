<?php
//Clase Abstracta que nos permitira conectase al mysql
abstract class Model{
	//atributos
	//private static $db_host = 'localhost';
	//private static $db_user = 'root';
	//private static $db_pass = '';
	//private static $db_name = 'bdUtopia';

	//datos reales hostinger
	private static $db_host = 'localhost';
	private static $db_user = 'u297939733_utopiaSis';
	private static $db_pass = 'Ut0p14s1st3m4';
	private static $db_name = 'u297939733_utopiaSis';

	private static $db_charset = 'utf8';
	private $conn;
	protected $sql;
	protected $rows = array();

	//metodos
	//metodo establecedor
	abstract protected function set();
	//metodo obtenedor
	abstract protected function get();
	//metodo eliminador
	abstract protected function del();

	private function db_open(){
		$this ->conn = new mysqli(
			self::$db_host,
			self::$db_user,
			self::$db_pass,
			self::$db_name
 		);
		$this->conn->set_charset(self::$db_charset);
	}

	private function db_close(){
		$this->conn->close();
	}

	protected function set_query(){
		$this->db_open();
		$this->conn->query( $this->sql );
		$this->db_close();
	}

	protected function get_query(){
		$this->db_open();
		$result = $this->conn->query( $this->sql );
		while( $this->rows[] = $result-> fetch_assoc() );
		$result->close();
		$this->db_close();

		return array_pop($this->rows);
	}

}

?>
