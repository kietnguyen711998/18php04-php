<!DOCTYPE html>
<html>
<head>
	<title>Edit - session 5</title>
</head>
<body>
	<?php 
		$id = $_GET['id'];
		include 'connectdb.php'; 
		$sql = "SELECT * FROM products WHERE id = $id";
		$result = mysqli_query($connect, $sql);
		while ($row = $result->fetch_assoc()) {
			$name = $row['name'];
            $price = $row['price'];
            $description = $row['description'];
		}
		if(isset($_POST['edit'])) {
			$name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            
			$sql = "UPDATE products SET name = '$name', description 
			= '$description' WHERE id = $id";
			mysqli_query($connect, $sql);
			header("Location: listproduct.php");
			//header("Location: http://24h.com.vn");
		}	
	?>
	<h1>Edit form</h1>
	<form action="#" name="Edit Products" method="post">
		<p>Name:<input type="text" name="name" value="<?php echo $name;?>"></p>

		<p>Price:<input type="text" name="price" value="<?php echo $price;?>"></p>

        <p>Description:<input type="text" name="description" value="<?php echo $description;?>"></p>

		<p><input type="submit" name="edit" value="Edit"></p>
	</form>
</body>
</html>