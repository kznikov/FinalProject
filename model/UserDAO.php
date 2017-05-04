<?php

require_once "../model/IUserDAO.php";

	class UserDAO implements IUserDAO {
		
		
		private $db;
		
		
		const GET_AND_CHECK_USER_SQL = "SELECT * FROM users WHERE username = ? AND password = ?";

		const CHECK_IF_USER_EXIST = "SELECT username, id FROM users WHERE username = ?";
		
		const CHECK_IF_EMAIL_EXIST = "SELECT username, id FROM users WHERE email = ?";

		const REGISTER_NEW_USER_SQL = "INSERT INTO users (username, password, firstname, lastname, email, created) 
																					VALUES (?, ?, ?, ?, ?, NOW())";
		const UPDATE_TOKEN = "UPDATE users SET token = ? WHERE email LIKE ?";
		const RESET_PASSWORD = "UPDATE users SET password = ?, token=''  WHERE email LIKE ? AND token LIKE ?";
		
		const UPDATE_LOGIN = "UPDATE users SET first_login = 1 WHERE id = ?";
		
		const SAVE_IMAGE = "UPDATE `users` SET `avatar`= ? WHERE id= ?";

		const GET_IMAGE = "SELECT avatar FROM users WHERE id = ?";

		const GET_INFO_USER = "SELECT * FROM users WHERE id = ?";

		const UPDATE_INFO_USER = "UPDATE users SET username = ?, password = ?, firstname = ?, lastname = ?, email = ?, phone = ?, mobile = ?, last_upd =  NOW(), avatar = ? WHERE id = ?";

		const SELECT_ALL =  "SELECT * FROM `users` ORDER BY firstname";

		const DELETE_USER = "DELETE FROM users WHERE id=:id";
		
		const GET_USER_ID = "SELECT id FROM users WHERE username LIKE ?";
		
		const GET_ALL_USERNAMES = "SELECT username FROM users WHERE username LIKE CONCAT('%',?,'%') ORDER BY username";
		
		const SEARCH_FOR_USERS = "SELECT * FROM users WHERE MATCH (username,firstname, lastname, email) AGAINST
																 (? IN BOOLEAN MODE) HAVING email LIKE '%@%';";
		
		const GET_PROJECT_ASSOC_USERS = "SELECT u.*, r.name as role, up.roles_id FROM users u JOIN user_projects up 
							ON u.id = up.user_id JOIN roles r ON r.id=up.roles_id JOIN projects p 
												ON up.project_id = p.id WHERE p.name LIKE ?";
		
		const INSERT_INTO_ONLINE_USERS = "INSERT INTO online_users (user_id, username) VALUES (?, ?)";
		
		const REMOVE_ONLINE_USER = "DELETE FROM online_users WHERE user_id = ?";
		
		
		const GET_ONLINE_USERS = "SELECT DISTINCT(ou.user_id),ou.username FROM online_users ou JOIN user_projects up 
															ON ou.user_id = up.user_id WHERE up.project_id IN (?)";
		
		const GET_USER_ROLE = "SELECT roles_id FROM user_projects WHERE user_id = ? AND project_id = ?";
		
		
		const GET_USER_ALL_PROJECTS_ROLES = "SELECT project_id, roles_id FROM user_projects WHERE user_id = ?";
		
		public function __construct() {
			$this->db = DBConnection::getDb();
		}
		
		
		public function loginUser(User $user) {
			try{
				
				
				$pstmt = $this->db->prepare(self::GET_AND_CHECK_USER_SQL);
				$pstmt->execute(array($user->username,  hash('sha256',$user->password)));
				
				$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				
				if (count($res) === 0)
					throw new Exception("Try again!");
				
				$user = $res[0];
				
	
				if(!$user['first_login']){
					$firstlogin = true;
					$pstmt = $this->db->prepare(self::UPDATE_LOGIN);
					$pstmt->execute(array($user['id']));
				}else{
					$firstlogin = false;
				}
				
				return new User($user['username'], 'p', $user['firstname'], $user['lastname'], $user['email'],
											$firstlogin, $user['phone'], $user['mobile'], $user['avatar'], $user['id']);
			}catch (Exception $e){
				
				throw $e;
			}
		}

		public function checkUserName($username) {
			try{
				
				$pstmt = $this->db->prepare(self::CHECK_IF_USER_EXIST);
				$pstmt->execute(array($username));
				
				$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				
				if (count($res) === 0) {
					return true;
				} else {
					return false;
				}
			}catch(Exception $e){
				throw new Exception("Something went wrong, please try again later!");
			}
			
		}

		public function checkEmail($email) {
			try{
				$pstmt = $this->db->prepare(self::CHECK_IF_EMAIL_EXIST);
				$pstmt->execute(array($email));
				
				$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	
				if (count($res) === 0) {
					return true;
				} else {
					return false;
				}
			}catch(Exception $e){
				throw new Exception("Something went wrong, please try again later!");
			}
			
		}
		
		public function registerUser(User $user) {
			try{				
				$pstmt = $this->db->prepare(self::REGISTER_NEW_USER_SQL);
	
				
				if ( $pstmt->execute(array($user->username, hash('sha256',$user->password),
														$user->firstname, $user->lastname, $user->email))){
					$user->__set('id', $this->db->lastInsertId());
					return $user;
					
				}else{
					throw new Exception("Unsuccessful registration!");
				}
			}catch (PDOException $e){
				throw $e;
				//echo $e->getMessage();
			}
			
		}
		
		public function saveImage($name, $id) {
			$pstmt = $this->db->prepare(self::SAVE_IMAGE);
			$pstmt->execute(array($name, $id));
		}

		public function updateUser(User $user) {
			try{
				$pstmt = $this->db->prepare(self::UPDATE_INFO_USER);
				$pstmt->execute(array($user->username, $user->password, $user->firstname,
													$user->lastname, $user->email, $user->phone, $user->mobile, $user->avatar, $user->id ));			
			}catch(Exception $e){
				throw new Exception("Something went wrong, please try again later!");
			}
		}

		public function getImage($id) {	
			try{
				$pstmt = $this->db->prepare(self::GET_IMAGE);
				$pstmt->execute(array($id));
				
				$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	
				return $res;
			}catch(Exception $e){
				throw new Exception("Something went wrong, please try again later!");
			}
			
		}

		public function getInfoUser($id) {	
			try{
				$pstmt = $this->db->prepare(self::GET_INFO_USER);
				$pstmt->execute(array($id));
				
				if($res = $pstmt->fetchAll(PDO::FETCH_ASSOC)){
					$user = $res[0];
				}else{
					throw new Exception("This user does not exists!");
				}
	
				return new User($user['username'], $user['password'], $user['firstname'], $user['lastname'], $user['email'],
						$user['first_login'], $user['phone'], $user['mobile'], $user['avatar'], $user['id']);
			}catch (Exception $e){
				throw new Exception("Something went wrong, please try again later!");
			}
			
		}

		public function selectUser() {
			try{
				$pstmt = $this->db->query(self::SELECT_ALL);
				$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				return $res;
			}catch(Exception $e){
				throw new Exception("Something went wrong, please try again later!");
			}
		}

		public function deleteUser($id) {
			try{
				$pstmt = $this->db->prepare(self::DELETE_USER);
				$pstmt->execute(array(":id"=>$id));
			}catch (Exception $e){
				echo $e->getMessage();
			}
			
		}
		
		public function forgotPassword($email, $token) {
			try{
				$pstmt = $this->db->prepare(self::UPDATE_TOKEN);
				if(!self::checkEmail($email)){
					return $pstmt->execute(array($token, $email));
				}
				return false;
			}catch (Exception $e){
				echo $e->getMessage();
			}
				
		}
		
		
		public function resetPassword($email, $token, $pass) {
			try{
				$pstmt = $this->db->prepare(self::RESET_PASSWORD);
				
				 $pstmt->execute(array(hash('sha256', $pass), $email, $token));
				 return $pstmt->rowCount();
			}catch (Exception $e){
				throw $e;
			}
		}
		
		
		
		public function getProjectAssocUsers($projectName) {
			
			try{
				$pstmt = $this->db->prepare(self::GET_PROJECT_ASSOC_USERS);
				$pstmt->execute(array($projectName));
				
				$users = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				
				return $users;
				
			} catch(Exception $e){
				throw new Exception("Something went wrong, please try again later!");
			}
		}


		public function getRealUserIp(){
		    switch(true){
		      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
		      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
		      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
		      default : return $_SERVER['REMOTE_ADDR'];
		    }
		 }
		 
		 
		 public function getAllUsernames($keyword){
		 	try{
		 		$pstmt = $this->db->prepare(self::GET_ALL_USERNAMES);
		 		$pstmt->execute(array($keyword));
		 		
		 		$usernames = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		 		
		 		return $usernames;
		 		
		 	} catch(Exception $e){
		 		throw new Exception("Something went wrong, please try again later!");
		 	}
		 }
		 
		 
		 
		 public function searchUsers($keyword){
		 	try{
		 		$pstmt = $this->db->prepare(self::SEARCH_FOR_USERS);
		 		$pstmt->execute(array($keyword));
		 		
		 		$users = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		 		
		 		$allUsers = array();
		 		foreach ($users as $user){
		 			$allUsers [] = new User($user['username'], 'p', $user['firstname'], $user['lastname'], $user['email'],
		 					$user['first_login'], $user['phone'], $user['mobile'], $user['avatar'], $user['id']);
		 		}
		 		
		 		return $allUsers;
		 		
		 	} catch(Exception $e){
		 		throw new Exception("Something went wrong, please try again later!");
		 	}
		 }
		
		 
		 public function getUserId($username){
		 	try{
		 		$pstmt = $this->db->prepare(self::GET_USER_ID);
			 	$pstmt->execute(array($username));
			 	
			 	$userId = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			 	return $userId[0];
		 	} catch(Exception $e){
		 		throw new Exception("Something went wrong, please try again later!");
		 	}
		 }
		 
		 
		 
		 public function addNewOnlineUser($userID, $username){
			 try{
			 	$pstmt = $this->db->prepare(self::INSERT_INTO_ONLINE_USERS);
			 	$pstmt->execute(array($userID, $username));
			 	if($pstmt){
			 		return true;
			 	}
			 	
			 } catch(Exception $e){
			 	throw new Exception("Something went wrong, please try again later!");
			 }
		 }
		 
		 
		 public function removeOnlineUser($userID){
		 	try{
		 		$pstmt = $this->db->prepare(self::REMOVE_ONLINE_USER);
		 		$pstmt->execute(array($userID));
		 		if($pstmt){
		 			return true;
		 		}
		 		
		 	} catch(Exception $e){
		 		throw new Exception("Something went wrong, please try again later!");
		 	}
		 }

		 
		 
		 function getOnlineUSers($userId){
		 	try{
		 		$onlineUsers = array();
			 	$projectDao = new ProjectDAO();
			 	$allPorjects = $projectDao->getUserAllProjects($userId);
			 	$projectsIds = array();
			 	$str = "";
			 	if(!empty($allPorjects)){
				 	foreach ($allPorjects as $project){
				 		$str.= $project->id.", ";
				 	}
				 	$str{strlen($str)-1} = '';
				 	$str{strlen($str)-2} = '';
				 	$pstmt = $this->db->prepare(self::GET_ONLINE_USERS);
				 	$pstmt->execute(array($str));
			 	}else{
			 		return $onlineUsers;
			 	}
			 	$users = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			 	
			 	foreach ($users as $user){
			 		$onlineUsers [] = new User($user['username'], 'p', null, null, null, null, null, null, null, $user['user_id']);
						 		
			 	}
			 	return $onlineUsers;
		 	} catch(Exception $e){
		 		throw new Exception($pstmt);
		 	}
			 	
		 }
		 
		 
		 
		 public function getUserProjectRole($userId, $projectId){
		 	try{
		 		$pstmt = $this->db->prepare(self::GET_USER_ROLE);
		 		$pstmt->execute(array($userId, $projectId));
		 		
		 		$role = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		 		
		 		return $role[0]['roles_id'];
		 	} catch(Exception $e){
		 		throw new Exception("Something went wrong, please try again later!");
		 	}
		 }
		 
		 
		 public function getUserAllProjectRole($userId){
		 	try{
		 		$pstmt = $this->db->prepare(self::GET_USER_ALL_PROJECTS_ROLES);
		 		$pstmt->execute(array($userId));
		 		
		 		$roles = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		 		
		 		return $roles;
		 	} catch(Exception $e){
		 		throw new Exception("Something went wrong, please try again later!");
		 	}
		 }
}
	

?>