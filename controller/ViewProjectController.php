<?php

	include "../view/inc/autoload.php";

	$user_email = $sessionVars['email'];

	if (isset($_GET['project'])) {
		
		$name = $_GET['project'];

		try{
			$projects = new ProjectDAO();
			$infoProject = $projects->getInfoProject($name);
			
			if(empty($infoProject['name'])){
				include '../view/pageNotFound.php';
				die();
			}
			//var_dump($infoProject);

			$user_id = $infoProject['admin_id'];

			$infoUser = new UserDAO;
			$result = $infoUser->getInfoUser($user_id);
			
			$users = ProjectDAO::getProjectAssocUsers($name);
			
			$projectTasks = TaskDAO::getProjectTasks($name);
		
			
			$toDoTasks = $projectTasks[0];
			$workingOnTasks = $projectTasks[1];
			$doneTasks = $projectTasks[2];
		
			$colors = array("Low"=>"#53ff1a","Medium"=>"#ffff1a","High"=>"#ffbf00","Escalated"=>"red",);
		}catch (Exception $e){
			$message =  $e->getMessage();
		}
	}

	include '../view/viewproject.php';
?>