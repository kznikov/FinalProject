<?php

	include "../view/inc/autoload.php";
	
	$userId = json_decode($_SESSION['user'],true)['id'];
	$userId = (int)($userId);
	
	$tasksDao = new TaskDAO();
	$allTasks = $tasksDao->getUserAllTasks($userId);
	if($_SERVER ['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		 try {

		 	$projectId = htmlentities(trim($_POST['project']));
		 	$title = htmlentities(trim($_POST['title']));
		 	$ownerId = htmlentities(trim($_POST['owner']));
		 	$description = htmlentities(trim($_POST['description']));
		 	$type = htmlentities(trim($_POST['type']));
		 	$priority = htmlentities(trim($_POST['priority']));
		 	$status = htmlentities(trim($_POST['status']));
		 	$progress =  htmlentities(trim($_POST['progress']));
		 	$startDate = htmlentities(trim($_POST['start_date']));
		 	$endDate = htmlentities(trim($_POST['end_date']));
		 	
		 	if(!empty($projectId) && !empty($title) && !empty($ownerId)){
				
		 		$task = new Task($title, $projectId, $userId, $ownerId, $type, $priority, $status, $progress,
		 				$description, $startDate, $endDate, $id = null, $projectName = null, $prefixId = null, $ownerUsername = null);

			 	//var_dump($task);
				$taskData = new TaskDAO();
				
				$result = $taskData->createTask($task);
				
				 if(!$result){
					throw new Exception("Failed to create new task!");
				}else{
					$message = "Task $title successfully created.";
					$class = "flash_success";
					include '../view/alltasks.php';
				} 
			}else{
				$message = "Failed to create new task!";
				$class = "flash_error";
				include '../view/alltasks.php';
			}
			
		}catch (Exception $e) {

			$message = $e->getMessage();
			//$row = $e->getLine(); 
			$class = "flash_error";
			include '../view/alltasks.php';
		}
	
	
	
	}elseif($_SERVER ['REQUEST_METHOD'] === 'DELETE' && isset($_SESSION['user'])){
		$id = explode('=',file_get_contents('php://input'))[1];	
		$allTasks = explode('=',file_get_contents('php://input'))[2];
		
		$deleteDao = new TaskDAO();
		
		$deleted = $deleteDao->deleteTask($id);
		
		$tasksData = new TaskDAO();
		if($allTasks){
			$tasks =  $tasksData->getUserAllTasks($userId);
		}else{
			$tasks =  $tasksData->getUserAssignTasks($userId);
		}
		
		if (isset($tasks) && $tasks) {
			foreach ($tasks as $task) {
				?>
                            <tr class="myproject-name" onclick="location.href = '../controller/ViewTaskController.php?name=<?= $task->id ?> ';">
                                <td><?= $task->prefixId?></td>
                                <td><?= $task->title ?></td>
                                <td><?= $task->ownerUsername?></td>
                                <td><img style="width: 20px; margin-right: 5px;" src="../view/images/type_<?= $task->type ?>.png"><?= $task->type?></td>
                                <td><?= (!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : $task->startDate) ?></td>
                                <td><?= (!strtotime($task->endDate) ? "<em style='color:red;'>Not set</em>" : $task->endDate) ?></td>
                                <td><?= $task->status?></td>
                                <td><?= $task->priority ?><img style="width: 30px; margin-left: 0px;" src="../view/images/priority_<?= $task->priority?>.png"></td>
                                <td><div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task->progress?>">
                                        <div class="progress-bar progress"></div>	  
                                    </div>
                                    <p class="progress_perc" ><?= $task->progress ?>%</p>
                                </td>
                                    <td><a href="#" title="<?= $task->projectName ?>"><span onclick="viewProject('<?= $task->projectName?>')"><?= $task->projectName?></span></a></td>
                                <td class="text-center">
                                    <a href="#"><span class="glyphicon glyphicon-eye-open" title="View"></span></a>
                                    <a href="#"><span class="glyphicon glyphicon-cog" title="Edit"></span></a>
                                     <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"  onclick="deleteTask(<?php echo $task->id ?>, <?=($allTasks) ? 1 : 0?>)"></span></a>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        ?>
                        <tr>
                            <td colspan="11" style="text-align: center;"><em><strong>No results found.</strong></em></td>
                        </tr>
					<?php } 
		}else{
			echo "<p style='color:red'>Error</p>";
		}
		
		

?>