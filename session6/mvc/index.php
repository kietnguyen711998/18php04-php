<a href="index.php?action=home">Home</a>
| <a href="index.php?action=about">About</a>
| <a href="index.php?action=contact">Contact</a>
| <a href="index.php?action=news">News</a>
<?php 
	include 'controller/controller.php';
	$controller = new Controller();
	$controller->handleRequest();
?>