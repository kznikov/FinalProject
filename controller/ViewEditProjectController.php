<?php

	include "../view/inc/autoload.php";
	

	if (isset($_GET['project'])) {
		
		$name = $_GET['project'];

		try {
			$projectDAO = new ProjectDAO();
			$projectInfo = $projectDAO->getInfoProject($name);

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