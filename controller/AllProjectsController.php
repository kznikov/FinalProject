<?php

include "../view/inc/autoload.php";

$user_id = $sessionVars['id'];
$user_email = $sessionVars['email'];
try {
    $projects = new ProjectDAO();
    $allProjects = $projects->getUserAllProjects($user_id);
} catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    header('Location:ErrorController.php', true, 302);
}
include '../view/allprojects.php';
?>