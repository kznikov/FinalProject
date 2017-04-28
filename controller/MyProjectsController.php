<?php
include "../view/inc/autoload.php";

	$user_id = $sessionVars['id'];
	$user_email = $sessionVars['email'];
	
	try {
	    $projectDAO = new ProjectDAO();
	    $adminProjects = $projectDAO->getAdminProjects($user_id);
	} catch (Exception $e) {
	
	    $message = $e->getMessage();
	}
	
	include '../view/myproject.php';
?>