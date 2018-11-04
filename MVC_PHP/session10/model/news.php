<?php 
	class News {
		public $conn;
		function __construct() {
			$connect = new ConnectDB();
			$this->conn = $connect->connect();
		}
		function InsertNews($title, $image){
			$sql = "INSERT INTO news (title, image) VALUES ('$title', '$image')";
			return mysqli_query($this->conn, $sql);
		}
		function getListNews() {
			$sql = "SELECT *  FROM news";	
			$result = mysqli_query($this->conn, $sql);
			return $result;
		}
		function deleteNews($id){
			$sql = "DELETE FROM news WHERE id = $id";
			return mysqli_query($this->conn, $sql);
		}
		function getNewsInfo($id) {
			$sql = "SELECT * FROM news WHERE id = $id";
			$result = mysqli_query($this->conn, $sql);
			return $result;
		}
		function EditNews($id, $title, $image){
			$sql = "UPDATE news SET title = '$title', image = '$image' WHERE id = $id";
			return mysqli_query($this->conn, $sql);
		}
	}
?>