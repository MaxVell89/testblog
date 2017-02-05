<?php

abstract class AbstractModel {

	protected static $table;
	public $data = [];

	public function __set($k, $v) {
		$this->data[$k] = $v;
	}

	public function __get($k) {
		return $this->data[$k];
	}

	public static function findAll() {
		$class = get_called_class();
		$sql = 'SELECT * FROM ' . static::$table;
		$db = new DB();
		$db->setClassName($class);
		return $db->query($sql);
	}

	public static function findOneByPk($id) {
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
		$db = new DB();
		return $db->query($sql, [':id' => $id])[0];
	}

	public static function findByColumn($column, $value) {
		$class = get_called_class();
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :value';
		$db = new DB();
		$db->setClassName($class);
		return $db->query($sql, [':value' => $value]);
	}

	public function insert() {
		$cols = array_keys($this->data);
		
		$ins = [];
		$data = [];

		foreach ($cols as $col) {
			$data[':' . $col] = $this->data[$col];
		}

		$sql = '
			INSERT INTO ' . static::$table . ' 
			(' . implode(', ', $cols) . ') 
			VALUES 
			(' . implode(', ', array_keys($data)) . ')
		';

		$db = new DB();
		return $db->execute($sql, $data);
	}

		public function update($id) {
		$cols = $this->data;
		
		$str = [];

		foreach ($cols as $key => $value) {
			$str[] = $key . ' = ' . '\'' . $value . '\'';
		}

		$sql = '
			UPDATE ' . static::$table . ' 
			SET
			' . implode(', ', $str) . ' 
			WHERE
			id = :id
		';
		$db = new DB();
		return $db->execute($sql, [':id' => $id]);
	}

	public function delete($id) {
		$sql = '
			DELETE FROM ' . static::$table . '
			WHERE id = :id
		';
		$db = new DB();
		return $db->execute($sql, [':id' => $id]);
	}



}