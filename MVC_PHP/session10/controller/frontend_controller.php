<?php 
	include 'config/connectdb.php';
	include 'model/user.php';
	include 'model/product.php';
	class FrontendController {
		function handleRequest(){
			$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($action) {
				case 'home':
					$category_id = isset($_GET['category_id'])?$_GET['category_id']:'';
					$productModel = new Product();
					$listProduct =$productModel->getListProduct($category_id);
					// $newsModel = new News();
					// $listNews =$newsModel->getListNews($category_id);
					
					// $userModel = new User();
					// $listUsers =$userModel->getListUser();
					include 'view/frontend/home.php';
					break;
				case 'product_detail':
					$id = isset($_GET['id'])?$_GET['id']:'';
					$productModel = new Product();
					$listDetail =$productModel->getListDetail($id);
					// goi mode product de lay thong tin san
					// pham theo ID
					include 'view/frontend/product_detail.php';
					# code...
					break;
				default:
					# code...
					break;
			}
		}
	}
?>