<?php
require_once "../model/IProjectDAO.php";
class ProjectDAO implements IProjectDAO {
	
	const INSERT_NEW_PROJECT = "INSERT INTO projects (id, name, description, prefix, create_date, admin_id, client, start_date, end_date, project_status_id) 
						VALUES (null, ?, ?, ?, now(), ?, ?, ?, ?, ?)";

	const GET_ADMIN_PROJECTS = "SELECT * FROM projects WHERE admin_id = ";

	const CHECK_IF_PROJECTNAME_EXIST = "SELECT name FROM projects WHERE name = ?";

	const CHECK_IF_PREFIXNAME_EXIST = "SELECT prefix FROM projects WHERE prefix = ?";
	
	
	public function createProject(Project $project) {

		try{
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::INSERT_NEW_PROJECT);
			
			$pstmt->execute(array($project->name, $project->description, $project->prefix, $project->adminId, $project->client, $project->startDate, 
								$project->endDate, $project->status));
			
			return true;
		}catch(Exception $e){
			throw new Exception("Failed to create new project!");
		}
	}
	
	
	public function getAdminProjects($id) {
		
		try{
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::GET_ADMIN_PROJECTS.$id);
			
			$pstmt->execute(array($project->name, $project->description, $project->prefix, $project->adminId, $project->client,
					$project->progress, $project->startDate, $project->endDate, $project->status));
			
			return true;
		}catch(Exception $e){
			throw new Exception("Failed to create new project!");
		}
	}

	public static function checkProjectName($name) {
		$db = DBConnection::getDb();
		
		$pstmt = $db->prepare(self::CHECK_IF_PROJECTNAME_EXIST);
		$pstmt->execute(array($name));
		
		$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);

		if (count($res) === 0) {
			return true;
		} else {
			return false;
		}
		
	}

	public static function checkPrefixName($name) {
		$db = DBConnection::getDb();
		
		$pstmt = $db->prepare(self::CHECK_IF_PREFIXNAME_EXIST);
		$pstmt->execute(array($name));
		
		$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);

		if (count($res) === 0) {
			return true;
		} else {
			return false;
		}
		
	}
	

}

?>