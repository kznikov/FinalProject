<?php

include "../view/inc/autoload.php";

if ($_SESSION['user']){
	
	$user = json_decode($_SESSION['user'], true);
	$user_id = $user['id'];
	$max = 500 * 1024;
	$result = array();
	
	if (isset($_POST['upload'])) {
	
		$destination ='../view/uploaded/';
		try {
	
			$upload = new UploadFile($destination);
			$upload->setMaxSize($max);
			//$upload->allowAllTypes('jira');
			$imageName = $upload->upload();
			
			$saveImage = new UserDAO();
			$saveImage->saveImage($imageName, $user_id);

			$userData = new UserDAO();
			$result = $userData->getInfoUser($user_id);
			$image = $result->avatar;
			
			$result= $upload->getMessages();
			include '../view/welcome.php';
			
		} catch (Exception $e) {
			$result[] = $e->getMessage();
			include '../view/welcome.php';
			//header('Location:../views/form.php', true, 302);
		}
	} 
}

?>