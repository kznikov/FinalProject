<?php

require_once "../model/IProjectDAO.php";

class TaskDAO implements ITaskDAO {
	
	private $db;
	
	const INSERT_NEW_TASK = "INSERT INTO tasks (id, title, description, created_by, create_date, assign_to, progress, start_date, end_date, task_type_id,
						 task_status_id, projects_id, task_priority_id) VALUES (null, ?, ?, ?, now(), ?, ?, ?, ?, ?, ?, ?, ?)";
	
	const GET_USER_ASSIGN_TASKS = "SELECT CONCAT(p.prefix, t.id) as task_id, p.name as project, t.*, u.username, tt.name as type, ts.name as status, tp.name as priority FROM tasks t JOIN task_priority tp 
							ON t.task_priority_id = tp.id JOIN task_status ts ON t.task_status_id = ts.id JOIN task_type tt ON t.task_type_id = tt.id JOIN users u ON u.id = t.assign_to JOIN projects p ON p.id = t.projects_id WHERE t.assign_to = ?";

	const GET_PROJECT_OPEN_TASKS = "SELECT t.*, ts.name as status, tt.name as type, tp.name as priority FROM tasks t JOIN projects p ON t.projects_id = p.id JOIN task_priority tp ON t.task_priority_id = tp.id JOIN  task_status ts ON  t.task_status_id = ts.id JOIN task_type  tt ON t.task_type_id = tt.id 
											WHERE t.task_status_id = 1 AND p.name LIKE ?";
    const GET_PROJECT_WORKINGON_TASKS = "SELECT t.*, ts.name as status, tt.name as type, tp.name as priority FROM tasks t JOIN projects p ON t.projects_id = p.id JOIN task_priority tp ON t.task_priority_id = tp.id JOIN  task_status ts ON  t.task_status_id = ts.id JOIN task_type  tt ON t.task_type_id = tt.id
												 WHERE t.task_status_id IN (2,3) AND p.name LIKE ?";
    const GET_PROJECT_DONE_TASKS = "SELECT t.*, ts.name as status, tt.name as type, tp.name as priority FROM tasks t JOIN projects p ON t.projects_id = p.id JOIN task_priority tp ON t.task_priority_id = tp.id JOIN  task_status ts ON  t.task_status_id = ts.id JOIN task_type  tt ON t.task_type_id = tt.id
														 WHERE t.task_status_id IN (4,5) AND p.name LIKE ?";
    const GET_TASKS = "SELECT CONCAT(p.prefix, t.id) as task_id, p.name as project, t.*, u.username, tt.name as type, ts.name as status, tp.name as priority FROM tasks t JOIN task_priority tp ON t.task_priority_id = tp.id JOIN task_status ts ON t.task_status_id = ts.id JOIN task_type tt 
								ON t.task_type_id = tt.id JOIN users u ON u.id = t.assign_to JOIN projects p ON p.id = t.projects_id WHERE t.id = ?";

	
    
    const GET_USER_ALL_TASKS = "SELECT CONCAT(p.prefix, t.id) as task_id, p.name as project, t.*, u.username, tt.name as type, ts.name as status, tp.name as priority FROM tasks t JOIN task_priority tp ON t.task_priority_id = tp.id JOIN task_status ts ON t.task_status_id = ts.id JOIN task_type tt 
											ON t.task_type_id = tt.id JOIN users u ON u.id = t.assign_to JOIN projects p ON p.id = t.projects_id WHERE t.created_by = ? OR t.assign_to = ?";
	
    
    const DELETE_TASK = "DELETE FROM tasks WHERE id = ?";


    const UPDATE_TASK = "UPDATE `tasks` SET `title`= ?,`description`= ?, `progress` = ?, `start_date`= ?,`end_date`=?, `last_update`= Now(),`task_type_id`= ?,`task_status_id`=?,`task_priority_id`=? WHERE id=?";

	
    public function __construct() {
    	$this->db = DBConnection::getDb();
    }
	
	
	
	public function createTask(Task $task) {
		
		try{
			$pstmt = $this->db->prepare(self::INSERT_NEW_TASK);
			//var_dump($task);
			$pstmt->execute(array($task->title, $task->description, $task->createdBy, $task->ownerId, $task->progress, $task->startDate, $task->endDate,
									$task->type, $task->status, $task->projectId, $task->priority));
			
			return true;
		}catch(Exception $e){
			throw new Exception("Failed to create new task!");
		}
	}
	
	
	public function getUserAssignTasks($user_id){
		try{
			$pstmt = $this->db->prepare(self::GET_USER_ASSIGN_TASKS);
			$pstmt->execute(array($user_id));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$tasks = array();
			foreach ($res as $task){
				$tasks[] = new Task($task['title'], $task['projects_id'], $task['created_by'],$task['assign_to'], $task['type'],
						$task['priority'], $task['status'], $task['progress'], $task['description'], $task['start_date'], $task['end_date'],
						$task['id'], $task['project'], $task['task_id'], $task['username']);
			}
			
			return $tasks;
		}catch(Exception $e){
			throw new Exception("Something went wrong, please try again later!");
		}
	}

	public function getTask($task_id){
		try{
			$pstmt = $this->db->prepare(self::GET_TASKS);
			$pstmt->execute(array($task_id));
			
			$res = $pstmt->fetch(PDO::FETCH_ASSOC);
			
			$task = new Task($res['title'], $res['projects_id'], $res['created_by'],$res['assign_to'], $res['type'],
					$res['priority'], $res['status'], $res['progress'], $res['description'], $res['start_date'], $res['end_date'],
					$res['id'], $res['project'], $res['task_id'], $res['username']);
			
			return $task;
		}catch(Exception $e){
			throw new Exception("Something went wrong, please try again later!");
		}
	}
	

	
	
	 public function getUserAssignOpenTasks($user_id){
		try{
			$pstmt = $this->db->prepare(self::GET_USER_ASSIGN_TASKS." AND t.task_status_id = 1");
			$pstmt->execute(array($user_id));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$openTasks = array();
			foreach ($res as $task){
				$openTasks[] = new Task($task['title'], $task['projects_id'], $task['created_by'],$task['assign_to'], $task['type'],
						$task['priority'], $task['status'], $task['progress'], $task['description'], $task['start_date'], $task['end_date'],
						$task['id'], $task['project'], $task['task_id'], $task['username']);
			}
			
			return $openTasks;
		 }catch(Exception $e){
		 	throw new Exception("Something went wrong, please try again later!");
		 }
	}
	
	
	public function getUserAssignWorkingOnTasks($user_id){
		try{
			$pstmt = $this->db->prepare(self::GET_USER_ASSIGN_TASKS." AND t.task_status_id = 2");
			$pstmt->execute(array($user_id));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$workingOnTasks= array();
			foreach ($res as $task){
				$workingOnTasks[] = new Task($task['title'], $task['projects_id'], $task['created_by'],$task['assign_to'], $task['type'],
						$task['priority'], $task['status'], $task['progress'], $task['description'], $task['start_date'], $task['end_date'],
						$task['id'], $task['project'], $task['task_id'], $task['username']);
			}
			
			return $workingOnTasks;
		}catch(Exception $e){
			throw new Exception("Something went wrong, please try again later!");
		}
	}
	
	public function toObjects($tasksArray){
		try{
			$result = array();
			foreach ($tasksArray as $task){
				$result[] =  new Task($task['title'], $task['projects_id'], $task['created_by'],$task['assign_to'], $task['type'],
						$task['priority'], $task['status'], $task['progress'], $task['description'], $task['start_date'], $task['end_date'],
						$task['id']);
			}
		
			return $result;
		}catch(Exception $e){
			throw new Exception("Something went wrong, please try again later!");
		}
	}
	
	
	public function getProjectTasks($project_name){
		try{
			$pstmt = $this->db->prepare(self::GET_PROJECT_OPEN_TASKS);
			$pstmt->execute(array($project_name));
			$toDoTasks= $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$pstmt = $this->db->prepare(self::GET_PROJECT_WORKINGON_TASKS);
			$pstmt->execute(array($project_name));
			$workingOnTasks= $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$pstmt = $this->db->prepare(self::GET_PROJECT_DONE_TASKS);
			$pstmt->execute(array($project_name));
			$doneTasks= $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$projectTasks[] = self::toObjects($toDoTasks);
			$projectTasks[] = self::toObjects($workingOnTasks);
			$projectTasks[] = self::toObjects($doneTasks);

			return $projectTasks;
		}catch(Exception $e){
			throw new Exception("Something went wrong, please try again later!");
		}
			
	}
	
	
	
	public function getUserAllTasks($user_id) {	
		try{
			$pstmt = $this->db->prepare(self::GET_USER_ALL_TASKS);
			$pstmt->execute(array($user_id, $user_id));
			
			$res = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$allTasks = array();
			foreach ($res as $task){
				$allTasks[] = new Task($task['title'], $task['projects_id'], $task['created_by'],$task['assign_to'], $task['type'],
						$task['priority'], $task['status'], $task['progress'], $task['description'], $task['start_date'], $task['end_date'],
						$task['id'], $task['project'], $task['task_id'], $task['username']);
			}
			return $allTasks;
		}catch(Exception $e){
			throw new Exception("Something went wrong, please try again later!");
		}
			
	}
	
	
	public function deleteTask($taskId) {
		try{
			$pstmt = $this->db->prepare(self::DELETE_TASK);
			$pstmt->execute(array($taskId));
			
			if($pstmt){
				return true;
			}
			return false;
			
		}catch(Exception $e){
			throw new Exception("Something went wrong, please try again later!");
		}
		
	}

	//update project
	public function updateTask($title, $description, $progress, $startDate, $endDate, $type, $status, $priority, $id) {
		try{
			$pstmt = $this->db->prepare(self::UPDATE_TASK);
			$pstmt->execute(array($title, $description, $progress, $startDate, $endDate, $type, $status, $priority, $id));			
		}catch(Exception $e){
			throw new Exception("Something went wrong, please try again later!");
		}
		
	}
	
	
	
	
}
	

?>