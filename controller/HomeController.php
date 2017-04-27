<?php
	
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	
	session_start();
	
	if ($_SESSION['user']) {		
		$user = json_decode($_SESSION['user'],true);
		
		$openTasks = TaskDAO::getUserAssignOpenTasks($user['id']);
		$workingOnTasks = TaskDAO::getUserAssignWorkingOnTasks($user['id']);
			
		include '../view/homepage.php';
	}
	else
		header('Location:../view/index.php');
?>