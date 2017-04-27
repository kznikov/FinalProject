<?php
	function __autoload($className) {
		require_once "../model/".$className.'.php';
	}

	if (isset($_GET['name'])) {

		$name = htmlentities(trim($_GET['name']));

		$userData = new UserDAO();

		$checkUser = $userData->checkUserName($name);

		if ($checkUser == true) {
			echo "<p class=\"error\"> Wrong username. </p>";
		} 

	}

	if (isset($_GET['email'])) {

		$email = htmlentities(trim($_GET['email']));

		$userData = new UserDAO();

		$checkEmail = $userData->checkEmail($email);

		if ($checkEmail == false) {
			echo "<p class=\"error\"> This email already exist. </p>";
		} 

	}

	if (isset($_GET['project'])) {

		$project = htmlentities(trim($_GET['project']));

		$projectData = new ProjectDAO();

		$checkName = $projectData->checkProjectName($project);

		if ($checkName == false) {
			echo "<p class=\"error\"> This project already exist. </p>";
		} 

	}

	if (isset($_GET['prefix'])) {

		$prefix = htmlentities(trim($_GET['prefix']));

		$projectData = new ProjectDAO();

		$checkPrefix = $projectData->checkPrefixName($prefix);

		if ($checkPrefix == false) {
			echo "<p class=\"error\"> This prefix already exist. </p>";
		} 

	}


	if (isset($_POST['id'])) {

		$id = $_POST['id'];

		$delete = new UserDAO();

		$delete->deleteUser($id);

		if ($delete) {
			echo "Record deleted";
		}
		
	}


?>