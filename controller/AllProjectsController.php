<?php

include "../view/inc/autoload.php";

	$user_id = $sessionVars['id'];
	$user_email = $sessionVars['email'];
	
	try {
		$projectDao = new ProjectDAO();
		$userDao = new UserDAO();
		$allProjects = $projectDao->getUserAllProjects($user_id);
		$roles = $userDao->getUserAllProjectRole($user_id);
		$allRoles = array();
		foreach ($roles as $role){
			$allRoles[$role['project_id']] = $role['roles_id'];
		}
		
		
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
		header('Location:ErrorController.php', true, 302);
	}
	include '../view/allprojects.php';



?>