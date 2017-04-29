<?php
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	session_start();
	
	if (isset($_SESSION['user'])) {	
		try{
			$user = json_decode($_SESSION['user'],true);
			
			$tasksData = new TaskDAO();
			
			$openTasks = $tasksData->getUserAssignOpenTasks($user['id']);
			$workingOnTasks = $tasksData->getUserAssignWorkingOnTasks($user['id']);

			
			include '../view/homepage.php';
		}catch (Exception $e){
			$_SESSION['error'] = $e->getMessage();
			header('Location:ErrorController.php', true, 302);
		}
	}
	else{
		header('Location:../view/index.php');
	}
?>