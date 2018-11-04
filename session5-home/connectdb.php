<?php 
	$server = 'localhost'; //$server = '127.0.0.1';
	$username = 'root';
	$password = ''; //$password = '';
	$database = 'php04';
	$connect = mysqli_connect($server, $username, $password, $database);
	// Check connection
	if (mysqli_connect_errno()) {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//  else {
	// 	echo "Connect success!";
	// }
?>