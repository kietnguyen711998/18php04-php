<?php 
	include 'model/model.php';
	class Controller {
		/*
			* Kiem tra request tu view
		*/
		function handleRequest() {
			$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($action) {
				case 'home':
					$model = new Model();
					$homeData = $model->getHomePage();

					//view du lieu
					include 'view/homepage.php';
					break;
				
				case 'news':
					$model = new Model();
					$newsData = $model->getNews();

					//view du lieu
					include 'view/news.php';
					break;
				case 'news_detail':
					$model = new Model();
					$newsDetailData = $model->getNewsDetail();

					//view du lieu
					include 'view/news_detail.php';
					break;
				
				default:
					# code...
					break;
			}

		}
	}
?>