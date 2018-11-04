<?php 
include 'config/connectdb.php';
include 'model/user.php';
include 'model/product.php';
include 'model/news.php';
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
					// Lay danh muc san pham ra
					$productModel = new Product();
					$category = $productModel->getListCategory();
					if(isset($_POST['add_product'])) {
						$name                = $_POST['name'];
						$code                = $_POST['code'];
						$price               = $_POST['price'];
						$product_category_id = $_POST['product_category_id'];
						// $image = $_FILES['image'];
						// $path = 'dist/img/';
						// // random string img
						// $imageName = uniqid().$image['name'];
						// // duy chuyen file vao thu muc can vao
						// move_uploaded_file($image['tmp_name'], $path.$imageName);
						$imageName = $this->uploadImage($_FILES['image']);
						$productModel = new Product();
						$productModel->InsertProduct($name, $code, $price, $imageName, $product_category_id);
						header("Location: admin.php?action=list_product");
					}
					//view du lieu
					include 'view/backend/add_product.php';
					break;
					case 'list_product':
					$this->checkLogin();
					$productModel = new Product();
					$listProduct =$productModel->getListProductAdmin();
					//view du lieu
					include 'view/backend/list_product.php';
					break;
					case 'delete_product':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					$id = $_GET['id'];
					$productModel = new Product();
					$productModel->deleteProduct($id);
					//view du lieu
					header("Location: admin.php?action=list_product");
					break;
					case 'edit_product':
					// kiem tra neu chua DANG NHAP thi khong cho vao trang nay
					// bat buoc quay lai trang login
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					// Lay duoc ID cua san pham can EDIT
					$id = $_GET['id'];

					// Lay tat ca thong tin cua san pham can EDIT ra theo ID
					$productModel = new Product();
					$productEdit = $productModel->getProductInfo($id);
					while ($row = $productEdit->fetch_assoc()) {
						$nameEdit            = $row['name'];
						$codeEdit            = $row['code'];
						$priceEdit           = $row['price'];
						$imageEdit           = $row['image'];
						$product_category_id = $row['product_category_id'];
					}
										// Lay danh muc san pham ra
					$productModel = new Product();
					$category = $productModel->getListCategory($product_category_id);
					// ket thuc viec lay thong tin theo ID


					// Kiem tra da submit de EDIT san pham chua?
					if(isset($_POST['edit_product'])) {
						// Lay duoc thong tin submit len!
						$name      = $_POST['name'];
						$code      = $_POST['code'];
						$price     = $_POST['price'];
						$product_category_id     = $_POST['product_category_id'];
						// Truoc mat, lay anh cu de luu
						$imageName = $imageEdit;
						//upload image
						// Kiem tra co chon anh de EDIT hay khong?
						//var_dump($_FILES['image']);exit();
						if(!$_FILES['image']['error']){
							$image = $_FILES['image'];
							$path = 'dist/img/';
							$imageName = uniqid().$image['name'];
							move_uploaded_file($image['tmp_name'], $path.$imageName);
							//delete old image
							unlink('dist/img/'.$imageEdit);
						}
						//end upload image
						$productModel = new Product();
						$productModel->EditProduct($id, $name, $code, $price, $imageName, $product_category_id);
						header("Location: admin.php?action=list_product");
					}

					// Day la view hien thi EDIT
					include 'view/backend/edit_product.php';
					break;	
					case 'add_news':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					// Lay danh muc san pham ra
					if(isset($_POST['add_news'])) {
						$title     = $_POST['title'];
						$image = $_FILES['image'];
						$path = 'dist/img/';
						$imageName = uniqid().$image['name'];
						move_uploaded_file($image['tmp_name'], $path.$imageName);
						$newsModel = new News();
						$newsModel->InsertNews($title, $imageName);
						header("Location: admin.php?action=list_news");
					}
					//view du lieu
					include 'view/backend/add_news.php';
					break;	
					case 'list_news':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					$newsModel = new News();
					$listNews =$newsModel->getListNews();
					//view du lieu
					include 'view/backend/list_news.php';
					break;
					case 'delete_news':
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					$id = $_GET['id'];
					$newsModel = new News();
					$newsModel->deleteNews($id);
					//view du lieu
					header("Location: admin.php?action=list_news");
					break;
					case 'edit_news':
					// kiem tra neu chua DANG NHAP thi khong cho vao trang nay
					// bat buoc quay lai trang login
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					// Lay duoc ID cua san pham can EDIT
					$id = $_GET['id'];

					// Lay tat ca thong tin cua san pham can EDIT ra theo ID
					$newsModel = new News();
					$newsEdit = $newsModel->getNewsInfo($id);
					while ($row = $newsEdit->fetch_assoc()) {
						$titleEdit            = $row['title'];
						$imageEdit           = $row['image'];
					}
										// Lay danh muc san pham ra
					$newsModel = new News();
					// ket thuc viec lay thong tin theo ID


					// Kiem tra da submit de EDIT san pham chua?
					if(isset($_POST['edit_news'])) {
						// Lay duoc thong tin submit len!
						$title      = $_POST['title'];
						// Truoc mat, lay anh cu de luu
						$imageName = $imageEdit;
						//upload image
						// Kiem tra co chon anh de EDIT hay khong?
						//var_dump($_FILES['image']);exit();
						if(!$_FILES['image']['error']){
							$image = $_FILES['image'];
							$path = 'dist/img/';
							$imageName = uniqid().$image['name'];
							move_uploaded_file($image['tmp_name'], $path.$imageName);
							//delete old image
							unlink('dist/img/'.$imageEdit);
						}
						//end upload image
						$newsModel = new News();
						$newsModel->EditNews($id, $title, $imageName);
						header("Location: admin.php?action=list_news");
					}

					// Day la view hien thi EDIT
					include 'view/backend/edit_news.php';
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
			function uploadImage($imageUpload){
				$image = $imageUpload;
				$path = 'dist/img/';
				$imageName = uniqid().$image['name'];
				move_uploaded_file($image['tmp_name'], $path.$imageName);
				return $imageName;
			}
			function checkLogin(){
				if(!isset($_SESSION['login'])){
					header("Location: login.php");
				}
			}
		}
		?>