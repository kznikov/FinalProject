<?php

include "../view/inc/autoload.php";

if ($_SESSION['user']){
	
	$user = json_decode($_SESSION['user'], true);
	$user_id = $user['id'];
	$max = 500 * 1024;
	$result = array();
	
	if (isset($_POST['upload'])) {
	
		$destination ='../view/uploaded/';

		if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/gif") {
				try {
		
				$upload = new UploadFile($destination);
				$upload->setMaxSize($max);
				//$upload->allowAllTypes('jira');
				//
				$imageName = $upload->upload();
				$saveImage = new UserDAO();
				$saveImage->saveImage($imageName, $user_id);

				$userData = new UserDAO(); //show image
				$result = $userData->getInfoUser($user_id);
				$image = $result->avatar;
				
				$result= $upload->getMessages();
				include '../view/welcome.php';
				
			} catch (Exception $e) {
				$result[] = $e->getMessage();
				include '../view/welcome.php';
				//header('Location:../views/form.php', true, 302);
			}
		} else {
			$result[] =' This is not permitted type of file.';
			include '../view/welcome.php';
		}
		
	} 
}

?>