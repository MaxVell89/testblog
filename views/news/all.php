<a href="/Admin/Add">Добавить статью</a>
<?php foreach ($items as $item): ?>

	<h1><a href="/news/one/<?php echo $item->id ?>"><?php echo $item->title ?></a></h1>
	<p><a href="/admin/edit/<?php echo $item->id ?>">Edit</a></p>
	<p><a href="/admin/delete/<?php echo $item->id ?>">Delete</a></p>

<?php endforeach; ?>