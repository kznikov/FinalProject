<?php

	include "../view/inc/autoload.php";
	$sessionVars = json_decode($_SESSION['user'], true);
	
	include '../view/createuser.php';
?>