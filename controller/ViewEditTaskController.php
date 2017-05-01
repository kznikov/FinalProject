<?php
	include "../view/inc/autoload.php";

	if (isset($_GET['name'])) {
		try{
			$name = $_GET['name'];
	
			$taskDao = new TaskDAO();
			
			$task = $taskDao->getTask($name);

			if(!$task){
				include '../view/pageNotFound.php';
				die();
			}
			$_SESSION['name'] = $name;
			include '../view/edittask.php';
		}catch (Exception $e){
			include '../view/pageNotFound.php';
			die();
		}
	} else {
		include '../view/pageNotFound.php';
	}
	
?>