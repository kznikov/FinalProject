<?php
	function __autoload($className) {
		require_once "../model/".$className.'.php';
	}

	if (isset($_GET['name'])) {

		$name = htmlentities($_GET['name']);

		$userData = new UserDAO();

		$checkUser = $userData->checkUserName($name);

		if ($checkUser == false) {
			echo "<p class=\"error\"> The username is busy </p>";
		} 

	}
?>