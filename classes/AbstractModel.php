<?php

abstract class AbstractModel
{
    public $id;

	protected static $table;
	public $data = [];

	public function __set($k, $v)
    {
		$this->data[$k] = $v;
	}

	public function __get($k)
    {
		return $this->data[$k];
	}

	public function __isset($k)
    {
		return isset($this->data[$k]);
	}

	public static function findAll()
    {
		$class = get_called_class();
		$sql = 'SELECT * FROM ' . static::$table;
		$db = new DB();
		$db->setClassName($class);
		return $db->query($sql);
	}

	public static function findOneByPk($id)
    {
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
		$db = new DB();
		$res = $db->query($sql, [':id' => $id]);

		if (empty($res)) {
		    throw new E404Exception('Запись не найдена');
        }
        return $res[0];
	}

	public static function findByColumn($column, $value)
    {
		$class = get_called_class();
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :value';
		$db = new DB();
		$db->setClassName($class);
		$res = $db->query($sql, [':value' => $value]);

		if (empty($res)) {
			throw new ModelException('Ничего не найдено');
		}
		return $res[0];
	}

	private function insert()
    {
		$cols = array_keys($this->data);

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
		$this->id = $db->lastInsertId(); 
	}

    private function update($id) {
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

	public function save($id = '')
    {
	    if (false == $id) {
	        return $this->insert();
        } else {
             return $this->update($id);
        }
    }

	public function delete($id)
    {
		$sql = '
			DELETE FROM ' . static::$table . '
			WHERE id = :id
		';
		$db = new DB();
		return $db->execute($sql, [':id' => $id]);
	}



}