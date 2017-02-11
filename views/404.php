<?php header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404</title>
</head>
<body>
<h1>Ошибка!</h1>
<p><?php echo $error; ?></p>
<p><a href="/">На главную</a></p>

</body>
</html>