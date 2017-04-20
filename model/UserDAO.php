<?php
require_once "../model/IUserDAO.php";
	class UserDAO implements IUserDAO {
		
		const GET_AND_CHECK_USER_SQL = "SELECT * FROM users WHERE username = ? AND password = ?";
		const CHECK_IF_USER_EXIST = "SELECT username, id FROM users WHERE username = ?";
		const REGISTER_NEW_USER_SQL = "INSERT INTO users (username, password, firstname, lastname, email, created) 
																					VALUES (?, ?, ?, ?, ?, NOW())";
		const UPDATE_TOKEN = "UPDATE users SET token = ? WHERE email LIKE ?";
		const RESET_PASSWORD = "UPDATE users SET password = ? WHERE email LIKE ? AND token LIKE ?";
		
		
		
		public function loginUser(User $user) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::GET_AND_CHECK_USER_SQL);
			$pstmt->execute(array($user->username,  hash('sha256',$user->password)));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			if (count($res) === 0)
				throw new Exception("Try again!");
			
			$user = $res[0];
			
			return new User($user['username'], 'p', $user['firstname'], $user['lastname'], $user['email'], $user['id']);
		}

		public function checkUserName($username) {
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
			
			return $pstmt->execute(array($token, $email));
		}
		
		
		public static function resetPassword($email, $token, $pass) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::RESET_PASSWORD);
			
			return $pstmt->execute(array(hash('sha256', $pass), $email, $token));
		}
		
		
	}
?>