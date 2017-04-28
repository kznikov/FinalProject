<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

try {
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
				$user = new User($username, $password, $firstname, $lastname, $email);
				
				$registerUser = $userData->registerUser($user);
				
				$message = "Successfully registered!";
				$class = "flash_register_success";
				include '../view/index.php';
				//header('Location: WelcomeController.php', true, 302);
			
		}else{
			$message = "Unsuccessful registration!";
			$class = "flash_register_error";
			include '../view/index.php';
		}
	}
}catch (PDOException $e) {
	session_start();
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);

}catch (Exception $e) {
	$message = $e->getMessage();
	$class = "flash_register_error";
	include '../view/index.php';
} 
	//include '../view/register.php';

?>