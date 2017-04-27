<?php
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	
	
	include_once 'CheckSession.php';
	
	$sessionVars = json_decode($_SESSION['user'], true);

	

	$user_id = $sessionVars['id'];
	$user_email = $sessionVars['email'];
	try{
		$projects = new ProjectDAO();
		$adminProjects = $projects->getAdminProjects($user_id);
		//var_dump($adminProjects);
	}catch (Exception $e){
		$message =  $e->getMessage();
	}
	
	//var_dump($adminProjects);
	include '../view/myproject.php';
?>