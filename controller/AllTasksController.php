<?php
	include_once 'CheckSession.php';
	include "../view/inc/autoload.php";
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	
	$tasksData = new TaskDAO();
	
	$allTasks = $tasksData->getUserAllTasks($user_id);
	
	include '../view/alltasks.php';
?>