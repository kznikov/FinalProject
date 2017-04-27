<?php

require_once "../model/IProjectDAO.php";

class ProjectDAO implements IProjectDAO {

	private $db;
	
	
	const INSERT_NEW_PROJECT = "INSERT INTO projects (id, name, description, prefix, create_date, admin_id, client, start_date, end_date, project_status_id) 
						VALUES (null, ?, ?, ?, now(), ?, ?, ?, ?, ?)";

	const GET_ADMIN_PROJECTS = "SELECT p.*, u.id as user_id, u.username, ps.name as status, COUNT(t.id) as 'all_tasks' FROM projects p JOIN users u ON p.admin_id = u.id JOIN project_status ps
								 ON p.project_status_id = ps.id left JOIN tasks t ON p.id = t.projects_id WHERE p.admin_id = ? GROUP BY p.id";
	
	const GET_ADMIN_ALL_OPEN_TASK_CNT = "SELECT p.id, count(t.id) as 'open_tasks' FROM projects p LEFT JOIN tasks t ON p.id = t.projects_id and t.task_status_id = 1 WHERE p.admin_id = ? GROUP BY p.id";

	
	const GET_PROJECT_PROGRESS = "SELECT p.id, ROUND(AVG(t.progress)) as 'avg_tasks_progress' FROM projects p left JOIN tasks t ON p.id = t.projects_id WHERE p.admin_id = ? GROUP BY p.id";
	
	const CHECK_IF_PROJECTNAME_EXIST = "SELECT name FROM projects WHERE name = ?";

	const CHECK_IF_PREFIXNAME_EXIST = "SELECT prefix FROM projects WHERE prefix = ?";
	
	
	const GET_USER_ASSOC_PROJECTS = "SELECT p.*, u.id as user_id, u.email as user_email, u.username, ps.name as status, COUNT(t.id) as all_tasks FROM projects p JOIN user_projects up 
					ON p.id = up.project_id JOIN users u ON u.id = up.user_id JOIN project_status ps ON p.project_status_id = ps.id LEFT JOIN tasks t ON p.id = t.projects_id where u.id = ? GROUP BY p.id";
	
	const GET_USER_ASSOC_PROJECTS_OPEN_TASKS_CNT = "SELECT p.id, count(t.id) as 'open_tasks' FROM projects p JOIN user_projects up ON p.id = up.project_id LEFT JOIN tasks t
							 ON p.id = t.projects_id and t.task_status_id = 1 WHERE up.user_id = ? GROUP BY p.id";
	
	
	const GET_ASSOC_PROJECTS_PROGRESS = "SELECT p.id, ROUND(AVG(t.progress)) as 'avg_tasks_progress' FROM projects p JOIN user_projects up ON p.id = up.project_id LEFT JOIN tasks t
													 ON p.id = t.projects_id WHERE  up.user_id = ? GROUP BY p.id";

    const GET_INFO_PROJECT = "SELECT p.*, u.*, ps.name as status, COUNT(t.id) as 'all_tasks',ROUND(AVG(t.progress)) as 'avg_tasks_progress' FROM projects p JOIN users u 
						ON p.admin_id=u.id JOIN project_status ps ON p.project_status_id = ps.id left JOIN tasks t ON p.id = t.projects_id WHERE p.name LIKE ?";
    const SELECT_NAME = "SELECT name FROM projects";
    const GET_PROJECT_ASSOC_USERS = "SELECT * from (SELECT u.* FROM users u JOIN user_projects up 
							ON u.id = up.user_id JOIN projects p ON up.project_id = p.id WHERE p.name LIKE ?) as users 
												union (SELECT u.* FROM users u JOIN projects p ON p.admin_id = u.id WHERE p.name LIKE ?)";


	public function __construct() {
		$this->db = DBConnection::getDb();
	}
	
	
	public function createProject(Project $project) {

		try{
			
			$pstmt = $this->db->prepare(self::INSERT_NEW_PROJECT);
			
			$pstmt->execute(array($project->name, $project->description, $project->prefix, $project->adminId, $project->client, $project->startDate, 
								$project->endDate, $project->status));
			
			return true;
		}catch(Exception $e){
			throw new Exception("Failed to create new project!");
		}
	}
	
	
	public function getAdminProjects($id) {
		try{
			$pstmt = $this->db->prepare(self::GET_ADMIN_PROJECTS);
			$pstmt->execute(array($id));
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$pstmt = $this->db->prepare(self::GET_ADMIN_ALL_OPEN_TASK_CNT);
			$pstmt->execute(array($id));
			$openTasks = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$pstmt = $this->db->prepare(self::GET_PROJECT_PROGRESS);
			$pstmt->execute(array($id));
			$projectProgress = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$tmp = array();
			$result = array();
			for($index = 0;$index <= count($res)-1;$index++){
				$tmp[] = array_merge($res[$index], $openTasks[$index]);
			}
			
			for($index = 0;$index <= count($tmp)-1;$index++){
				$result[] = array_merge($tmp[$index], $projectProgress[$index]);
			}
			return $result;
		}catch(Exception $e){
			throw new Exception("Failed to get information from DB!");
		}
	}
	
	
	
	public function getUserAllProjects($id) {
		try{
			
			$adminProjects = self::getAdminProjects($id);
			
			$pstmt = $this->db->prepare(self::GET_USER_ASSOC_PROJECTS);
			$pstmt->execute(array($id));
			$assocProjects = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$pstmt = $this->db->prepare(self::GET_USER_ASSOC_PROJECTS_OPEN_TASKS_CNT);
			$pstmt->execute(array($id));
			$openTasks = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$tmp = array();
			$result = array();
			
			$pstmt = $this->db->prepare(self::GET_ASSOC_PROJECTS_PROGRESS);
			$pstmt->execute(array($id));
			$projectProgress= $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			for($index = 0;$index <= count($assocProjects)-1;$index++){
				$tmp[] = array_merge($assocProjects[$index], $openTasks[$index]);
			}
			
			for($index = 0;$index <= count($tmp)-1;$index++){
				$result[] = array_merge($tmp[$index], $projectProgress[$index]);
			} 
			
			return array_merge($adminProjects, $result);
			
		}catch(Exception $e){
			throw new Exception("Failed to get information from DB!");
		}
	}

	public function checkProjectName($name) {
		
		$pstmt = $this->db->prepare(self::CHECK_IF_PROJECTNAME_EXIST);
		$pstmt->execute(array($name));
		
		$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);

		if (count($res) === 0) {
			return true;
		} else {
			return false;
		}
		
	}

	public function checkPrefixName($name) {
		
		$pstmt = $this->db->prepare(self::CHECK_IF_PREFIXNAME_EXIST);
		$pstmt->execute(array($name));
		
		$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);

		if (count($res) === 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getInfoProject($name) {

		try{			
			$pstmt = $this->db->prepare(self::GET_INFO_PROJECT);
			$pstmt->execute(array($name));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			$infoProject = $res[0];

			return $infoProject;

		} catch(Exception $e){
			throw new Exception("Failed to get information from DB!");
		}
		
	}

	public function selectNameProject() {
		$pstmt = $this->db->query(self::SELECT_NAME);
		$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	
	
	public function getProjectAssocUsers($projectName) {
		
		try{			
			$pstmt = $this->db->prepare(self::GET_PROJECT_ASSOC_USERS);
			$pstmt->execute(array($projectName, $projectName));
			
			$users = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $users;
			
		} catch(Exception $e){
			throw new Exception("Failed to get information from DB!");
		}
	}

}
	


?>