<?php 
	
	function __autoload($className) {
		require_once "../model/" . $className . '.php';	
	}
	session_start();
	
	if(!isset($_SESSION['user'])){
		header('Location:../view/index.php');
	}
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	
	
	include '../view/newproject.php';
	
?>