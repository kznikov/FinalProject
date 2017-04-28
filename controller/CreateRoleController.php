<?php
	include "../view/inc/autoload.php";

	try{
		
		$roles = new RoleDAO();
		$result = $roles->getRoles();
		
		$users = new UserDAO();
		$getuser = $users->selectUser();
		
		$project = new ProjectDAO();
		$getproject = $project->selectNameProject();
		
		include '../view/createrole.php';
	}catch (Exception $e){
		$_SESSION['error'] = $e->getMessage();
		header('Location:ErrorController.php', true, 302);
	}
?>