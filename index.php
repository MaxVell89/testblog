<?php 

require __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';
// $id = isset($_GET['id']) ? $_GET['id'] : '0';

if (!empty($_POST)) {
	$ctrl = 'Admin';
	$act = 'Add';
}

$controllerName = $ctrl . 'Controller';

$controller = new $controllerName;
$method = 'action' . $act;
$controller->$method();