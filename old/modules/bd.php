<?php 

	class MyDataBase {
		static protected $host = 'localhost';
		static protected $user = 'root';
		static protected $pass = '';
		public $name_db = 'testblog';
		public function __construct() {
			mysql_connect(self::$host, self::$user, self::$pass);
			mysql_select_db($this->name_db);
		}
		public function getAll() {
			$sql = 'SELECT * FROM `articles`';
			$res = mysql_query($sql);
			$articles = [];
			while (false != $art = mysql_fetch_assoc($res)) {
				$articles[] = $art;
			}
			return $articles;
		}
		public function getOnes($id) {
			$sql = 'SELECT * FROM `articles` WHERE `id` = ' . $id; 
			$res = mysql_query($sql);
			$articles = mysql_fetch_assoc($res);
			return $articles;
		}
		public function addArticle($title, $date, $description, $text) {
			$sql = "INSERT INTO `articles` (`title`, `date`, `description`, `text`)
					VALUES ('$title', '$date', '$description', '$text')";

			return mysql_query($sql);
		}
	}

?>