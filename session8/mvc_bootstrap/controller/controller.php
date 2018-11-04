<?php 
	include 'model/user.php';
	class Controller {
		/*
			* Kiem tra request tu view
		*/
		function handleRequest() {
			$action = isset($_GET['action'])?$_GET['action']:'home';
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
						header("Location: index.php?action=list_user");
					}
					include 'view/add_user.php';
					break;
				case 'list_user':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					$userModel = new User();
					$listUser =$userModel->getListUser();
					//view du lieu
					include 'view/list_user.php';
					break;
				case 'delete_user':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					$id = $_GET['id'];
					$userModel = new User();
					$userModel->deleteUser($id);
					//view du lieu
					header("Location: index.php?action=list_user");
					break;

				case 'edit_user':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					$id = $_GET['id'];
					$userModel = new User();
					$userEdit = $userModel->getUserInfo($id);
					// FETCH_ASSOC: trả về dữ liệu array với key là tên cột của bảng trong CSDL.
					while ($row = $userEdit->fetch_assoc()) {
						$nameEdit = $row['name'];
						$usernameEdit = $row['username'];
					}
					if(isset($_POST['edit_user'])) {
						$name     = $_POST['name'];
						$username = $_POST['username'];
						$userModel = new User();
						$userModel->EditUser($id, $name, $username);
						header("Location: index.php?action=list_user");
					}
					include 'view/edit_user.php';
					break;		
				case 'add_product':
					//view du lieu
					include 'view/add_product.php';
					break;
				case 'list_product':
					//view du lieu
					include 'view/list_product.php';
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
							header("Location: index.php?action=list_user");
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
					# code...
					break;
			}

		}
	}
?>