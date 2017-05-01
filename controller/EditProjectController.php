<?php 


include "../view/inc/autoload.php";
$noMistake = true;

if (isset($_POST['submit'])) {

	try {
		if (isset($_SESSION['name'])) {
			
			$name = $_SESSION['name'];
		}

		$status =  htmlentities(trim($_POST['status']));

		if ($_POST['start_date'] != '' && $_POST['end_date'] != '') {
			if ($_POST['start_date'] <= $_POST['end_date']) {
			  	$startDate = htmlentities(trim($_POST['start_date']));
			  	$endDate = htmlentities(trim($_POST['end_date']));
			} else {
				$noMistake = false;
			    $message = "The start date must be earlier than the end date.";
			}
		} else {
			$startDate = NULL;
			$endDate = NULL;
		}

		if ($noMistake) {
			$projectDAO = new ProjectDAO();
			$projectDAO->updateProject($startDate, $endDate, $status, $name);
			$_SESSION['message'] = "Project successfully updated.";
			$_SESSION['message_class'] = "flash_success";
			header('Location:HomeController.php', true, 302);
		} else {
			$_SESSION['message'] = $message;
			$_SESSION['message_class'] = "flash_error";
			header('Location:ViewEditProjectController.php?project='.$_POST['project_name'], true, 302);
			
		}

	} catch (Exception $e) {
		$_SESSION['error'] = "Failed to update project!";
		header('Location:ErrorController.php', true, 302);
	}


} else {
	header('Location:ErrorController.php', true, 302);
}


 ?>