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

                <div class="col-xs-12 col-md-8">
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
                                    <li role="presentation">
                                        <a href="#" title="Edit">Edit <span class="glyphicon glyphicon-cog" title="Edit"></span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" title="Delete">Delete <span class="glyphicon glyphicon-trash" title="Delete"></span></a>
                                    </li>
                                </ul>
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
                                <td><?= (!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : $task->startDate) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">End date</th>
                                <td><?= (!strtotime($task->endDate) ? "<em style='color:red;'>Not set</em>" : $task->endDate) ?></td>
                            </tr>
                        </table>
                    </div>

                </div><!-- class="col-xs-12 col-md-8" -->

                <div class="col-xs-12 col-md-4">

                    <div class="myproject-button col-xs-12">
                        <button onclick="location.href = '../controller/UserAssignTasksController.php';" class="btn btn-primary">Back</button>
                    </div>

                    <form enctype="multipart/form-data" id="jira-file" action="../controller/uploadController.php" method="post">

                        <div id="image-holder">
                            <img id="avatar" style="width: 150px;" src="/FinalProject/view/images/add-avatar_2.png" alt="avatar">

                        </div>

                        <div class="form-group ">
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?php if (isset($max)) {
						    echo $max;
						} ?>">
                            <label for="image">File input</label>
                            <input type="file" id="image" name="image">
                            <p class="help-block">Please upload file.</p>
                        </div>

                        <div id="errors"></div>
                        <div class="buttons-container text-right">
                            <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                        </div> <!-- class="buttons-container" --> 

                    </form>

                </div><!-- class="col-xs-12 col-md-4" -->



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

