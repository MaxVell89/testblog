<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>News Blog</title>
</head>
<body>

<div class="container">
<a href="/">На главную</a>
	<form action="/add.php" method="post">
		<div class="form_group">
			<label for="title">Название статьи</label><br>
			<input id="title" type="text" name="title">
		</div>
			<div class="form_group">
			<label for="description">Краткое описание</label><br>
			<textarea name="description" id="description" cols="40" rows="10"></textarea>
		</div>
			<div class="form_group">
			<label for="text">Текст</label><br>
			<textarea name="text" id="text" cols="40" rows="30"></textarea>
		</div>
		<input type="submit">
	</form>
</div>
	
</body>
</html>