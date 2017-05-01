<?php

include "../view/inc/autoload.php";

$user_id = $sessionVars['id'];
$user_email = $sessionVars['email'];

try {
	if(isset($_POST['submit'])){
		$username = htmlentities(trim($_POST['username']));
		$role= htmlentities(trim($_POST['role']));
		if(empty($username))
		
	}
    $projects = new ProjectDAO();
    $allProjects = $projects->getUserAllProjects($user_id);
} catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    header('Location:ErrorController.php', true, 302);
}
include '../view/allprojects.php';
?>