<?php 

require __DIR__ . '/../classes/db.php';

class News {
	public $id;
	public $title;
	public $text;

	public static function getAll() {
		$db = new DB;
		return $db->queryAll('SELECT * FROM articles', 'News');
	}

	public static function getOne($id) {
		$db = new DB;
		return $db->queryOne('SELECT * FROM articles WHERE id = ' . $id, 'News');
	}
}

 ?>