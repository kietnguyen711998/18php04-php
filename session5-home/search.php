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
		if(isset($_POST['search'])) {
			$name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            
			$sql = "SELECT * FROM products WHERE name like '$name%'AND description like '$description%' AND id = $id";
			mysqli_query($connect, $sql);
			header("Location: listproduct.php");
			//header("Location: http://24h.com.vn");
		}	
	?>
	<h1>Search form</h1>
	<form action="#" name="Edit Products" method="post">
		<p>Name:<input type="text" name="name"></p>

		<!-- value="<?php echo $name;?>"
		value="<?php echo $description;?>" -->

        <p>Description:<input type="text" name="description"></p>

		<p><input type="submit" name="search" value="Search"></p>
	</form>
</body>
</html>