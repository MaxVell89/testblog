<?php

class AdminController {

	public function actionAdd() {
		if (empty($_POST)) {
			include __DIR__ . '/../views/admin/add.php';
		} else {
			$title = $_POST['title'];
			$text = $_POST['text'];

			if (Admin::addNews($title, $text)) {
				echo 'ok<br>';
				echo '<a href="/">На главную</a>';
			} else {
				echo 'false';
			}
		}

	}

}