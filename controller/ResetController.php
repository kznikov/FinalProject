<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

try{
	$userDAO = new UserDAO();
	
	if (isset($_POST['submit']) && !empty($_POST['password']) && !empty($_POST['repassword']) && $_POST['password'] === $_POST['repassword']) {
	    //echo UserDAO::resetPassword($_POST['e'], $_POST['t'], $_POST['password']);
		if ($userDAO->resetPassword($_POST['e'], $_POST['t'], $_POST['password'])) {
	        $successMessage = true;
	        include '../view/resetpassword.php';
	    } else {
	        $successMessage = false;
	        include '../view/resetpassword.php';
	    }
	}
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);
}
?>