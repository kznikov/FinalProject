<?php
	function __autoload($className) {
		require_once "../model/" . $className . '.php';
	}
	
	if (isset($_POST['submit'])) {
		$firstname = htmlentities(trim($_POST['firstname']));
		$lastname = htmlentities(trim($_POST['lastname']));
		$email = htmlentities(trim($_POST['email']));
		$username = htmlentities(trim($_POST['username']));
		$password = htmlentities(trim($_POST['password']));
		$repassword = htmlentities(trim($_POST['repassword']));
		
		if(!empty($firstname) && !empty($lastname) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($username) 
				&& !empty($password) && $password === $repassword && UserDAO::checkEmail($email) && UserDAO::checkUserName($username)){
			try {
				$user = new User($username, $password, $firstname, $lastname, $email);
		
				$userData = new UserDAO();
				
				$registerUser = $userData->registerUser($user);
				
				//var_dump($registerUser);
				
				session_start();
				$_SESSION['user'] = json_encode($registerUser);
				//var_dump($_SESSION['user']);
				$successMessage = true;
				include '../view/index.php';
				//header('Location: WelcomeController.php', true, 302);
			 }
			catch (Exception $e) {
				$errorMessage = true;
			} 
		}
	}
	//include '../view/register.php';
?>