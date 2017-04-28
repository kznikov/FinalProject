<?php

	include "../view/inc/autoload.php";
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	try{
		$tasksData = new TaskDAO();
		
		$allTasks = $tasksData->getUserAllTasks($user_id);
	}catch (Exception $e){
		$_SESSION['error'] = $e->getMessage();
		header('Location:ErrorController.php', true, 302);
	}
	
	include '../view/alltasks.php';
?>