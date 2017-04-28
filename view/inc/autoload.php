<?php 

	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	
	$sessionVars = json_decode($_SESSION['user'], true);

	if(!isset($_SESSION['user'])){
		header('Location:../view/index.php');
	}


 ?>