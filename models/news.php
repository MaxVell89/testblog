<?php

class News 
	extends AbstractModel {

	public $id;
	public $title;
	public $text;

	protected static $table = 'articles';
	protected static $class = 'News';

}