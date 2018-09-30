<!DOCTYPE html>
<html>
<head>
	<title>Register - session 5</title>
</head>
<body>
	<?php 
		 include 'connectbd.php'; 
		if(isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            mysqli_query($connect, $sql);
            header("Location: list_user.php");
			//header("Location: http://24h.com.vn");
		}
	?>
	<h1>Register form</h1>
	<form action="#" name="Register" method="post">
		<p>Username:<input type="text" name="username"></p>

		<p>Password:<input type="password" name="password"></p>

		<p><input type="submit" name="submit" value="Register"></p>
	</form>
</body>
</html>