<?php

require_once "../model/IRoleDAO.php";
class RoleDAO implements IRoleDAO {
	
	const GET_ALL_ROLES = "SELECT * FROM roles";
	const GET_ALL_PERMISSIONS = "SELECT * FROM permissions";
	const GET_ROLE_PERMISSIONS = "SELECT p.name from roles r JOIN role_permissions rp JOIN permissions p on r.id = rp.role_id and rp.permission_id = p.id where r.id = ";
	
	
	public function permissionsArray($id, $permissions){
		$db = DBConnection::getDb();
		$rolePerm = array();
		foreach ($permissions as $perm){
			$rolePerm[$perm['name']] =  0;
		}
		$perm= $db->query(self::GET_ROLE_PERMISSIONS.$id);
		foreach ($perm as $val){
			$rolePerm[$val['name']] = 1;
		}
		return $rolePerm;
		
	}
	
	
	public function getAllRoles() {
		$db = DBConnection::getDb();

		$res = $db->query(self::GET_ALL_ROLES);
		$permissions = $db->query(self::GET_ALL_PERMISSIONS);
		//echo "<br/><br/><br/>";
		//var_dump(self::permissionsArray(14, $permissions)); 
		  $roles = array();
		 
		foreach ($res as $role){
			$permissions = $db->query(self::GET_ALL_PERMISSIONS);
			$roles[] = new Role($role['name'], self::permissionsArray($role['id'], $permissions));
		}
		//var_dump($roles);
		return $roles; 
	}
	
}



?>