<?php
try{
	include "../view/inc/autoload.php";
	
	$sessionVars = json_decode($_SESSION['user'], true);

	$user_email = $sessionVars['email'];
	$userId = $sessionVars['id'];

	if (isset($_GET['project'])) {

			$name = $_GET['project'];
			$projectDAO = new ProjectDAO();
			//var_dump($name);
			$userProjects = $projectDAO->getUserAllProjects($sessionVars['id']);
			$allProjects = array();
			foreach ($userProjects as $key=>$project){
				$allProjects [] = $userProjects[$key]->name;
			}
			try{
				$projectInfo = $projectDAO->getInfoProject($name);
			}catch (Exception $e){
				include '../view/pageNotFound.php';
				die();
			}
			
			//var_dump($allProjects);
			if(in_array($_GET['project'], $allProjects)){
				
				$user_id = $projectInfo->adminId;
				
				$userDAO = new UserDAO;
				$result = $userDAO->getInfoUser($user_id);
				
				$users = $userDAO->getProjectAssocUsers($name);
				
				$taskDAO = new TaskDAO();
				
				$projectTasks = $taskDAO->getProjectTasks($name);
				
				$userRole = $userDAO->getUserProjectRole($userId, $projectInfo->id);
				
				$toDoTasks = $projectTasks[0];
				$workingOnTasks = $projectTasks[1];
				$doneTasks = $projectTasks[2];
				
				$roles = new RoleDAO();
				$result = $roles->getRoles();
				
				/*   $users = new UserDAO();
				 $getuser = $users->selectUser();   */
				
				$colors = array("Low"=>"#53ff1a","Medium"=>"#ffff1a","High"=>"#ffbf00","Escalated"=>"red");
				include '../view/viewproject.php';
			}else{
				$_SESSION['error'] = "You do not have access rights to this page!";
				header('Location:ErrorController.php', true, 302);
			}
		
	}else{
		header('Location:../view/pageNotFound.php', true, 302);
	}
	
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	//echo $e->getLine();
	header('Location:ErrorController.php', true, 302);
}

?>