<!DOCTYPE html>
<html>
<head>
	<title>List user - session 5</title>
</head>
<body>
	<?php 
	include 'connectbd.php';
	$sql = "SELECT * FROM users";
	$result = mysqli_query($connect, $sql);
	?>
	<a href="register.php">Register</a>
	<h1>List users</h1>
	<?php 
		if($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$id = $row['id'];
				echo $row['id'].' - '.$row['username'].' - '.$row['password'];
				echo " <a href='edit.php?id=$id'>EDIT</a>";
				echo " | <a href='delete.php?id=$id'>DELETE</a>";
				echo "<br>";
			}
		} else {
			echo "No users";
		}
	?>

</body>
</html>