<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();
if(isset($_SESSION['user'])){
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
}


try{
	if (isset($_GET['name'])) {
	
	    $name = htmlentities(trim($_GET['name']));
	
	    $userData = new UserDAO();
	
	    $checkUser = $userData->checkUserName($name);
	
	    if ($checkUser == true) {
	       echo "<p class=\"error\"> Wrong username. </p>";
	    }
	}
	
	if (isset($_GET['email'])) {
	
	    $email = htmlentities(trim($_GET['email']));
	
	    $userData = new UserDAO();
	
	    $checkEmail = $userData->checkEmail($email);
	
	    if ($checkEmail == false) {
	        echo "<p class=\"error\"> This email already exist. </p>";
	    }
	}
	
	if (isset($_GET['project'])) {
	
	    $project = htmlentities(trim($_GET['project']));
	
	    $projectData = new ProjectDAO();
	
	    $checkName = $projectData->checkProjectName($project);
	
	    if ($checkName == false) {
	        echo "<p class=\"error\"> This project already exist. </p>";
	    }
	}
	
	if (isset($_GET['prefix'])) {
	
	    $prefix = htmlentities(trim($_GET['prefix']));
	
	    $projectData = new ProjectDAO();
	
	    $checkPrefix = $projectData->checkPrefixName($prefix);
	
	    if ($checkPrefix == false) {
	        echo "<p class=\"error\"> This prefix already exist. </p>";
	    }
	}
	

	if (isset($_POST['task_id']) && isset($_SESSION['user'])) {
	
	    $id = $_POST['task_id'];
	    $allTasks = $_POST['allTasks'];
	
	    $deleteDao = new TaskDAO();
	
	    $deleted = $deleteDao->deleteTask($id);
	
	    $tasksData = new TaskDAO();
	    if($allTasks){
	    	$tasks =  $tasksData->getUserAllTasks($user_id);
	    }else{
	    	$tasks =  $tasksData->getUserAssignTasks($user_id);
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
		echo "Error";
	}
	   
}catch (Exception $e){
	echo "<p style='color:red;'>".$e->getMessage()."</p>";
}


?>