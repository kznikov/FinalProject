<?php
$pageTitle = "All tasks";
include "inc/header.php";

if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}
?>

<body>
   
    <section id="content" role="main" class="container">
        <div id="homepage-panel">
            <div class="row">  
            
			    <?php include "inc/nav.php"; ?>
                    
                <div class="myproject-header">
                    <div class="myproject-title col-xs-12 col-md-10">
                        <h2>All tasks</h2>

                    </div>
                    <div class="myproject-button col-xs-12 col-md-2">
                        <button onclick="location.href = '/FinalProject/controller/CreateTaskController.php';" class="btn btn-primary">Create  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </div>
                </div>

                <div class="search-input">
                    <input type="text" id="search" class="form-control" placeholder="Type to search">
                </div>
                <div style="height: 100%; max-height: 500px; overflow-y: scroll; margin-top: 20px;">
                <table id="userlist" class="myproject-table table table-responsive table-bordered">
                    <thead style="background-color: #205081; color: #fff;">
                        <tr>
                            <th class="username">id <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Title <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Owner <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Type <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Start date <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">End date <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Status <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Priority <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th style="width: 190px;">Progress</th>
                            <th class="username">Project <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
					<tbody id="alltasks_tbody">
                    <?php if (isset($allTasks) && $allTasks) {
                        foreach ($allTasks as $task) {
                            ?>
                              <tr class="myproject-name" onclick="location.href = '../controller/ViewTaskController.php?name=<?= $task->id ?> ';">
                                <td><?= $task->prefixId?></td>
                                <td><?= $task->title ?></td>
								<td><a title="<?= $task->ownerUsername ?>"><span onclick="viewUser(<?= $task->ownerId?>)"><?= $task->ownerUsername?></span></a></td>
                                <td><img style="width: 20px; margin-right: 5px;" src="../view/images/type_<?= $task->type ?>.png"><?= $task->type?></td>
                                <td><?= (!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->startDate))) ?></td>
                                <td><?= (!strtotime($task->endDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->endDate))) ?></td>
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
                                    <a href="/FinalProject/controller/ViewEditTaskController.php?name=<?=$task->id ?>"><span class="glyphicon glyphicon-cog" title="Edit"></span></a>
                                     <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"  onclick="deleteTask(<?=$task->id ?>, 1)"></span></a>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        ?>
                        <tr>
                            <td colspan="11" style="text-align: center;"><em><strong>No results found.</strong></em></td>
                        </tr>
					<?php } ?>
                    </tbody>
                </table>
                </div>
                <div class="bg-success">
                    <p>Export as word, exel, pdf</p>
                </div>



            </div> <!-- class="row" -->
        </div>
    </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

