<?php 

	// require '/modules/functions.php';

	// $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';

	// $articles = sql_query($sql);

require __DIR__ . '/bd.php';

$art = new MyDataBase();
$articles = $art->getAll();

?>