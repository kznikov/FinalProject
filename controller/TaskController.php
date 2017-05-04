<?php

try{
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

		 		
		 		
		 		if($startDate > $endDate){
		 			$message = "The start date must be earlier than the end date.";
		 			$message_class = "flash_error";
		 			include '../view/createtask.php';
		 			die();
		 		}
		 		
		 		
			 	//var_dump($task);
				$taskData = new TaskDAO();
				
				$result = $taskData->createTask($task);
				
				 if(!$result){
					throw new Exception("Failed to create new task!");
				}else{
					$_SESSION['message'] = "Task $title successfully created.";
					$_SESSION['message_class'] = "flash_success";
					header('Location: UserAssignTasksController.php', true, 302);
				} 
			}else{
				$_SESSION['message'] = "Failed to create new task!";
				$_SESSION['message_class'] = "flash_error";
				header('Location: UserAssignTasksController.php', true, 302);
			}
			
		}catch (Exception $e) {
			$message = $e->getMessage();
			$class = "flash_error";
			include '../view/alltasks.php';
		}
	}elseif($_SERVER ['REQUEST_METHOD'] === 'DELETE' && isset($_SESSION['user'])){
		$id = explode('=',file_get_contents('php://input'))[1];	
		$allTasks = explode('=',file_get_contents('php://input'))[2];
		
		$deleteDao = new TaskDAO();
		
		$deleted = $deleteDao->deleteTask($id);
		
		$tasksData = new TaskDAO();
		if($allTasks == 2){
			echo "Task was successfully deleted!";
			die();
		}
		if($allTasks == 1){
			$tasks =  $tasksData->getUserAllTasks($userId);
		}else{
			$tasks =  $tasksData->getUserAssignTasks($userId);
		}
		$tbody = "";
		if (isset($tasks) && $tasks) {
			foreach ($tasks as $task) {
                           $tbody .= "<tr class='myproject-name' onclick='location.href = \"../controller/ViewTaskController.php?name=".$task->id."\";'>";
	                           $tbody .= "<td>".$task->prefixId."</td>";
	                           $tbody .= "<td>".$task->title."</td>";
	                           $tbody .= "<td><a title='".$task->ownerUsername."'><span onclick=\"viewUser(".$task->ownerId.")\">".$task->ownerUsername."</span></a></td>";
	                           $tbody .= "<td><img style='width: 20px; margin-right: 5px;' src='../view/images/type_".$task->type.".png'>".$task->type."</td>";
	                           $tbody .= "<td>".(!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->startDate)))."</td>";
	                           $tbody .= "<td>".(!strtotime($task->endDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->endDate)))."</td>";
	                           $tbody .= "<td>".$task->status."</td>";
	                           $tbody .= "<td>".$task->priority."<img style='width: 30px; margin-left: 0px;' src='../view/images/priority_".$task->priority.".png'></td>";
	                           $tbody .= "<td><div class='progress-wrap progress' style='background-color:orange;' data-progress-percent='".$task->progress."'>";
	                           		$tbody .= "<div class='progress-bar progress'></div>";	  
	                           		$tbody .= "</div>";
                          			$tbody .= "<p class='progress_perc'>".$task->progress."%</p>";
                           	   $tbody .= "</td>";
                          	   $tbody .= "<td><a href='#' title='".$task->projectName."'><span onclick='viewProject('".$task->projectName."')'>".$task->projectName."</span></a></td>";
                          	   $tbody .= "<td class='text-center'>";
                          	   $tbody .= "<a href='#'><span class='glyphicon glyphicon-eye-open' title='View'></span></a>";
                          	   $tbody .= "<a href='#'><span class='glyphicon glyphicon-cog' title='Edit'></span></a>";
                          	   $tbody .= "<a href='#'><span class='glyphicon glyphicon-trash' title='Delete'  onclick='deleteTask(".$task->id.", ".$allTasks.")'></span></a>";
                          	   $tbody .= "</td>";
                          	   $tbody .= "</tr>";
			}
			echo $tbody;
		}else{
			$tbody .= "<tr>";
			$tbody .= "<td colspan='11' style='text-align: center;'><em><strong>No results found.</strong></em></td>";
			$tbody .= "</tr>";
			echo $tbody;
		}
	}else{
		echo "<p style='color:red'>Error</p>";
	}
}catch (ErrorException $e){
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);
}
?>