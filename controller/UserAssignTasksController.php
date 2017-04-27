<?php

	include "../view/inc/autoload.php";
	$user_id = $sessionVars['id'];
	
	try {

		$assignTasks = TaskDAO::getUserAssignTasks($user_id);

	} catch ( Exception $e ) {
		$message = $e->getMessage ();
	}
	
	include '../view/mytasks.php';
?>