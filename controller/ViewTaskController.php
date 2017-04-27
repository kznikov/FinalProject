<?php
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	
	session_start ();
	if (! isset ( $_SESSION ['user'] )) {
		header ( 'Location:../view/index.php' );
	}
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];

	if (isset($_GET['name'])) {
		try{
			$name = $_GET['name'];
	
			$task = TaskDAO::getTask($name);
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