<?php 
class Product {
	public $conn;
	function __construct() {
		$connect = new ConnectDB();
		$this->conn = $connect->connect();
	}
	function InsertProduct($name,$code, $price, $image, $product_category_id){
		$sql = "INSERT INTO products (name, code, product_category_id, price, image) VALUES ('$name', '$code', $product_category_id, '$price', '$image')";
		return mysqli_query($this->conn, $sql);
	}
		//funtion frontend
	function getListProduct($category_id) {
		if ($category_id != ''){
			$sql = "SELECT products.id, products.name, products.code, products.price, products.image, product_categories.name AS category_name  FROM products INNER JOIN product_categories ON 
			products.product_category_id = product_categories.id WHERE product_category_id = $category_id";
		} else {
			$sql = "SELECT products.id, products.name, products.code, products.price, products.image, product_categories.name AS category_name  FROM products INNER JOIN product_categories ON 
			products.product_category_id = product_categories.id";
		}
		
		$result = mysqli_query($this->conn, $sql);
		return $result;
	}
	function getListDetail($id) {
		$sql = "SELECT products.id, products.name, products.code, products.price, products.image, cart_details.product_id, cart_details.id, cart_details.cart_id AS detail_name, carts.id  FROM products INNER JOIN cart_details ON products.id = cart_details.product_id INNER JOIN carts ON carts.id=cart_details.cart_id WHERE carts.id=cart_details.cart_id ";
		$result = mysqli_query($this->conn, $sql);
		return $result;
	}
	function getListProductAdmin() {
		$sql = "SELECT products.id, products.name, products.code, products.price, products.image, product_categories.name AS category_name  FROM products INNER JOIN product_categories ON 
		products.product_category_id = product_categories.id";
		$result = mysqli_query($this->conn, $sql);
		return $result;
	}
	function deleteProduct($id){
		$sql = "DELETE FROM products WHERE id = $id";
		return mysqli_query($this->conn, $sql);

	}
	function getProductInfo($id) {
		$sql = "SELECT * FROM products WHERE id = $id";
		$result = mysqli_query($this->conn, $sql);
		return $result;
	}
	function EditProduct($id, $name, $code, $price, $image, $product_category_id){
		$sql = "UPDATE products SET name = '$name', code = '$code', product_category_id = $product_category_id, price = '$price', image = '$image' WHERE id = $id";
		return mysqli_query($this->conn, $sql);
	}
	function getListCategory($product_category_id = null) {
		$sql = "SELECT * FROM product_categories";
		$select = '';
		$result = mysqli_query($this->conn, $sql);
		while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
			$name = $row['name'];
			$selected = ($id == $product_category_id)?'selected':'';
			$select.="<option value='$id' $selected>$name</option>";
		}
		return $select;
	}
}
?>