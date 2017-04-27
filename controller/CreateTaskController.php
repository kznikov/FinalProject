<?php
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	
	include_once 'CheckSession.php';
	
	
	//var_dump($r);
	include '../view/createtask.php';
?>