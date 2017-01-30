<?php 

	// require '/modules/functions.php';

	// $sql = "INSERT INTO `articles` (`title`, `description`, `text`)
	// 				VALUES ('$title', '$description', '$text')";

	// $res = sql_query($sql);

require __DIR__ . '/bd.php';

$art = new MyDataBase();
$res = $art->addArticle($title, $date, $description, $text);

?>