<?php
	
	session_start();
	
	//if ($_SESSION['user']) {
		session_destroy();
		unset($_SESSION['user']);
		
		include '../view/index.php';
	//}


?>