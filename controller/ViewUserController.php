<?php


include "../view/inc/autoload.php";

try{
	$sessionVars = json_decode($_SESSION['user'], true);
	if (isset($_GET['user'])) {
	
	    $user_id = $_GET['user'];
	
	    $editUser = new UserDAO;
	
	    $result = $editUser->getInfoUser($user_id);
	    if (!empty($result) && is_numeric($user_id)) {
	        include '../view/userprofile.php';
	    } else {
	        include '../view/pageNotFound.php';
	    }
	}else{
		header('Location:UserListController.php', true, 302);
	}
	
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);
}
?>