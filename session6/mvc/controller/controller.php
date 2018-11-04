<?php 
include 'model/model.php';
class Controller {
	function handleRequest() {
		$action = isset($_GET['action'])?$_GET['action']:'home';
		switch ($action) {
			case 'home':
				// Lay du lieu trang chu ra
				$model = new Model();
				$home = $model->getHomeData();
				//goi view can do du lieu
				include 'view/home.php';
				break;
			case 'about':
				// Lay du lieu trang chu ra
				$model = new Model();
				$about = $model->getAboutData();
				//goi view can do du lieu
				include 'view/about.php';
				break;
            case 'contact':
                $model = new Model();
                $contact = $model->getContactData();
                //goi view can do du lieu
                include 'view/contact.php';
				# code...
				break;
            case 'news':
                $model = new Model();
                $news = $model->getNewsData();
                //goi view can do du lieu
                include 'view/news.php';
				# code...
				break;
			default:
				# code...
				break;
		}
	}
}
 ?> 
