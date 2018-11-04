<?php 
	include 'config/connectdb.php';
	include 'model/user.php';
	include 'model/product.php';
	class FrontendController {
		function handleRequest(){
			$productModel = new Product();
			$listProduct =$productModel->getListProduct();
			include 'view/frontend/home.php';
		}
	}
?>