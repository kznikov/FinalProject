<?php

	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	session_start();
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	
	$allTasks = TaskDAO::getUserAllTasks($user_id);
	
	include '../view/alltasks.php';



?>