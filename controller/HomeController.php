<?php
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	session_start();
	
	if (isset($_SESSION['user'])) {	
		try{
			$user = json_decode($_SESSION['user'],true);
			$userId = (int)($user['id']);
			
			$userDAO = new UserDAO();
			$tasksData = new TaskDAO();
			$projectDAO = new ProjectDAO();
			
			$openTasks = $tasksData->getUserAssignOpenTasks($userId);
			$workingOnTasks = $tasksData->getUserAssignWorkingOnTasks($userId);
			$onlineUsers = $userDAO->getOnlineUSers($userId);
			$lastProjects = $projectDAO->getLastCreatedUserProjects($userId);
			
			include '../view/homepage.php';
		}catch (Exception $e){
			
		}
	}
	else{
		header('Location:../view/index.php');
	}
?>