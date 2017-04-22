<?php
	session_start();
	
	if ($_SESSION['user']){
		$user = json_decode($_SESSION['user'], true);
		include '../view/welcome.php';
	}
	
	
	
?>