<?php 

	if (!$_GET['id']) {
		header('Location: /');
		exit;
	}

	$art_id = $_GET['id'];

	require '/modules/once_article.php';

	include '/views/articles.php';

?>