<?php

	include "../view/inc/autoload.php";
	
	$sessionVars = json_decode($_SESSION['user'], true);
	
	$user_email = $sessionVars['email'];
	$userId = $sessionVars['id'];

	if (isset($_GET['project'])) {
		
		$name = $_GET['project'];

		try {
			$userDao = new UserDAO();
			$projectDAO = new ProjectDAO();
			$projectInfo = $projectDAO->getInfoProject($name);
			$userRole = $userDao->getUserProjectRole($userId, $projectInfo->id);
			if(!$userRole){	
				$_SESSION['error'] = "You do not have access rights to this page!";
				header('Location:ErrorController.php', true, 302);
			}
			
			if(!$projectInfo->name){
				include '../view/pageNotFound.php';
				die();
			}

			$_SESSION['name'] = $name;
			include '../view/editproject.php';

		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
			header('Location:ErrorController.php', true, 302);
		}

	}else{
		header('Location:../view/pageNotFound.php', true, 302);
	}

	

?>