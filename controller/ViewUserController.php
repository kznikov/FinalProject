<?php

session_start();

function __autoload($className) {
	require_once "../model/" . $className . '.php';	
}

if(!isset($_SESSION['user'])){
		header('Location:../view/index.php');
	}

$sessionVars = json_decode($_SESSION['user'], true);

if (isset($_GET['user'])) {
	
	$user_id =  $_GET['user'];

	$editUser = new UserDAO;

	$result = $editUser->getInfoUser($user_id);

	if (!empty($result)) {
		include '../view/userprofile.php';
	} else {
		session_destroy();
		unset($_SESSION['user']);
		include '../view/index.php';
	}

	
}


?>