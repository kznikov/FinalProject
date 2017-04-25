<?php

	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	session_start();
	
	$roles = new RoleDAO();
	$r = $roles->getAllRoles();
	//var_dump($r);
	include '../view/createtask.php';



?>