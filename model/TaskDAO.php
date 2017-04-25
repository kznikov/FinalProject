<?php
require_once "../model/IProjectDAO.php";
class TaskDAO implements ITaskDAO {
	
	const INSERT_NEW_TASK = "INSERT INTO tasks (id, title, description, create_date, assign_to, progress, start_date, end_date, task_type_id,
						 task_status_id, projects_id, task_priority_id) VALUES (null, ?, ?, now(), ?, ?, ?, ?, ?, ?, ?, ?)";
	
	
	
	public function createTask(Task $task) {
		
		try{
			$db = DBConnection::getDb();
			
			$pstmt = $db->prepare(self::INSERT_NEW_TASK);
			
			$pstmt->execute(array($task->title, $task->description, $task->owner, $task->progress, $task->start_date, $task->end_date,
									$task->type, $task->status, $task->projectId, $task->priority));
			
			return true;
		}catch(Exception $e){
			throw new Exception("Failed to create new task!");
		}
	}
	
	
}

?>