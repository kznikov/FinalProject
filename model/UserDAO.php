<?php
require_once "../model/IUserDAO.php";
	class UserDAO implements IUserDAO {
		
		const GET_AND_CHECK_USER_SQL = "SELECT * FROM users WHERE username = ? AND password = ?";

		const CHECK_IF_USER_EXIST = "SELECT username, id FROM users WHERE username = ?";
		
		const CHECK_IF_EMAIL_EXIST = "SELECT username, id FROM users WHERE email = ?";

		const REGISTER_NEW_USER_SQL = "INSERT INTO users (username, password, firstname, lastname, email, created) 
																					VALUES (?, ?, ?, ?, ?, NOW())";
		const UPDATE_TOKEN = "UPDATE users SET token = ? WHERE email LIKE ?";
		const RESET_PASSWORD = "UPDATE users SET password = ? WHERE email LIKE ? AND token LIKE ?";
		
		const UPDATE_LOGIN = "UPDATE users SET first_login = 1 WHERE id = ?";
		
		const SAVE_IMAGE = "UPDATE `users` SET `avatar`= ? WHERE id= ?";
		
		
		
		public function loginUser(User $user) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::GET_AND_CHECK_USER_SQL);
			$pstmt->execute(array($user->username,  hash('sha256',$user->password)));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			if (count($res) === 0)
				throw new Exception("Try again!");
			
			$user = $res[0];
			
			if(!$user['first_login']){
				$firstlogin = true;
				$pstmt = $db->prepare(self::UPDATE_LOGIN);
				$pstmt->execute(array($user['id']));
			}else{
				$firstlogin = false;
			}
			
			return new User($user['username'], 'p', $user['firstname'], $user['lastname'], $user['email'], $firstlogin, $user['id']);
		}

		public static function checkUserName($username) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::CHECK_IF_USER_EXIST);
			$pstmt->execute(array($username));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);

			if (count($res) === 0) {
				return true;
			} else {
				return false;
			}
			
		}

		public static function checkEmail($email) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::CHECK_IF_EMAIL_EXIST);
			$pstmt->execute(array($email));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);

			if (count($res) === 0) {
				return true;
			} else {
				return false;
			}
			
		}
		
		public function registerUser(User $user) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::REGISTER_NEW_USER_SQL);

			
			if ( $pstmt->execute(array($user->username, hash('sha256',$user->password),
													$user->firstname, $user->lastname, $user->email))){
				$user->__set('id', $db->lastInsertId());
				return $user;
				
			}else{
				throw new Exception("Unsuccessful registration!");
			}
			
		}
		
		
		
		public static function forgotPassword($email, $token) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::UPDATE_TOKEN);
			if(!self::checkEmail($email)){
				return $pstmt->execute(array($token, $email));
			}
			return false;
		}
		
		
		public static function resetPassword($email, $token, $pass) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::RESET_PASSWORD);
			
			 $pstmt->execute(array(hash('sha256', $pass), $email, $token));
			 return $pstmt->rowCount();
		}
		
		
	}
	
	
	
?>