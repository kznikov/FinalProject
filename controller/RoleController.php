<?php

	include "../view/inc/autoload.php";
	
	$roles = new RoleDAO();
	$r = $roles->getAllRoles();
	//var_dump($r);
	include '../view/roles.php';



?>