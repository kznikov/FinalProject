<?php
$pageTitle = "Task: " . $task->prefixId;
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
            <div class="row">

                <div class="col-xs-12">
                    <div class="myproject-header">
                        <div class="myproject-title">
                            <div class="col-xs-12 col-md-5">
                                <h2>Tasks - <?=$task->prefixId ?></h2>
                            </div>
                            <div class="col-xs-12 col-md-7">
                                <ul class="nav nav-pills  text-right" role="tablist">
                                    <li role="presentation">
                                        <a href="#" title="Create" onclick="location.href = '../controller/CreateTaskController.php';">Create <span class="glyphicon glyphicon-tasks" title="Create"></span></a>
                                    </li>
                                  
                                    <?php if($userRole != 4 || $task->ownerId === $user_id){?>
                                    <li role="presentation">
                                        <a href="../controller/ViewEditTaskController.php?name=<?= $task->id?>" title="Edit">Edit <span class="glyphicon glyphicon-cog" title="Edit"></span></a>
                                    </li>
                                    <li role="presentation">
                                        <a onclick="deleteTask(<?= $task->id ?>, 2)"  title="Delete">Delete <span class="glyphicon glyphicon-trash" title="Delete"></span></a>
                                    </li>
                                </ul>
                                <?php }?>
                                  <div class="myproject-button col-xs-12">
                                    <button onclick="location.href = '../controller/UserAssignTasksController.php';" class="btn btn-primary">Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row">Project</th>
                                <td><?= $task->projectName?></td>
                            </tr>
                            <tr>
                                <th scope="row">Title</th>
                                <td><?= $task->title?></td>
                            </tr>
                            <tr>
                                <th scope="row">Description</th>
                               <td><?= $task->description?></td>
                            </tr>
                            <tr>
                                <th scope="row">Type</th>
                                <td><img style="width: 20px; margin-right:5px;" src="../view/images/type_<?= $task->type ?>.png"><?= $task->type ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Priority</th>
                                <td><?=$task->priority?><img style="width:30px; margin-left: 0px;" src="../view/images/priority_<?= $task->priority ?>.png"></td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td><?= $task->status?></td>
                            </tr>
                            <tr>
                                <th>Progress</th>
                                <td>
                                    <div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task->progress?>">
                                        <div class="progress-bar progress"></div>	  
                                    </div>
                                    <p class="progress_perc" ><?= $task->progress ?>%</p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Owner</th>
								<td> <a href="#" title="<?= $task->ownerUsername?>"><span onclick="viewUser(<?= $task->ownerId?>)"><?= $task->ownerUsername?></span></a></td>
                            </tr>
                            <tr>
                                <th scope="row">Start date</th>
                                <td><?= (!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->startDate))) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">End date</th>
                                <td><?= (!strtotime($task->endDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->endDate))) ?></td>
                            </tr>
                        </table>
                    </div>

                </div><!-- class="col-xs-12" -->

            </div> <!-- class="row" -->
            <div class="row">
                <form>
                    <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea name="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Send</button>
                </form>
            </div>
        </div> <!-- id="homepage-panel" -->
    </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

