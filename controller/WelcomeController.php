<?php

	include "../view/inc/autoload.php";
	
try{
	if (isset($_SESSION['user'])){
		$user = json_decode($_SESSION['user'], true);
		include '../view/welcome.php';
	}else{
		include '../view/index.php';
	}
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);
}

?>