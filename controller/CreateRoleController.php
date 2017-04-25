<?php

	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	session_start();
	
	$roles = new RoleDAO();
	$result = $roles->getRoles();

	$users = new UserDAO();
	$getuser = $users->selectUser();

	$project = new ProjectDAO();
	$getproject = $project->selectNameProject();

	include '../view/createrole.php';

?>