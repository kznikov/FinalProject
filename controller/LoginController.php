<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();
if(isset($_SESSION['user'])){
	header('Location: ../controller/HomeController.php', true, 302);
	exit;
}



if (isset($_POST['submit'])) {
    try {
    	$userData = new UserDAO();
    	$user = new User(htmlentities(trim($_POST['username'])), htmlentities(trim($_POST['password'])));
		$loggedUser = $userData->loginUser($user);
        
        $_SESSION['user'] = json_encode($loggedUser);
		$sessionVars = json_decode($_SESSION['user'], true);
        $user_id = $sessionVars['id'];

        $userData->addNewOnlineUser($user_id, $user->username);	

        if ($sessionVars['firstLogin']) {
            header('Location:WelcomeController.php', true, 302);
        } else {
            header('Location:HomeController.php', true, 302);
        }
    }catch (Exception $e) {
    	$errorMessage = true;
    	include '../view/index.php';
    }catch (PDOException $e) {
    	session_start();
    	$_SESSION['error'] = $e->getMessage();
      	header('Location:ErrorController.php', true, 302);
    } 
}

//include '../view/index.php';
?>