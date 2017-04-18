<?php
	class UserDAO implements IUserDAO {
		
		const GET_AND_CHECK_USER_SQL = "SELECT username, id FROM users WHERE username = ? AND password = ?";
		
		public function loginUser(User $user) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::GET_AND_CHECK_USER_SQL);
			$pstmt->execute(array($user->username, hash('sha256', ($user->password))));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			if (count($res) === 0)
				throw new Exception("Try again");
			
			$user = $res[0];
			
			return new User($user['username'], 'p', $user['id']);
		}
		
		public function registerUser(User $user) {
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::GET_AND_CHECK_USER_SQL);
			$pstmt->execute(array($user->username, $user->password));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			if (count($res) === 0)
				throw new Exception("Are logni se pak ve galfon!");
				
				$user = $res[0];
				
				return new User($user['username'], 'haha', $user['id']);
		}
		
		
	}
?>