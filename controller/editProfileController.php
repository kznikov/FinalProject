<?php

	include_once  "../view/inc/autoload.php";
	
	$sessionVars = json_decode($_SESSION['user'], true);


try{
	if (isset($_GET['user'])) {
	    $user_id = $_GET['user'];
	} else {
	    $user_id = $sessionVars['id'];
	}
	
	$editUser = new UserDAO;
	$result = $editUser->getInfoUser($user_id);
	$_SESSION['userId'] = $user_id;
	include '../view/editProfile.php';
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);
}

?>