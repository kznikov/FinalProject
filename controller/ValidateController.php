<?php
	function __autoload($className) {
		require_once "../model/".$className.'.php';
	}

	if (isset($_GET['name'])) {

		$name = htmlentities($_GET['name']);

		$userData = new UserDAO();

		$checkUser = $userData->checkUserName($name);

		if ($checkUser == false) {
			echo "<p class=\"error\"> This username already exist. </p>";
		} 

	}

	if (isset($_GET['email'])) {

		$email = htmlentities($_GET['email']);

		$userData = new UserDAO();

		$checkEmail = $userData->checkEmail($email);

		if ($checkEmail == false) {
			echo "<p class=\"error\"> This email already exist. </p>";
		} 

	}


?>