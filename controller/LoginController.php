<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}



if (isset($_POST['submit'])) {
    try {
        $user = new User(htmlentities(trim($_POST['username'])), htmlentities(trim($_POST['password'])));

        $userData = new UserDAO();

        $loggedUser = $userData->loginUser($user);
        session_start();
        $_SESSION['user'] = json_encode($loggedUser);


        $sessionVars = json_decode($_SESSION['user'], true);
        $user_id = $sessionVars['id'];



        if ($sessionVars['firstLogin']) {
            header('Location:WelcomeController.php', true, 302);
        } else {
            header('Location:HomeController.php', true, 302);
        }
    } catch (Exception $e) {
        $errorMessage = true;
        include '../view/index.php';
    }
}

//include '../view/index.php';
?>