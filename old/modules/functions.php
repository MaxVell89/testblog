<?php 

function sql_connect() {
	$connect = mysqli_connect('localhost', 'root', '', 'testblog');

	if (false == $connect) {
		echo 'Нет соединения с БД';
		exit;
	}
	return $connect;
}

function sql_query($sql) {
	$art_res = mysqli_query(sql_connect(), $sql);

	if ($art_res === true) {
		return $art_res;
	}

	$res = [];

	while (false != $art = mysqli_fetch_assoc($art_res)) {
		$res[] = $art;
	} 
	return $res;
}

?>