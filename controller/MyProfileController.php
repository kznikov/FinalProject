<?php 

	include "../view/inc/autoload.php";
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];

	$user_id = $sessionVars['id'];
	
	$editUser = new UserDAO;
	
	$result = $editUser->getInfoUser($user_id);
	
	if (isset($_SESSION['success_update'])) {
	    $successMessage = "Updated successfully!";
	    unset($_SESSION['success_update']);
	}
	
	include '../view/myprofile.php';
?>