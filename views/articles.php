<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>News Blog</title>
</head>
<body>

<div class="container">
	<article class="news">
		<h1><?php echo $article['title']; ?></h1>
		<p><?php echo $article['text']; ?></p>
		<a href="/">На главную</a>
	</article>
</div>
	
</body>
</html>