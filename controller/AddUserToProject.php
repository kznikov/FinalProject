<?php

try {
	include "../view/inc/autoload.php";
	
	$user_id = $sessionVars['id'];
	$user_email = $sessionVars['email'];
	$username = $sessionVars['username'];
	
	
		if(isset($_POST['submit'])){
			$username = htmlentities(trim($_POST['username']));
			$roleId = htmlentities(trim($_POST['role']));
			$projectId = htmlentities(trim($_POST['projectId']));
			if(!empty($username) && !empty($username)){
				$dao = new ProjectDAO();
				$userDao = new UserDAO();
				$rojectName = $dao->getProjectName($projectId);
				$projectName = $dao->getProjectName($projectId);
				$dao->addUserToProject($username, $projectId, $roleId);
				$assocUsersTable = $userDao->getProjectAssocUsers($projectName);
				echo $assocUsersTable;
			}else{
				throw new Exception("Empty username or role");
			}
		}
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	echo $e->getLine();
	//header('Location:ErrorController.php', true, 302);
}
?>