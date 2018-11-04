<?php
	 include 'config/connecttestdb.php';
	/**
	 * 
	 */

	class Product extends Connectdatabase
	{
			function __construct() {
        		// parent::__construct();
    	}
		
		function InsertProduct($productname, $price, $image)
		{
			$sql = "INSERT INTO products (productname, price, image) VALUES ('$productname', '$price', '$image')";
			return mysqli_query($this->conn, $sql);
		}
		function getListProduct(){
			$sql = "SELECT * FROM products";
			$result = mysqli_query($this->conn, $sql);
			return $result;
		}
		function deleteProduct($id)
		{
			$sql = "DELETE FROM products";
			return mysqli_query($this->conn, $sql);
		}
		function getProductInfo($id)
		{
			$sql = "SELECT * FROM products WHERE id=$id";
			$result = mysqli_query($this->conn, $sql);
			return $result;
		}
		function EditProduct($id, $productname, $price, $image)
		{
			$sql = "UPDATE products SET productname = '$productname', price = '$price', image = '$image' WHERE id = $id";
			return mysqli_query($this->conn, $sql);
		}
	}
  ?>