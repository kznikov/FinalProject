<?php
	
	include "../view/inc/autoload.php";
	
	$userId = json_decode($_SESSION['user'],true)['id'];
	$userId = (int)($userId);
	
	try {
		$projectDAO = new ProjectDAO();
		$projects = $projectDAO->userAssignPermProjects($userId);
		//var_dump($r);
		include '../view/createtask.php';
		
	}catch (Exception $e){
		$_SESSION['error'] = $e->getMessage();
		header('Location:ErrorController.php', true, 302);
	}
		
	
	

?>