<?php 

require __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$ctrl = 'Admin';
	$act = 'Edit';
} elseif (!empty($_POST)) {
	$ctrl = 'Admin';
	$act = 'Add';
}
	

$controllerName = $ctrl . 'Controller';

$controller = new $controllerName;
$method = 'action' . $act;
$controller->$method();