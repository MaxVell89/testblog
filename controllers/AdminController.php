<?php

class AdminController {

	public function actionAdd() {
		if (empty($_POST)) {
			include __DIR__ . '/../views/admin/add.php';
		} else {
			$insNews = new News();

			$insNews->title = $_POST['title'];
			$insNews->text = $_POST['text'];

			if ($insNews->insert()) {
				echo 'ok<br>';
				echo '<a href="/">На главную</a>';
			} else {
				echo 'false';
			}
		}
	}

	public function actionEdit() {	
		
		if (!isset($_POST['edit'])) {
			$item = News::findOneByPk($id);
			$view = new View;
			$view->item = $item;
			$view->id = $_GET['id'];
			$view->display('admin/edit.php');
		} else {
			$id = $_POST['id'];
			$updNews = new News();
			$updNews->title = $_POST['title'];
			$updNews->text = $_POST['text'];

			if ($updNews->update($id)) {
				echo 'ok<br>';
				echo '<a href="/">На главную</a>';
			} else {
				echo 'false';
			}
		}
	}

	public function actionDelete() {
		$id = $_GET['id'];
		$db = new News();
		if ($db->delete($id)) {
			echo 'ok<br>';
			echo '<a href="/">Назад</a>';
		}
	}

}