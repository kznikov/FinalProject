<?php 
	
	function __autoload($className) {
		require_once "../model/" . $className . '.php';	
	}
	
	
	include_once 'CheckSession.php';
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	
	
	include '../view/newproject.php';
	
?>