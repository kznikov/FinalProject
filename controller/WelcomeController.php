<?php

	include_once 'CheckSession.php';
	
	if (isset($_SESSION['user'])){
		$user = json_decode($_SESSION['user'], true);
		include '../view/welcome.php';
	}else{
		include '../view/index.php';
	}

?>