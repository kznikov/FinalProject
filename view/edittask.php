<?php
$pageTitle = "Edit Task: " . $task->prefixId;
;
include "inc/header.php";

if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}
?>

<body>
<?php include "inc/nav.php"; ?>
    <section id="content" role="main" class="container">
        <div id="homepage-panel">
         <?php if (isset($_SESSION['message']) && isset($_SESSION['message_class'])) { ?>
			
			        <div  class="<?= $_SESSION['message_class']?>" style="margin-top:0px;"><?= $_SESSION['message']?></div>
					<?php
					unset($_SESSION['message']);
					unset($_SESSION['message_class']);
						}?>
            <div class="row">

                <div class="col-xs-12">
                    <div class="myproject-header">
                        <div class="myproject-title">
                            <div class="col-xs-12 col-md-5">
                                <h2>Edit Task - <?=$task->prefixId ?></h2>
                            </div>
                            <div class="col-xs-12 col-md-7">
                                  <div class="myproject-button">
                                    <button onclick="location.href = '../controller/UserAssignTasksController.php';" class="btn btn-primary">Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="update-task" name="update-task" action="../controller/EditTaskController.php" method="post" accept-charset="utf-8">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th scope="row">Project</th>
                                    <td><?= $task->projectName?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Title</th>
                                    <td>
                                         <div class="form-group"> 
                                            <input class="form-control" type="text" name="title" id="title" value="<?= $task->title?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                   <td>

                                       <div class="form-group">
                                           <input class="form-control" type="text" name="description" id="description" value="<?= $task->description?>">
                                       </div> 
                                   </td>
                                </tr>
                                <tr>
                                    <th scope="row">Type</th>
                                    <td>
                                        <div class="form-group"> 
                                            <label for="type">Current type: <img style="width: 20px; margin-right:5px;" src="../view/images/type_<?= $task->type ?>.png"><?= $task->type ?></label>
                                            <select id="type" name="type" class="form-control">
                                                <option value="3">Task</option> 
                                                <option value="1">Bug</option>
                                                <option value="2">Enhancement</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Priority</th>
                                    <td>
                                      <div class="form-group"> 
                                        <label for="priority">Currnet priority: <img style="width:30px; margin-left: 0px;" src="../view/images/priority_<?= $task->priority ?>.png"> <?=$task->priority?> </label>
                                        <select id="priority" name="priority" class="form-control">
                                            <option value="1">Low</option> 
                                            <option value="2">Medium</option>
                                            <option value="5">High</option>
                                            <option value="6">Escalated</option>
                                        </select>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>
                                        <label for="status">Currnet status: <?= $task->status?></label>
                                        <select id="status" name="status" class="form-control">
                                            <option value="1">Open</option> 
                                            <option value="2">Working on</option>
                                            <option value="3">Suspended</option>
                                            <option value="4">Closed</option>
                                            <option value="5">Cancelled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Progress</th>
                                    <td>
                                    <div style="float:left;width:10%;"> 
                                    	<input  type="number" name="progress" min="0" max="100" step="5" class="form-control" />
                                    </div>
                                        <div class="progress-wrap progress" style="background-color:orange;width: 90%" data-progress-percent="<?= $task->progress?>">
                                            <div class="progress-bar progress"></div>	  
                                        </div>
                                        <p class="progress_perc" ><?= $task->progress ?>%</p>

                                        <?php  

                                            if ($task->progress == 100) {
                                                ?>
                                                <script type="text/javascript">
                                                    alert('This task is complete, you can not change it');
                                                    window.location = '../controller/UserAssignTasksController.php';
                                                </script>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Owner</th>
    								<td> <a href="#" title="<?= $task->ownerUsername?>"><span onclick="viewUser(<?= $task->ownerId?>)"><?= $task->ownerUsername?></span></a></td>
                                </tr>
                                <tr>
                                    <th scope="row">Start date</th>
                                    <td><?= (!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->startDate))) ?>
                                     <div class="form-group"> 
                                        <input class="form-control" type="date" name="start_date" id="startdate">
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">End date</th>
                                    <td><?= (!strtotime($task->endDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->endDate))) ?>
                                     <div class="form-group"> 
                                        <input class="form-control" type="date" name="end_date" id="enddate">
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
						<input type="hidden" name="task_id" value="<?= $task->id ?>" >
                        <div class="text-right">
                             <input type="submit" name="submit" class="btn btn-primary" value="Update">         
                        </div>
                    </form>

                </div><!-- class="col-xs-12" -->

            </div> <!-- class="row" -->
        </div> <!-- id="homepage-panel" -->
    </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

