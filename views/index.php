<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>News Blog</title>
</head>
<body>

<a href="/add.php">Добавить статью</a>

<div class="container">
	<?php foreach ($articles as $article): ?>
	<article class="news_block">
		<h1><a href="/articles.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h1>
		<div class="data"><?php echo $article['date']; ?></div>
		<p><?php echo $article['description']; ?></p>
		<a href="/articles.php?id=<?php echo $article['id']; ?>">Читать далее...</a>
	</article>
<?php endforeach; ?>
</div>
	
</body>
</html>