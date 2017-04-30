<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['user']) ) {
	$dao = new UserDAO();
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	$dao->removeOnlineUser($user_id);
    session_destroy();
    unset($_SESSION['user']);
    
   

    include '../view/index.php';
} else {
    include '../view/index.php';
}
?>