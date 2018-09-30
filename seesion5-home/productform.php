<!DOCTYPE html>
<html>
<head>
	<title>Product - session 5</title>
</head>
<body>
	<?php 
		 include 'connectdb.php'; 
		if(isset($_POST['submit'])) {
			$name = $_POST['name'];
			$price = $_POST['price'];
			$description = $_POST['description'];
			$sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$description')";
            mysqli_query($connect, $sql);
            header("Location: listproduct.php");
			//header("Location: http://24h.com.vn");
		}
	?>
	<h1>Products form</h1>
	<form action="#" name="Product Form" method="post">
		<p>Name:<input type="text" name="name"></p>

		<p>Price:<input type="text" name="price"></p>

		<p>Description:<input type="text" name="description"></p>

		<p><input type="submit" name="submit" value="Add To Product"></p>
	</form>
</body>
</html>