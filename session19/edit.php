<!DOCTYPE html>
<html>
<head>
	<title>Edit - session 5</title>
</head>
<body>
	<?php 
		$id = $_GET['id'];
		include 'connectbd.php'; 
		$sql = "SELECT * FROM users WHERE id = $id";
		$result = mysqli_query($connect, $sql);
		while ($row = $result->fetch_assoc()) {
			$username = $row['username'];
			$password = $row['password'];
		}
		if(isset($_POST['edit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "UPDATE users SET username = '$username', password 
			= '$password' WHERE id = $id";
			mysqli_query($connect, $sql);
			header("Location: list_user.php");
			//header("Location: http://24h.com.vn");
		}	
	?>
	<h1>Edit form</h1>
	<form action="#" name="Register" method="post">
		<p>Username:<input type="text" name="username" value="<?php echo $username;?>"></p>

		<p>Password:<input type="password" name="password" value="<?php echo $password;?>"></p>

		<p><input type="submit" name="edit" value="Edit"></p>
	</form>
</body>
</html>