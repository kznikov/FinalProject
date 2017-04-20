<?php
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
		
	} 
	
	
	if (isset($_POST['submit']) && !empty($_POST['password']) && !empty($_POST['repassword']) && $_POST['password'] === $_POST['repassword']){
		
		if(UserDAO::resetPassword($_POST['e'], $_POST['t'], $_POST['password'])){
			$successMessage = true;
			include '../view/resetpassword.php';
		}
		
		
	}
	
?>