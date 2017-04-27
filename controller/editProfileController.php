<?php

include "../view/inc/autoload.php";

if (isset($_GET['user'])) {

    $user_id = $_GET['user'];
} else {

    $user_id = $sessionVars['id'];
}

$editUser = new UserDAO;
$result = $editUser->getInfoUser($user_id);
$_SESSION['userId'] = $user_id;

include '../view/editProfile.php';
?>