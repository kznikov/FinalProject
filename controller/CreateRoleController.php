<?php

	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	
	include_once 'CheckSession.php';
	
	$roles = new RoleDAO();
	$result = $roles->getRoles();

	$users = new UserDAO();
	$getuser = $users->selectUser();

	$project = new ProjectDAO();
	$getproject = $project->selectNameProject();

	include '../view/createrole.php';

?>