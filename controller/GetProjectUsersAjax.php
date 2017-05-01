<?php 

include "../view/inc/autoload.php";

if(isset($_SESSION['user'])){
	try{
		if($_SERVER ['REQUEST_METHOD'] === 'GET'){
			$userDao = new UserDAO();
			$projectDao = new ProjectDAO();
			$projectName = $projectDao->getProjectName($_GET['project']);
			$users = $userDao->getProjectAssocUsers($projectName['name']);
			echo json_encode($users);
		}
	}catch (Exception $e){
		$_SESSION['error'] = $e->getMessage();
		header('Location:ErrorController.php', true, 302);
	}
}else{
	http_response_code ( 401 );
	echo '{"error": "Please try again later!"}';
}

?>