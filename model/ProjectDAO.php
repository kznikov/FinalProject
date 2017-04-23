<?php
require_once "../model/IProjectDAO.php";
class ProjectDAO implements IProjectDAO {
	
	const INSERT_NEW_PROJECT = "INSERT INTO projects (id, name, description, prefix, create_date, admin_id, client, progress, start_date, end_date, project_status_id) 
						VALUES (null, ?, ?, ?, now(), ?, ?, ?, ?, ?, ?)";
	
	const GET_ADMIN_PROJECTS = "SELECT * FROM projects WHERE admin_id = ";
	
	
	public function createProject(Project $project) {

		try{
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::INSERT_NEW_PROJECT);
			
			$pstmt->execute(array($project->name, $project->description, $project->prefix, $project->adminId, $project->client,
					$project->progress, $project->startDate, $project->endDate, $project->status));
			
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
	
}

?>