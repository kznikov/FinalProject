<?php

include "../view/inc/autoload.php";


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
?>