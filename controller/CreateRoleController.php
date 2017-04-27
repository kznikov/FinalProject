<?php

	include_once 'CheckSession.php';
	include "../view/inc/autoload.php";

	$roles = new RoleDAO();
	$result = $roles->getRoles();
	
	$users = new UserDAO();
	$getuser = $users->selectUser();
	
	$project = new ProjectDAO();
	$getproject = $project->selectNameProject();
	
	include '../view/createrole.php';
?>