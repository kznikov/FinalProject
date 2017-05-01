<?php
$pageTitle = "Project: " . $projectInfo->name;
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
                <div class="myproject-header">
                    <div class="myproject-title col-xs-12 col-md-10">
                        <h2><img style="width: 40px; margin-right: 5px;" src="../view/images/project_status_<?= $projectInfo->status ?>.png"> Project: <?=$projectInfo->name ?></h2>
                    </div>
                    <div style="margin:0px;" class="myproject-button col-xs-12 col-md-2">
                        <button onclick="location.href = '../controller/MyProjectsController.php';" class="btn btn-primary">Back</button>
                    </div>
                </div>
            </div>
            <div class="row">
            <form action="../controller/EditProjectController.php" method="post" accept-charset="utf-8">
                <table id="viewproject" class="myproject-table table table-responsive table-bordered">
                    <tr>
                        <th>Name</th>
                        <td><?=$projectInfo->name ?></td>
                    </tr>
                    <tr>
                        <th >Prefix</th>
                        <td><?=$projectInfo->prefix; ?></td>
                    </tr>
                    <tr>
                        <th>Admin</th>
						<td><?= $projectInfo->adminUsername ?></td>
                    </tr>
                    <tr>
                        <th>Client</th>
                        <td><?= $projectInfo->client ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <div class="form-group"> 
                                <label class="control-label" for="status">Current status: <?= $projectInfo->status ?> </label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1">Open</option> 
                                    <option value="2">Suspended</option>
                                    <option value="3">Closed</option>
                                    <option value="4">Deleted</option>
                                </select>
                            </div>
                       </td>
                    </tr>
                    <tr>
                        <th>All tasks</th>
                        <td><?= $projectInfo->allTasks ?></td>
                    </tr>
                    <tr>
                        <th>Progress</th>
                        <td><?php
                        if ($projectInfo->progress == null) {
                                echo "<em>No tasks found.</em>";
                            } else {
                                ?>

                                <div class="progress-wrap progress" data-progress-percent="<?= $projectInfo->progress?>">
                                    <div class="progress-bar progress"></div>

                                </div>
                                <p class="progress_perc" ><?= $projectInfo->progress?>%</p>
						<?php } 

                            if ($projectInfo->progress == 100) {
                                ?>
                                <script type="text/javascript">
                                    alert('This project is complete, you can not change it');
                                    window.location = '../controller/MyProjectsController.php';
                                </script>
                                <?php
                            }

                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>
                             <div class="col-xs-12 col-md-2">
                                <label class="control-label" for="startdate">Current: <?= ($projectInfo->startDate == '0000-00-00' ||  $projectInfo->startDate == null ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($projectInfo->startDate))) ?></label>
                            </div>
                            <div class="col-xs-12">
                            <input class="form-control" type="date" name="start_date" id="startdate">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>End Date</th>
                        <td>
                            <div class="col-xs-12 col-md-2">
                                <label class="control-label" for="enddate">Current: <?= ($projectInfo->endDate== '0000-00-00' ||  $projectInfo->startDate == null ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($projectInfo->endDate))) ?></label>
                            </div>
                            <div class="col-xs-12">
                            <input class="form-control" type="date" name="end_date" id="enddate">
                            </div>

                       </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <a href="mailto:<?php if (isset($projectInfo->adminEmail)) {
                            	$projectInfo->adminEmail;
						} ?>"><span class="glyphicon glyphicon-envelope"></span></a>
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="project_name" value="<?= $projectInfo->name ?>" >
                <div class="text-right">
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">                    
                </div>

            </form>
        </div> <!-- class="row" -->


    </div>
</section><!-- /.container -->


<?php include "inc/footer.php"; ?>

