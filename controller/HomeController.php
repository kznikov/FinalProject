<?php
	include "../view/inc/autoload.php";

	if ($_SESSION['user']) {		
		$user = json_decode($_SESSION['user'],true);
		
		$tasksData = new TaskDAO();
		
		$openTasks = $tasksData->getUserAssignOpenTasks($user['id']);
		$workingOnTasks = $tasksData->getUserAssignWorkingOnTasks($user['id']);
		
		
		
		include '../view/homepage.php';
	}
	else
		header('Location:../view/index.php');
?>