<!DOCTYPE html>
<html>
<head>
	<title>List Product - session 5</title>
</head>
<body>
	<?php 
	include 'connectdb.php';
	$sql = "SELECT * FROM products";
	$result = mysqli_query($connect, $sql);
	?>
	<a href="productform.php">Add to Products</a>
	<h1>List Products</h1>
	<?php 
		if($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$id = $row['id'];
				echo $row['id'].' - '.$row['name'].' - '.$row['price'].' - '.$row['description'];
				echo " <a href='edit.php?id=$id'>EDIT</a>";
				echo " | <a href='delete.php?id=$id'>DELETE</a>";
				echo " | <a href='search.php?id=$id'>SEARCH</a>";
				echo "<br>";
			}
		} else {
			echo "No products";
		}
	?>

</body>
</html>