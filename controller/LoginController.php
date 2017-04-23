<?php
	function __autoload($className) {
		require_once "../model/" . $className . '.php';	
	}
		
	if (isset($_POST['submit'])) {
		 try {
			$user = new User(htmlentities(trim($_POST['username'])),
							htmlentities(trim($_POST['password'])));
			
			$userData = new UserDAO();
			
			$loggedUser = $userData->loginUser($user);
			
			session_start();
			$_SESSION['user'] = json_encode($loggedUser);
			//echo "<br/>";
			//var_dump($loggedUser);
			//var_dump($_SESSION['user']);
			 $sessionVars = json_decode($_SESSION['user'], true);
			 //var_dump($sessionVars);
			// echo $sessionVars['firstLogin'];
			 if($sessionVars['firstLogin']){
				header('Location:WelcomeController.php', true, 302);
			}else{
				header('Location:HomeController.php', true, 302);
			}   
			
		}
		catch (Exception $e) {
			$errorMessage = true;
			include '../view/index.php';
		}  
	}
	
	//include '../view/index.php';
?>