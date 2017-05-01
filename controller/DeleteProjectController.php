<?php 

	include "../view/inc/autoload.php";

	if (isset($_POST['projectId']) && isset($_SESSION['user'])) {

		$projectId = htmlentities(trim($_POST['projectId']));
		try {

		    $projectDAO = new ProjectDAO();
		    $delProjects = $projectDAO->delProject($projectId);
		    echo "The project was deleted.";

		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
			header('Location:ErrorController.php', true, 302);
		}
		
	}






 ?>