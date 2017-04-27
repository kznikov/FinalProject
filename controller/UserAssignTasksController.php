<?php

	include_once 'CheckSession.php';
	include "../view/inc/autoload.php";
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	
	try {
		
		$tasksData = new TaskDAO();
		
		$assignTasks = $tasksData->getUserAssignTasks($user_id);
		
	} catch ( Exception $e ) {
		$message = $e->getMessage ();
	}
	
	//var_dump($assignTasks);
	include '../view/mytasks.php';

?>