<?php

	
	
/* 	function __autoload($className) {
		require_once "../model/" . $className . '.php';
		
	} */
	
	require_once "../model/UserDAO.php";
	require_once "../model/IUserDAO.php";
	require_once "../model/DBConnection.php";
	require_once "../model/User.php";
	require_once'../PHPMailer/PHPMailerAutoload.php';
	
	if (isset($_POST['submit'])) {
		
		$userData = new UserDAO();
		$password = $userData->forgotPassword($_POST['email']);               
		
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

		
		$mail->Subject = 'Forgot password';
		$mail->Body    = 'Your password is '.$password;
		$mail->AltBody = 'Your password is '.$password;
		
		if($mail->send()) {
			$successMessage = true;
			include '../view/forgot.php';
		} else {
			include '../view/forgot.php';
		}
	}
	
?>