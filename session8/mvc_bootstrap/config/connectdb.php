<?php 
	class ConnectDB {
		public $conn;
		function __construct(){
			$this->connect();
		}
		function connect(){
			$server = 'localhost'; //$server = '127.0.0.1';
			$username = 'root';
			$password = ''; //$password = '';
			$database = '18php04-shop';
			$this->conn = mysqli_connect($server, $username, $password, $database);
			return $this->conn;
		}
	}
?>