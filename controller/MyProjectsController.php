<?php

	include "../view/inc/autoload.php";
	
	$user_id = $sessionVars['id'];
	$user_email = $sessionVars['email'];
	
	try {
	    $projectDAO = new ProjectDAO();
	    $adminProjects = $projectDAO->getAdminProjects($user_id);

	    //var_dump($adminProjects);
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
		header('Location:ErrorController.php', true, 302);
	}
	
	include '../view/myproject.php';
?>