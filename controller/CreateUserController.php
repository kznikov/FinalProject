<?php

session_start();

function __autoload($className) {
	require_once "../model/" . $className . '.php';	
}

if(!isset($_SESSION['user'])){
		header('Location:../view/index.php');
	}

$sessionVars = json_decode($_SESSION['user'], true);

include '../view/createuser.php';

?>