<?php

try {
	include "../view/inc/autoload.php";
	
	$user_id = $sessionVars['id'];
	$user_email = $sessionVars['email'];
	$username = $sessionVars['username'];
	
	
		if(isset($_POST['submit'])){
			$dao = new ProjectDAO();
			$userDao = new UserDAO();
			$username = htmlentities(trim($_POST['username']));
			$roleId = htmlentities(trim($_POST['role']));
			$projectId = htmlentities(trim($_POST['projectId']));
			if(!empty($username) && !empty($username) && !$dao->checkUserInProject($username, $projectId)){
			
				$userId = $userDao->getUserId($username);
				$projectName = $dao->getProjectName($projectId);
				$dao->addUserToProject($userId['id'], $projectId, $roleId);
				$assocUsersTable = $userDao->getProjectAssocUsers($projectName['name']);
				echo json_encode($assocUsersTable);
			}else{
				echo '{"error": "The user is already in this project!"}';
			}
		}
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	//echo $e->getMessage();
	//echo $e->getLine();
	header('Location:ErrorController.php', true, 302);
}
?>