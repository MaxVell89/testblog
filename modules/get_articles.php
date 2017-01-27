<?php 

	require '/modules/functions.php';

	$sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';

	$articles = sql_query($sql);

?>