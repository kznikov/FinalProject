<?php

	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	
	include_once 'CheckSession.php';
	
	$roles = new RoleDAO();
	$r = $roles->getAllRoles();
	//var_dump($r);
	include '../view/roles.php';



?>