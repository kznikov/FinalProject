<?php
	class UserDAO implements IUserDAO {
		
		const GET_AND_CHECK_USER_SQL = "SELECT username, id FROM users WHERE username = ? AND password = ?";
		const CHECK_IF_USER_EXIST = "SELECT username, id FROM users WHERE username = ?";
		const REGISTER_NEW_USER_SQL = "INSERT INTO users (username, password, firstname, lastname, email, created) 
																					VALUES (?, ?, ?, ?, ?, NOW())";
		public function getUserFromDB($username, $password){
			
		}
		
		public function loginUser(User $user) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::GET_AND_CHECK_USER_SQL);
			$pstmt->execute(array($user->username, hash('sha256', ($user->password))));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			if (count($res) === 0)
				throw new Exception("Try again!");
			
			$user = $res[0];
			
			return new User($user['username'], 'p', $user['id']);
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

			if ( $pstmt->execute(array($user->username, hash('sha256', $user->password), $user->firstname, $user->lastname, 
									$user->email))){
				return $user;
				
			}else{
				throw new Exception("Unsuccessful registration!");
			}
			
		}
		
		
	}
?>