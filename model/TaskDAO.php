<?php
require_once "../model/IProjectDAO.php";
class TaskDAO implements ITaskDAO {
	
	const INSERT_NEW_TASK = "INSERT INTO tasks (id, title, description, created_by, create_date, assign_to, progress, start_date, end_date, task_type_id,
						 task_status_id, projects_id, task_priority_id) VALUES (null, ?, ?, ?, now(), ?, ?, ?, ?, ?, ?, ?, ?)";
	
	const GET_USER_ASSIGN_TASKS = "SELECT CONCAT(p.prefix, t.id) as task_id, p.name as project, t.*, u.username, tt.name as type, ts.name as status, tp.name as priority
								 FROM tasks t JOIN task_priority tp JOIN task_status ts JOIN task_type tt JOIN users u JOIN projects p 
								ON p.id = t.projects_id WHERE t.task_type_id = tt.id AND t.task_status_id = ts.id AND t.task_priority_id = tp.id AND u.id = t.assign_to AND t.assign_to = ";
	
	const GET_PROJECT_DONE_TASKS = "";
	
	
	public function createTask(Task $task) {
		
		try{
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::INSERT_NEW_TASK);
			//var_dump($task);
			$pstmt->execute(array($task->title, $task->description, $task->createdBy, $task->owner, $task->progress, $task->startDate, $task->endDate,
									$task->type, $task->status, $task->projectId, $task->priority));
			
			return true;
		}catch(Exception $e){
			throw new Exception("Failed to create new task!");
		}
	}
	
	
	public static function getUserAssignTasks($user_id){
		try{
			$db = DBConnection::getDb();
			
			$tasks = $db->query(self::GET_USER_ASSIGN_TASKS.$user_id);
			$tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
			
			return $tasks;
		}catch(Exception $e){
			throw new Exception("Failed to get information from DB!");
		}
	}
	

	
	
	 public static function getUserAssignOpenTasks($user_id){
		try{
			$db = DBConnection::getDb();
			
			$openTasks = $db->query(self::GET_USER_ASSIGN_TASKS.$user_id." AND t.task_status_id = 1");
			$openTasks = $openTasks->fetchAll(PDO::FETCH_ASSOC);
			
			return $openTasks;
		}catch(Exception $e){
			throw new Exception("Failed to get information from DB!");
		}
	}
	
	
	public static function getUserAssignWorkingOnTasks($user_id){
		try{
			$db = DBConnection::getDb();
			
			$workingOnTasks = $db->query(self::GET_USER_ASSIGN_TASKS.$user_id." AND t.task_status_id = 2");
			$workingOnTasks = $workingOnTasks->fetchAll(PDO::FETCH_ASSOC);
			
			return $workingOnTasks;
		}catch(Exception $e){
			throw new Exception("Failed to get information from DB!");
		}
	}
	
}

?>