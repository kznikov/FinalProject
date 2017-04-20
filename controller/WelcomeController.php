<?php
	session_start();
	
	if ($_SESSION['user']){
		$user = json_decode($_SESSION['user']);
		include '../view/welcome.php';
	}
	
	
	
?>