<?php


include "../view/inc/autoload.php";

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
}
?>