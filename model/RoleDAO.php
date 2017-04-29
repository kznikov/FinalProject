<?php

require_once "../model/IRoleDAO.php";

class RoleDAO implements IRoleDAO {
	
	
	private $db;
	
	
	const GET_ALL_ROLES = "SELECT * FROM roles";
	const GET_ALL_PERMISSIONS = "SELECT * FROM permissions";
	const GET_ROLE_PERMISSIONS = "SELECT p.name from roles r JOIN role_permissions rp JOIN permissions p on r.id = rp.role_id and rp.permission_id = p.id where r.id = ?";
	const GET_NAMES = "SELECT name FROM roles";
	
	
	public function __construct() {
		$this->db = DBConnection::getDb();
	}
	
	
	
	public function permissionsArray($id, $permissions){
		try {
			$rolePerm = array();
			foreach ($permissions as $perm){
				$rolePerm[$perm['name']] =  0;
			}
			
			$pstmt = $this->db->prepare(self::GET_ROLE_PERMISSIONS);
			$pstmt->execute(array($id));
			$perm = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($perm as $val){
				$rolePerm[$val['name']] = 1;
			}

			return $rolePerm;
		}catch(Exception $e){
			throw new Exception("Something went wrong, please try again later!");
		}
	}
	
	
	public function getAllRoles() {
		$res = $this->db->query(self::GET_ALL_ROLES);
		$permissions = $this->db->query(self::GET_ALL_PERMISSIONS);
		
		  $roles = array();
		 
		foreach ($res as $role){
			$permissions = $this->db->query(self::GET_ALL_PERMISSIONS);
			$roles[] = new Role($role['name'], self::permissionsArray($role['id'], $permissions));
		}
		
		return $roles; 
	}

	public function getRoles() {
		$res = $this->db->query(self::GET_NAMES);
		$roles = $res->fetchAll(PDO::FETCH_ASSOC);
		return $roles; 
	}
	
}


?>