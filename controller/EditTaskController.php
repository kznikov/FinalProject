<?php 
include "../view/inc/autoload.php";
$noMistake = true;


if ($_SERVER ['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

	try {
		
	
		if (isset($_SESSION['name'])) {
			$name = $_SESSION['name'];	
		}

		$taskDao = new TaskDAO();
		$task = $taskDao->getTask($name);

		if (isset($_POST['title']) && $_POST['title'] != "") {
			$title = htmlentities(trim($_POST['title']));
		} else {
			$title = $task->title;
		}

		if (isset($_POST['description']) && $_POST['description'] != "") {
			$description = htmlentities(trim($_POST['description']));
		} else {
			$description = $task->description;
		}
		
		if (isset($_POST['progress']) && $_POST['progress'] != "") {
			$progress= htmlentities(trim($_POST['progress']));
		} else {
			$progress = $task->progress;
		}

		$type = htmlentities(trim($_POST['type']));
	 	$priority = htmlentities(trim($_POST['priority']));
	 	$status = htmlentities(trim($_POST['status']));

		if ($_POST['start_date'] != '' && $_POST['end_date'] != '') {
			if ($_POST['start_date'] <= $_POST['end_date']) {
			  	$startDate = htmlentities(trim($_POST['start_date']));
			  	$endDate = htmlentities(trim($_POST['end_date']));
			} else {
				$noMistake = false;
			    $messages = "The start date must be earlier than the end date.";
			}
		} else {
			$startDate = NULL;
			$endDate = NULL;
		}

		if ($noMistake) {

			$taskUpdate = new TaskDAO();
			$task = $taskUpdate->updateTask($title,$description, $progress ,$startDate,$endDate, $type, $status, $priority, $name);
			$_SESSION['message'] = "Task successfully updated.";
			$_SESSION['message_class'] = "flash_success";
			header('Location:UserAssignTasksController.php', true, 302);

		} else {
			$_SESSION['message'] = $messages;
			$_SESSION['message_class'] = "flash_error";
			header('Location:ViewEditTaskController.php?name='.$_POST['task_id'], true, 302);
		}

	} catch (Exception $e) {
		$_SESSION['error'] = "Failed to update task!";
		echo $e->getLine();
		echo $e->getFile();
		//header('Location:ErrorController.php', true, 302);
	}
	
} else {
	header('Location:ErrorController.php', true, 302);
}

















 ?>