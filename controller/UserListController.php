<?php

include "../view/inc/autoload.php";

$user_id = $sessionVars['id'];

$infoUser = new UserDAO;

$result = $infoUser->selectUser();

if (isset($_SESSION['success_update'])) {
    $successMessage = "Updated successfully!";
    unset($_SESSION['success_update']);
}

include '../view/userlist.php';
?>