<?php

	include "../view/inc/autoload.php";
	
	$sessionVars = json_decode($_SESSION['user'], true);

	$user_email = $sessionVars['email'];

	if (isset($_GET['project'])) {
		
		$name = $_GET['project'];

		try{
			$projectDAO = new ProjectDAO();
			$projectInfo = $projectDAO->getInfoProject($name);
			
			if(!$projectInfo->name){
				include '../view/pageNotFound.php';
				die();
			}
			$user_id = $projectInfo->adminId;

			$userDAO = new UserDAO;
			$result = $userDAO->getInfoUser($user_id);
			
			$users = $userDAO->getProjectAssocUsers($name);
			
			$taskDAO = new TaskDAO();
			
			$projectTasks = $taskDAO->getProjectTasks($name);
		
			
			$toDoTasks = $projectTasks[0];
			$workingOnTasks = $projectTasks[1];
			$doneTasks = $projectTasks[2];
		
			$colors = array("Low"=>"#53ff1a","Medium"=>"#ffff1a","High"=>"#ffbf00","Escalated"=>"red",);
		}catch (Exception $e){
			$_SESSION['error'] = $e->getMessage();
			header('Location:ErrorController.php', true, 302);
		}
	}

	include '../view/viewproject.php';

?>