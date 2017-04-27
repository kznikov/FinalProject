<?php

	function __autoload($className) {
		require_once "../model/" . $className . '.php';	
	}
	
	include_once 'CheckSession.php';
	
	$sessionVars = json_decode($_SESSION['user'], true);

	if (isset($_GET['user'])) {
	
		$user_id =  $_GET['user'];

	} else {

		$user_id = $sessionVars['id'];	

	}



	$editUser = new UserDAO;

	$result = $editUser->getInfoUser($user_id);

	$_SESSION['userId'] = $user_id;

	include '../view/editProfile.php';

	
?>