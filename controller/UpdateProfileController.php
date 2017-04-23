<?php

	
	function __autoload($className) {
		require_once "../model/" . $className . '.php';	
	}

	session_start();
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];

	$editUser = new UserDAO;

	$userInfo = $editUser->getInfoUser($user_id);


	if (isset($_POST['submit'])) {

		if (isset($_POST['username']) && $_POST['username'] != '') {
			$username = htmlentities(trim($_POST['username']));
		} else {
			$username = $userInfo['username'];
		}

		if (isset($_POST['password']) && $_POST['password'] != '') {
			$password = htmlentities(trim($_POST['password']));	
		} else {
			$password = $userInfo['password'];
		}
		
		if (isset($_POST['email']) && $_POST['email'] != "") {
			$email = htmlentities(trim($_POST['email']));
		} else {
			$email = $userInfo['email'];
		}

		if (isset($_POST['firstname']) && $_POST['firstname'] !='') {
			$firstname = htmlentities(trim($_POST['firstname']));
		} else {
			$firstname = $userInfo['firstname'];
		}

		if (isset($_POST['lastname']) && $_POST['lastname'] != "") {
			$lastname = htmlentities(trim($_POST['lastname']));
		} else {
			$lastname = $userInfo['lastname'];
		}

		if (isset($_POST['phone']) && $_POST['phone'] != "") {
			$phone = htmlentities(trim($_POST['phone']));
		} else {
			$phone = $userInfo['phone'];
		}

		if (isset($_POST['mobile']) && $_POST['mobile'] != "") {
			$mobile = htmlentities(trim($_POST['mobile']));
		} else {
			$mobile = $userInfo['mobile'];
		}

		$updateUser = new UserDAO;

		$updateUser->updateUser($username, $password, $firstname, $lastname, $email, $phone, $mobile, $user_id );

		$_SESSION['success_update'] = true;


		//include '../controller/editProfileController.php';
		header("Location: MyProfileController.php");

	}

	
















 ?>