<?php
	//include "../view/inc/autoload.php";
	
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}

	include_once 'CheckSession.php';
	
	$sessionVars = json_decode($_SESSION['user'], true);

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