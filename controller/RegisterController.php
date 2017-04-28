<?php

	include "../view/inc/autoload.php";
	
	if (isset($_POST['submit'])) {
		$firstname = htmlentities(trim($_POST['firstname']));
		$lastname = htmlentities(trim($_POST['lastname']));
		$email = htmlentities(trim($_POST['email']));
		$username = htmlentities(trim($_POST['username']));
		$password = htmlentities(trim($_POST['password']));
		$repassword = htmlentities(trim($_POST['repassword']));
		
		$userData = new UserDAO();
		
		if(!empty($firstname) && $userData->checkUserName($username) && $userData->checkEmail($email) && !empty($lastname) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($username) 
				&& !empty($password) && $password === $repassword){
			try {
				$user = new User($username, $password, $firstname, $lastname, $email);
		
				
				
				$registerUser = $userData->registerUser($user);
				
				//var_dump($registerUser);
				
				session_start();
				$_SESSION['user'] = json_encode($registerUser);
				//var_dump($_SESSION['user']);
				$message = "Successfully registered!";
				$class = "flash_register_success";
				include '../view/index.php';
				//header('Location: WelcomeController.php', true, 302);
			 }
			catch (Exception $e) {
				$message = $e->getMessage();
				$class = "flash_register_error";
				include '../view/index.php';
			} 
		}else{
			$message = "Unsuccessful registration!";
			$class = "flash_register_error";
			include '../view/index.php';
		}
	}
	//include '../view/register.php';

?>