<?php
	include "../view/inc/autoload.php";
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];

	if (isset($_GET['name'])) {
		try{
			$name = $_GET['name'];
	
			$taskDao = new TaskDAO();
			
			$task = $taskDao->getTask($name);
			//var_dump($task);
			if(!$task){
				include '../view/pageNotFound.php';
				die();
			}
			
			include '../view/viewtask.php';
		}catch (Exception $e){
			include '../view/pageNotFound.php';
			die();
		}
	}
	
?>