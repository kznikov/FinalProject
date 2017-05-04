<?php

	include "../view/inc/autoload.php";
	
	$userId = json_decode($_SESSION['user'],true)['id'];
try{
	if (isset($_POST['submit'])) {
		 try {
		 	$projectName = htmlentities(trim($_POST['project_name']));
		 	$prefix = strtoupper(str_replace(' ', '', htmlentities(trim($_POST['prefix']))));
		 	$description = htmlentities(trim($_POST['description']));
		 	$client = htmlentities(trim($_POST['client_name']));
		 	$startDate = htmlentities(trim($_POST['start_date']));
		 	$endDate = htmlentities(trim($_POST['end_date']));
		 	$status =  htmlentities(trim($_POST['status']));
		 	
		 	if(!empty($projectName) && !empty($prefix) && !empty($status)){
		 		$project = new Project($projectName,$prefix, $userId, null, $description, $client, $startDate,$endDate, $status, null, null, null, null, null);
				
		 		if($endDate != null && $startDate > $endDate){
		 			$message = "The start date must be earlier than the end date.";
		 			$message_class = "flash_error";
		 			include '../view/newproject.php';
		 			die();
		 		}
		 		
			 	//var_dump($project);
				$dao = new ProjectDAO();
				
				$result = $dao->createProject($project);
				
				if(!$result){
					throw new Exception("Failed to create new project!");
				}else{
					$_SESSION['message'] = "Project $projectName successfully created.";
					$_SESSION['message_class'] = "flash_success";
					header('Location:HomeController.php', true, 302);
				}
			}
			
		}catch (Exception $e) {
			$_SESSION['message'] = "Failed to create new project!";
			$_SESSION['message_class'] = "flash_error";
			header('Location:HomeController.php', true, 302);
		}
	}
}catch(PDOException $e){
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);
}
	
	//include '../view/index.php';
?>