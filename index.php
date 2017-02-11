<?php

require __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';
$id = !empty($pathParts[3]) ? $pathParts[3] : '';

if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$ctrl = 'Admin';
	$act = 'Edit';
} elseif (!empty($_POST)) {
	$ctrl = 'Admin';
	$act = 'Add';
}

$controllerName = 'Application\\Controllers\\' . $ctrl;

$controller = new $controllerName;
$method = 'action' . $act;

try {
	$controller->$method($id);
} catch (ModelException $e) {
	$view = new View();
	$view->error = $e->getMessage();
	$view->display('error.php');
} catch (E404Exception $e) {
    $view = new View();
    $view->error = $e->getMessage();
    $view->display('404.php');
} catch (PDOEXception $e) {
    $view = new View();
    $view->error = $e->getMessage();
    $view->display('403.php');
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
    exit;
}