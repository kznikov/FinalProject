<?php
require_once "../model/IProjectDAO.php";
class TaskDAO implements ITaskDAO {
	
	const INSERT_NEW_TASK = "INSERT INTO tasks (id, title, description, created_by, create_date, assign_to, progress, start_date, end_date, task_type_id,
						 task_status_id, projects_id, task_priority_id) VALUES (null, ?, ?, ?, now(), ?, ?, ?, ?, ?, ?, ?, ?)";
	
	const GET_USER_ASSIGN_TASKS = "SELECT CONCAT(p.prefix, t.id) as task_id, p.name as project, t.*, u.username, tt.name as type, ts.name as status, tp.name as priority FROM tasks t JOIN task_priority tp 
							ON t.task_priority_id = tp.id JOIN task_status ts ON t.task_status_id = ts.id JOIN task_type tt ON t.task_type_id = tt.id JOIN users u ON u.id = t.assign_to JOIN projects p ON p.id = t.projects_id WHERE t.assign_to = ";

	const GET_PROJECT_OPEN_TASKS = "SELECT t.*, ts.name as status, tt.name as type, tp.name as priority FROM tasks t JOIN projects p ON t.projects_id = p.id JOIN task_priority tp ON t.task_priority_id = tp.id JOIN  task_status ts ON  t.task_status_id = ts.id JOIN task_type  tt ON t.task_type_id = tt.id 
											WHERE t.task_status_id = 1 AND p.name LIKE ?";

	const GET_PROJECT_WORKINGON_TASKS = "SELECT t.*, ts.name as status, tt.name as type, tp.name as priority FROM tasks t JOIN projects p ON t.projects_id = p.id JOIN task_priority tp ON t.task_priority_id = tp.id JOIN  task_status ts ON  t.task_status_id = ts.id JOIN task_type  tt ON t.task_type_id = tt.id
												 WHERE t.task_status_id IN (2,3) AND p.name LIKE ?";
	

	const GET_PROJECT_DONE_TASKS = "SELECT t.*, ts.name as status, tt.name as type, tp.name as priority FROM tasks t JOIN projects p ON t.projects_id = p.id JOIN task_priority tp ON t.task_priority_id = tp.id JOIN  task_status ts ON  t.task_status_id = ts.id JOIN task_type  tt ON t.task_type_id = tt.id
														 WHERE t.task_status_id IN (4,5) AND p.name LIKE ?";


    const GET_TASKS = "SELECT CONCAT(p.prefix, t.id) as task_id, p.name as project, t.*, u.username, tt.name as type, ts.name as status, tp.name as priority FROM tasks t JOIN task_priority tp ON t.task_priority_id = tp.id JOIN task_status ts ON t.task_status_id = ts.id JOIN task_type tt 
								ON t.task_type_id = tt.id JOIN users u ON u.id = t.assign_to JOIN projects p ON p.id = t.projects_id WHERE t.id = ";

	
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

		} catch(Exception $e){
			throw new Exception("Failed to get information from DB!");
		}
	}

	public static function getTask($task_id){
		try{
			$db = DBConnection::getDb();
			$task = $db->query(self::GET_TASKS.$task_id);
			$task = $task->fetchAll(PDO::FETCH_ASSOC);
			return $task = $task[0];

		} catch(Exception $e){
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
	
	
	
	public static function getProjectTasks($project_name){
		try{
			$db = DBConnection::getDb();
			
			
			$pstmt = $db->prepare(self::GET_PROJECT_OPEN_TASKS);
			$pstmt->execute(array($project_name));
			$toDoTasks= $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$pstmt = $db->prepare(self::GET_PROJECT_WORKINGON_TASKS);
			$pstmt->execute(array($project_name));
			$workingOnTasks= $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$pstmt = $db->prepare(self::GET_PROJECT_DONE_TASKS);
			$pstmt->execute(array($project_name));
			$doneTasks= $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			$projectTasks [] = $toDoTasks;
			$projectTasks [] = $workingOnTasks;
			$projectTasks [] = $doneTasks;
			return $projectTasks;
			
		}catch(Exception $e){
			throw new Exception("Failed to get information from DB!");
		}
	}
	
	
}

?>