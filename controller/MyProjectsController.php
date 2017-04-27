<?php
	include "../view/inc/autoload.php";
	include_once 'CheckSession.php';
	
	$sessionVars = json_decode($_SESSION['user'], true);

	$user_id = $sessionVars['id'];
	$user_email = $sessionVars['email'];
	
	try {
	
	    $projects = new ProjectDAO();
	    $adminProjects = $projects->getAdminProjects($user_id);
	} catch (Exception $e) {
	
	    $message = $e->getMessage();
	}
	
	include '../view/myproject.php';
?>