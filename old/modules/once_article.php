<?php 

// require '/modules/functions.php';

// $sql = 'SELECT * FROM `articles` WHERE `id` = ' .  $art_id;

// $art = sql_query($sql);

// $article = $art[0];

require __DIR__ . '/bd.php';

$art = new MyDataBase();

$article = $art->getOnes($art_id);


?>