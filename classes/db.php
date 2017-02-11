<?php

class DB 
{
	private $dbh;
	private $className = 'stdClass';

	public function __construct() 
	{
	    try{
            $this->dbh = new PDO('mysql:dbname=testblog;host=localhost', 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $view = new View();
            $view->error = $e->getMessage();
            $view->display('403.php');
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
            exit;
        }

	}

	public function setClassName($className) 
	{
		$this->className = $className;
	}

	public function query($sql, $params = []) 
	{
		$sth = $this->dbh->prepare($sql);
		$sth->execute($params);
		$res = $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
		if (false == $res) {
		    throw new PDOException;
        }
        return $res;
	}

	public function execute($sql, $params = []) 
	{
		$sth = $this->dbh->prepare($sql);
		return $sth->execute($params);
	}

	public function lastInsertId() 
	{
		return $this->dbh->lastInsertId();
	}

}
