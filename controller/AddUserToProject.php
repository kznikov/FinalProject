<?php

try {
	include "../view/inc/autoload.php";
	
	$user_id = $sessionVars['id'];
	$user_email = $sessionVars['email'];
	$username = $sessionVars['username'];
	
		$dao = new ProjectDAO();
		$userDao = new UserDAO();
		if($_SERVER ['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
			$username = htmlentities(trim($_POST['username']));
			$roleId = htmlentities(trim($_POST['role']));
			$projectId = htmlentities(trim($_POST['projectId']));
			if(!empty($username) && !empty($roleId) && !$dao->checkUserInProject($username, $projectId)){
				$userId = $userDao->getUserId($username);
				$projectName = $dao->getProjectName($projectId);
				$dao->addUserToProject($userId['id'], $projectId, $roleId);
				$assocUsersTable = $userDao->getProjectAssocUsers($projectName['name']);
				echo json_encode($assocUsersTable);
			}else{
				echo '{"error" : "The user is already in this project!"}';
			}
		}elseif($_SERVER ['REQUEST_METHOD'] === 'DELETE' && isset($_SESSION['user'])){
			$userId= explode('=',file_get_contents('php://input'))[1];
			$projectId= explode('=',file_get_contents('php://input'))[2];
			$roleId = explode('=',file_get_contents('php://input'))[3];
			
			if(!empty($username) && !empty($projectId) && $roleId != 1){
				$projectName = $dao->getProjectName($projectId);
				$dao->removeUserFromProject($userId, $projectId);
				$assocUsersTable = $userDao->getProjectAssocUsers($projectName['name']);
				echo json_encode($assocUsersTable);
			}else{
				echo '{"error": "Project Admin!"}';
			}
		}
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	//echo $e->getMessage();
	//echo $e->getLine();
	header('Location:ErrorController.php', true, 302);
}
?>