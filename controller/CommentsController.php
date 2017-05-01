<?php 
include "../view/inc/autoload.php";
	
	$userId = json_decode($_SESSION['user'],true)['id'];
	$userId = (int)($userId);
	
	$tasksDao = new TaskDAO();
	$allTasks = $tasksDao->getUserAllTasks($userId);
	if($_SERVER ['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		 try {

		 	$projectId = htmlentities(trim($_POST['project']));
		 	$title = htmlentities(trim($_POST['title']));
		 	$ownerId = htmlentities(trim($_POST['owner']));
		 	$description = htmlentities(trim($_POST['description']));
		 	$type = htmlentities(trim($_POST['type']));
		 	$priority = htmlentities(trim($_POST['priority']));
		 	$status = htmlentities(trim($_POST['status']));
		 	$progress =  htmlentities(trim($_POST['progress']));
		 	$startDate = htmlentities(trim($_POST['start_date']));
		 	$endDate = htmlentities(trim($_POST['end_date']));
		 	
		 	if(!empty($projectId) && !empty($title) && !empty($ownerId)){
				
		 		$task = new Task($title, $projectId, $userId, $ownerId, $type, $priority, $status, $progress,
		 				$description, $startDate, $endDate, $id = null, $projectName = null, $prefixId = null, $ownerUsername = null);

			 	//var_dump($task);
				$taskData = new TaskDAO();
				
				$result = $taskData->createTask($task);
				
				 if(!$result){
					throw new Exception("Failed to create new task!");
				}else{
					$message = "Task $title successfully created.";
					$class = "flash_success";
					include '../view/alltasks.php';
				} 
			}else{
				$message = "Failed to create new task!";
				$class = "flash_error";
				include '../view/alltasks.php';
			}
			
		}catch (Exception $e) {

			$message = $e->getMessage();
			//$row = $e->getLine(); 
			$class = "flash_error";
			include '../view/alltasks.php';
		}
?>