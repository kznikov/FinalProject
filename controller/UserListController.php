<?php 

	include "../view/inc/autoload.php";
	
try{
		$sessionVars = json_decode($_SESSION['user'], true);
		$user_id = $sessionVars['id'];
		
		$infoUser = new UserDAO;
		
		$result = $infoUser->selectUser();
		
		if (isset($_SESSION['success_update'])) {
			$successMessage = "Updated successfully!";
			unset($_SESSION['success_update']);
		}
		
		include '../view/userlist.php';
	
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);
}




?>