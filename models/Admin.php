<?php

class Admin {
	public static function addNews($title, $text) {
		$db = new DB;
		$sql = "INSERT INTO articles (`title`, `text`) VALUES ('" . $title . "', '" . $text . "')";
		return $db->queryAdd($sql);
	}
}