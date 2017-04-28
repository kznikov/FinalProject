<?php

	include "../view/inc/autoload.php";
	try{
		$roles = new RoleDAO();
		$r = $roles->getAllRoles();
		//var_dump($r);
		include '../view/roles.php';
	}catch (Exception $e){
		$_SESSION['error'] = $e->getMessage();
		header('Location:ErrorController.php', true, 302);
	}


?>