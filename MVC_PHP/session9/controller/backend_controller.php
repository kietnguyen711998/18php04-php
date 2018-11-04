<?php 
	include 'config/connectdb.php';
	include 'model/user.php';
	include 'model/product.php';
	class BackendController {
		/*
			* Kiem tra request tu view
		*/
		function handleRequest() {
			$action = isset($_GET['action'])?$_GET['action']:'home';
			//unlink('dist/img/gggggg.png');
			switch ($action) {
				case 'add_user':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					if(isset($_POST['add_user'])) {
						$name     = $_POST['name'];
						$username = $_POST['username'];
						$password = $_POST['password'];
						$userModel = new User();
						$userModel->InsertUser($name, $username, $password);
						header("Location: admin.php?action=list_user");
					}
					include 'view/backend/add_user.php';
					break;
				case 'list_user':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					$userModel = new User();
					$listUser =$userModel->getListUser();
					//view du lieu
					include 'view/backend/list_user.php';
					break;
				case 'delete_user':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					$id = $_GET['id'];
					$userModel = new User();
					$userModel->deleteUser($id);
					//view du lieu
					header("Location: admin.php?action=list_user");
					break;

				case 'edit_user':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					$id = $_GET['id'];
					$userModel = new User();
					$userEdit = $userModel->getUserInfo($id);
					while ($row = $userEdit->fetch_assoc()) {
						$nameEdit = $row['name'];
						$usernameEdit = $row['username'];
					}
					if(isset($_POST['edit_user'])) {
						$name     = $_POST['name'];
						$username = $_POST['username'];
						$userModel = new User();
						$userModel->EditUser($id, $name, $username);
						header("Location: admin.php?action=list_user");
					}
					include 'view/backend/edit_user.php';
					break;		
				case 'add_product':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					if(isset($_POST['add_product'])) {
						$name     = $_POST['name'];
						$price    = $_POST['price'];
						$image = $_FILES['image'];
						$path = 'dist/img/';
						$imageName = uniqid().$image['name'];
						move_uploaded_file($image['tmp_name'], $path.$imageName);
						$productModel = new Product();
						$productModel->InsertProduct($name, $price, $imageName);
						header("Location: admin.php?action=list_product");
					}
					//view du lieu
					include 'view/backend/add_product.php';
					break;
				case 'list_product':
					//view du lieu
					include 'view/backend/list_product.php';
					break;
				case 'login':
					//view du lieu
					if (isset($_POST['login'])) {
						$username = $_POST['username'];
						$password = $_POST['password'];
						$userModel = new User();
						$checkLogin = $userModel->checkLogin($username, $password);
						if($checkLogin) {
							$_SESSION['login'] = $username;
							header("Location: admin.php?action=list_user");
						} else {
							header("Location: login.php");
						}
					}
					
					break;
				case 'logout':
					unset($_SESSION['login']);
					header("Location: login.php");
					//view du lieu
					break;
				default:
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					# code...
					break;
			}

		}
	}
?>