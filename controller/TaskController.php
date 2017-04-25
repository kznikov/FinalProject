<?php

	function __autoload($className) {
		require_once "../model/" . $className . '.php';	
	}
	
	session_start();
	$userId = json_decode($_SESSION['user'],true)['id'];
		
	if (isset($_POST['submit'])) {
		 try {
		 	$project = htmlentities(trim($_POST['project']));
		 	$title = htmlentities(trim($_POST['title']));
		 	$owner = htmlentities(trim($_POST['owner']));
		 	$description = htmlentities(trim($_POST['description']));
		 	$type = htmlentities(trim($_POST['type']));
		 	$priority = htmlentities(trim($_POST['priority']));
		 	$title = htmlentities(trim($_POST['status']));
		 	$porgress =  htmlentities(trim($_POST['progress']));
		 	$startdate = htmlentities(trim($_POST['start_date']));
		 	$endDate = htmlentities(trim($_POST['end_date']));
		 	
		 	if(!empty($project) && !empty($title) && !empty($owner)){

			 	$project = new Project($projectName,$prefix, $userId, null, $description, $client, $startDate,$endDate, $status);

			 	//var_dump($project);
				$projectData = new ProjectDAO();
				
				$result = $projectData->createProject($project);
				
				if(!$result){
					throw new Exception("Failed to create new project!");
				}else{
					$message = "Project $projectName successfully created.";
					$class = "flash_success";
					include '../view/homepage.php';
				}
			}
			
			
		}catch (Exception $e) {

			$message = $e->getMessage();
			//$row = $e->getLine(); 
			$class = "flash_error";
			include '../view/homepage.php';
		}
	}else{
		$message = "Failed to create new project!";
		$class = "flash_error";
		include '../view/homepage.php';
	}
	
	//include '../view/index.php';
?>