<?php
$pageTitle = "My projects";
include "inc/header.php";

if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}

?>

<body>
    <!-- App Alert-->
    <div id="ajax_msg" class="alert alert-success"></div>
    <?php include "inc/nav.php"; ?>
    <?php
    if (isset($message)) {
        echo "<p style='margin-top: 70px;'>" . $message . "</p>";
        //die();
    }
    ?>

    <section id="content" role="main" class="container">
        <div id="homepage-panel">
            <div class="row">          
                <div class="myproject-header">
                    <div class="myproject-title col-xs-12 col-md-10">
                        <h2>My projects</h2>

                    </div>
                    <div class="myproject-button col-xs-12 col-md-2">
                        <button onclick="location.href = '../controller/NewProjectController.php';" class="btn btn-primary">Create  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
            <div class="row">  
                <div class="search-input">
                    <input type="text" id="search" class="form-control" placeholder="Type to search">
                </div>
            <div style="height: 100%; max-height: 500px; overflow-y: scroll; margin-top: 20px;">
              <table id="userlist" class="myproject-table table table-responsive table-bordered tablesorter">
                    <thead style="background-color: #205081; color: #fff;">
                        <tr>
                            <th class="username">Name <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Admin <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Open tasks <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">All tasks  <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Client <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Status  <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th>Progress</th>
                            <th>Action</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php if (isset($adminProjects) && $adminProjects) {
						    foreach ($adminProjects as $project) {
						        ?>
                                <tr >
                                    <td><?= $project->name?>
                                    </td>
                                    <td> <a href="#" title="<?= $project->adminUsername?>"><span onclick="viewUser(<?= $project->adminId ?>)"><?= $project->adminUsername ?></span></a></td>
                                    <td><?= $project->openTasks ?></td>
                                    <td><?= $project->allTasks ?></td>
                                    <td><?= ($project->client == null ? "" : $project->client) ?></td>
                                    <td><img style="width: 20px; margin-right: 5px;" src="../view/images/project_status_<?= $project->status ?>.png"><?= $project->status ?></td>
                                    <td><?php
                                if ($project->progress == null) {
                                    echo "<em>No tasks found.</em>";
                                } else {
                                    ?>
                                        <div class="progress-wrap progress" data-progress-percent="<?= $project->progress ?>">
											<div class="progress-bar progress"></div>
										</div>
										 <p class="progress_perc" ><?= $project->progress ?>%</p>
       							 <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="#"><span class="glyphicon glyphicon-eye-open" class="myproject-name" onclick="location.href = '../controller/ViewProjectController.php?project=<?= $project->name ?> ';" title="View"></span></a>
                                        <a href="#"><span class="glyphicon glyphicon-cog" onclick="location.href = '../controller/ViewEditProjectController.php?project=<?= $project->name ?> ';" title="Edit"></span></a>
                                        <a href="#"><span class="glyphicon glyphicon-trash" onclick="deleteProject(<?= $project->id ?>)" title="Delete"></span></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="mailto:<?= $project->adminEmail ?>"><span class="glyphicon glyphicon-envelope"></span></a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            ?>
                            <tr>
                                <td colspan="9" style="text-align: center;"><em><strong>No results found.</strong></em></td>
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

