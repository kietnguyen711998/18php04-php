<?php 
	class Connectdatabase {
		public $conn;
		function __construct(){
			$this->connect();
		}
		function connect(){
			$server = 'localhost'; //$server = '127.0.0.1';
			$username = 'root';
			$password = ''; //$password = '';
			$database = 'php_shopdemo';
			$this->conn = mysqli_connect($server, $username, $password, $database);
			return $this->conn;
		}
	}
?>