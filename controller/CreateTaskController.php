<?php
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	session_start();
	
	
	//var_dump($r);
	include '../view/createtask.php';
?>