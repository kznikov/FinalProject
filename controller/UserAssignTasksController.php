<?php

	include "../view/inc/autoload.php";
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	
	try {
		
		$tasksData = new TaskDAO();
		$assignTasks = $tasksData->getUserAssignTasks($user_id);
		//var_dump($assignTasks);
		include '../view/mytasks.php';
		
	}catch (Exception $e){
		$_SESSION['error'] = $e->getMessage();
		header('Location:ErrorController.php', true, 302);
	}
	


?>