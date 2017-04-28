<?php 
	include "../view/inc/autoload.php";
	
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	
	include '../view/newproject.php';
	
?>