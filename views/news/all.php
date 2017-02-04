<a href="/Admin/Add">Добавить статью</a>
<?php foreach ($items as $item): ?>

	<h1><a href="/news/one/<?php echo $item->id ?>"><?php echo $item->title ?></a></h1>

<?php endforeach; ?>