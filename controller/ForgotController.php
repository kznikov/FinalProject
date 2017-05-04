<?php

	require_once "../model/UserDAO.php";
	require_once "../model/IUserDAO.php";
	require_once "../model/DBConnection.php";
	require_once "../model/User.php";
	require_once'../PHPMailer/PHPMailerAutoload.php';
try{
	if (isset($_POST['submit'])) {
		
		/* $userData = new UserDAO();
		$password = $userData->forgotPassword($_POST['email']);  */
		
		$userDAO = new UserDAO();
		$token = hash('sha256', time());
		if($userDAO->forgotPassword($_POST['email'], $token)){
		
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = '';//gmail account
			$mail->Password = ''; //gmail password
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			
			$mail->setFrom('finalittalents@gmail.com', 'admin');
			$mail->addAddress($_POST['email']);
			
			
			$mail->Subject = 'Reset password';
			$mail->Body    = "Reset password link -> http://localhost/FinalProject/view/resetpassword.php?e=".$_POST['email']."&t=$token";
			$mail->AltBody = "Reset password link -> http://localhost/FinalProject/view/resetpassword.php?e=".$_POST['email']."&t=$token";
			
			$mail->send();
			
		}
		$successMessage = true;
		include '../view/forgot.php';
	}
}catch (Exception $e){
	session_start();
	$_SESSION['error'] = $e->getMessage();
	header('Location:ErrorController.php', true, 302);
}

?>