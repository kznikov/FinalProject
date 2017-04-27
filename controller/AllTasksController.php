<?php

	include "../view/inc/autoload.php";

	$user_id = $sessionVars['id'];
	
	$allTasks = TaskDAO::getUserAllTasks($user_id);
	
	include '../view/alltasks.php';



?>