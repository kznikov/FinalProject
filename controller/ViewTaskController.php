<?php
	include "../view/inc/autoload.php";
	//$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];

	if (isset($_GET['name'])) {
		try{
			$name = $_GET['name'];
	
			$taskDao = new TaskDAO();
			$userDAO = new UserDAO();
			$task = $taskDao->getTask($name);
			//var_dump($task);
			if(!$task){
				include '../view/pageNotFound.php';
				die();
			}
			
			$userRole = $userDAO->getUserProjectRole($user_id, $task->projectId);
			
			include '../view/viewtask.php';
		}catch (Exception $e){
			include '../view/pageNotFound.php';
			die();
		}
	}
	
?>