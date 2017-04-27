<?php 
	
	function __autoload($className) {
		require_once "../model/" . $className . '.php';	
	}
	
	include_once 'CheckSession.php';
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];

	$infoUser = new UserDAO;

	$result = $infoUser->selectUser();

	if(isset($_SESSION['success_update'])){
		$successMessage = "Updated successfully!";
		unset($_SESSION['success_update']);
	}

	include '../view/userlist.php';

	
?>