<!DOCTYPE html>
<html>
<head>
	<title>Form post - session 3</title>
	<style type="text/css">
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<?php 
	$errName = '';
	$errPass = '';
	$errRePass = '';
	$errGender = '';
	$errCity = '';
	$check = true;
	$name = $password = $rePassword = $errGender 
	= $errCity = '';
	$checkMale = $checkFemale = $checkOther = '';
	$checkDN = $checkHN = $checkHCM = '';
	if (isset($_POST['submit'])) {
		//  var_dump($_FILES);exit();
		$name = $_POST['name'];
		$password = $_POST['password'];
		$rePassword = $_POST['re_password'];
		$gender = $_POST['gender'];
		$city = $_POST['city'];
		if ($name == '') {
			$check = false;
			$errName = 'Please input your name!';
		}
		if ($password == '') {
			$check = false;
			$errPass = 'Please input your password!';
		}
		if ($rePassword != $password) {
			$check = false;
			$errRePass = 'Your password is not matching!';
		}
		if ($gender == '') {
			$check = false;
			$errGender = 'Please choose your gender!';
		} else {
			if ($gender == 'male') {
				$checkMale = "checked";
			}
			if ($gender == 'female') {
				$checkFemale = "checked";
			}
			if ($gender == 'other') {
				$checkOther = "checked";
			}
		}
		if ($city == '') {
			$check = false;
			$errCity = 'Please choose your city!';
		} else {
			if ($city == 'danang') {
				$checkDN = "selected";
			}
			if ($city == 'hanoi') {
				$checkHN = "selected";
			}
			if ($city == 'hcm') {
				$checkHCM = "selected";
			}
		}
		if ($check) {
			echo "Register success!";
		}
	}	
	?>
	<h1>Register form</h1>
	<form action="#" name="RegisterForm" method="post" enctype="multipart/form-data">
		<p>Name: <input type="text" name="name" value="<?php echo $name;?>">
			<span class="error"><?php echo $errName;?></span>
		</p>
		<p>Password: <input type="password" name="password" value="<?php echo $password;?>">
			<span class="error"><?php echo $errPass;?></span>
		</p>
		<p>Re-Password: <input type="password" name="re_password" value="<?php echo $rePassword;?>">
			<span class="error"><?php echo $errRePass;?></span>
		</p>
		<p>Gender:
			<input type="radio" name="gender" value="male" <?php echo $checkMale;?>> Male
			<input type="radio" name="gender" value="female" <?php echo $checkFemale;?>> Female
			<input type="radio" name="gender" value="other" <?php echo $checkOther;?>> Other
			<span class="error"><?php echo $errGender;?></span>
		</p>
		<p>City:
			<select name="city">
				<option value="">Choose city</option>
				<option value="danang" <?php echo $checkDN;?>>Da Nang</option>
				<option value="hanoi" <?php echo $checkHN;?>>Ha Noi</option>
				<option value="hcm" <?php echo $checkHCM;?>>Ho Chi Minh</option>
			</select>
			<span class="error"><?php echo $errCity;?></span>
		</p>
		<p>Avatar: <input type="file" name="avatar"></p>
		<input type="submit" name="submit" value="Register">
	</form>
</body>
</html>