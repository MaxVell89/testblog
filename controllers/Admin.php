<?php
namespace Application\Controllers;
use Application\Models\News;

class Admin
{
	public function actionAdd()
    {
		if (empty($_POST)) {
			include __DIR__ . '/../views/admin/add.php';
		} else {
			$insNews = new News();

			$insNews->title = $_POST['title'];
			$insNews->text = $_POST['text'];

			if ($insNews->save()) {
				echo 'ok<br>';
				echo '<a href="/">На главную</a>';
			} else {
				echo 'false';
			}
		}
	}

	public function actionEdit($id)
    {
		if (!isset($_POST['edit'])) {
			$item = News::findOneByPk($id);
			$view = new \View;
			$view->item = $item;
			$view->id = $id;
			$view->display('admin/edit.php');
		} else {
			$id = $_POST['id'];
			$updNews = new News();
			$updNews->title = $_POST['title'];
			$updNews->text = $_POST['text'];

			if ($updNews->save($id)) {
				echo 'ok<br>';
				echo '<a href="/">На главную</a>';
			} else {
				echo 'false';
                echo '<a href="/">На главную</a>';
			}
		}
	}

	public function actionDelete($id)
    {
		$db = new News();
		if ($db->delete($id)) {
			echo 'ok<br>';
			echo '<a href="/">Назад</a>';
		}
	}

}