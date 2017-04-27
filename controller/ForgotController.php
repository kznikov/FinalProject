<?php

	
	require_once "../model/UserDAO.php";
	require_once "../model/IUserDAO.php";
	require_once "../model/DBConnection.php";
	require_once "../model/User.php";
	require_once'../PHPMailer/PHPMailerAutoload.php';
	
	if (isset($_POST['submit'])) {
		

		$token = hash('sha256', time());
		if(UserDAO::forgotPassword($_POST['email'], $token)){

			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'finalittalents@gmail.com';
			$mail->Password = '12345621';
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
	
?>