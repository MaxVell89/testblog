<?php 

	if (!empty($_POST)) {
		$title = $_POST['title'];
		$date = $_POST['date'];
		$description = $_POST['description'];
		$text = $_POST['text'];

		require '/modules/add_article.php';

		if (false == $res) {
			echo 'Ошибка добавления статьи';
		}

		header('Location: /');
		exit;
	}

	include '/views/add.php';

?>