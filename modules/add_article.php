<?php 

	require '/modules/functions.php';

	$sql = "INSERT INTO `articles` (`title`, `description`, `text`)
					VALUES ('$title', '$description', '$text')";

	$res = sql_query($sql);

?>