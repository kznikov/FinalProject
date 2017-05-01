<?php
include "../view/inc/autoload.php";


try{
	$sessionVars = json_decode($_SESSION['user'], true);
	
	
	$user_id = $_SESSION['userId'];
	
	$editUser = new UserDAO;
	
	$userInfo = $editUser->getInfoUser($user_id);
	$result = array();
	
	
	if (isset($_POST['submit'])) {
		
		if (isset($_POST['username']) && $_POST['username'] != '') {
			$username = htmlentities(trim($_POST['username']));
		} else {
			$username = $userInfo->username;
		}
		
		if (isset($_POST['password']) && $_POST['password'] != '') {
			$password = hash('sha256', htmlentities(trim($_POST['password'])));
		} else {
			$password = $userInfo->password;
		}
		
		if (isset($_POST['email']) && $_POST['email'] != "") {
			$email = htmlentities(trim($_POST['email']));
		} else {
			$email = $userInfo->email;
		}
		
		if (isset($_POST['firstname']) && $_POST['firstname'] != '') {
			$firstname = htmlentities(trim($_POST['firstname']));
		} else {
			$firstname = $userInfo->firstname;
		}
		
		if (isset($_POST['lastname']) && $_POST['lastname'] != "") {
			$lastname = htmlentities(trim($_POST['lastname']));
		} else {
			$lastname = $userInfo->lastname;
		}
		
		if (isset($_POST['phone']) && $_POST['phone'] != "") {
			$phone = htmlentities(trim($_POST['phone']));
		} else {
			$phone = $userInfo->phone;
		}
		
		if (isset($_POST['mobile']) && $_POST['mobile'] != "") {
			$mobile = htmlentities(trim($_POST['mobile']));
		} else {
			$mobile = $userInfo->mobile;
		}
		$avatar = $userInfo->avatar;
		if (!empty($_FILES)) {
			$an_image = preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $_FILES['image']['name']);
			if ($an_image) {
				
				try {
					$max = 500 * 1024;
					$destination = '../view/uploaded/';
					$upload = new UploadFile($destination);
					$upload->setMaxSize($max);
					//$upload->allowAllTypes('jira');
					$avatar = $upload->upload();
					
					$saveImage = new UserDAO();
					$saveImage->saveImage($avatar, $user_id);
					$result= $upload->getMessages();
					
					if(!$avatar){
						$avatar = $userInfo->avatar;
					}
					
				} catch (Exception $e) {
					$result[] = $e->getMessage();
					header("Location: editProfileController.php");
				}
			} else {
				$result[] =' This is not permitted type of file.';
				header("Location: editProfileController.php");
			}
			
		}else{
			$avatar = $userInfo->avatar;
		}
		
		$updateUser = new UserDAO;
		$sessionVars['avatar'] = $avatar;
		$_SESSION['user'] = json_encode($sessionVars);
		//,$phone, $mobile,
		$user = new User($username, $password, $firstname, $lastname, $email, $userInfo->firstLogin,
				$phone, $mobile, $avatar, $user_id);
		$updateUser->updateUser($user);
		
		$_SESSION['success_update'] = true;
		
		
		//include '../controller/editProfileController.php';
		if ($sessionVars['id'] == $user_id) {
			header("Location: MyProfileController.php");
		} else {
			header("Location: UserListController.php");
		}
	}
}catch (Exception $e){
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);
}
?>