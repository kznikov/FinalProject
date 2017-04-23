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

	$editUser = new UserDAO;

	$result = $editUser->getInfoUser($user_id);

	include '../view/editProfile.php';

	
?>