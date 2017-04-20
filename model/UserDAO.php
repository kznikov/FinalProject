<?php
require_once "../model/IUserDAO.php";
	class UserDAO implements IUserDAO {
		
		const GET_AND_CHECK_USER_SQL = "SELECT * FROM users WHERE username = ? AND password = ?";
		const CHECK_IF_USER_EXIST = "SELECT username, id FROM users WHERE username = ?";
		const REGISTER_NEW_USER_SQL = "INSERT INTO users (username, password, firstname, lastname, email, created) 
																					VALUES (?, ?, ?, ?, ?, NOW())";
		const GET_USER_PASSWORD = "SELECT password FROM users WHERE email LIKE ?";
		const KEY = "123432534754853";
		const IV = "6542354643636167";
		
		public function loginUser(User $user) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::GET_AND_CHECK_USER_SQL);
			$pstmt->execute(array($user->username,  openssl_encrypt($user->password, 'AES-256-CBC', self::KEY, OPENSSL_RAW_DATA, self::IV)));
			
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

			
			if ( $pstmt->execute(array($user->username, openssl_encrypt($user->password, 'AES-256-CBC', self::KEY, OPENSSL_RAW_DATA, self::IV),
													$user->firstname, $user->lastname, $user->email))){
				$user->__set('id', $db->lastInsertId());
				return $user;
				
			}else{
				throw new Exception("Unsuccessful registration!");
			}
			
		}
		
		
		
		public function forgotPassword($email) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::GET_USER_PASSWORD);
			$pstmt->execute(array($email));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			return openssl_decrypt($res[0]['password'], 'AES-256-CBC', self::KEY, OPENSSL_RAW_DATA, self::IV);
		}
		
		
	}
?>