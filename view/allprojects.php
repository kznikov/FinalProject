<?php 
  $pageTitle="All projects";
  include "inc/header.php"; 

  if(!isset($_SESSION['user'])){
  	header('Location:../view/index.php');
  }
  
?>

<body>

    <?php include "inc/nav.php"; ?>

    <section id="content" role="main" class="container">
        <div id="homepage-panel">
            <div class="row">          
                <div class="myproject-header">
                    <div class="myproject-title col-xs-12 col-md-10">
                        <h2>All projects</h2>

                    </div>
                    <div class="myproject-button col-xs-12 col-md-2">
                        <button onclick="location.href = '/FinalProject/view/newproject.php';" class="btn btn-primary">Create  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </div>
                </div>

                <div class="search-input">
                    <input type="text" id="search" class="form-control" placeholder="Type to search">
                </div>

                <div style="height: 100%; max-height: 500px; overflow-y: scroll; margin-top: 20px;">
                <table id="userlist" class="myproject-table table table-responsive table-bordered">
                    <thead style="background-color: #205081; color: #fff;">
                        <tr>
                            <th class="username">Name <span class="glyphicon glyphicon-resize-vertical"></th>
                            <th class="username">Admin <span class="glyphicon glyphicon-resize-vertical"></th>
                            <th class="username">Open tasks <span class="glyphicon glyphicon-resize-vertical"></th>
                            <th class="username">All tasks <span class="glyphicon glyphicon-resize-vertical"></th>
                            <th class="username">Client <span class="glyphicon glyphicon-resize-vertical"></th>
                            <th class="username">Status <span class="glyphicon glyphicon-resize-vertical"></th>
                            <th>Progress</th>
                            <th>Action</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($allProjects) && $allProjects) {
						
                            foreach ($allProjects as $project) {
                                ?>
                                <tr class="myproject-name" onclick="location.href = '../controller/ViewProjectController.php?project=<?= $project->name ?> ';">
                                    <td><?= $project->name ?></td>
                                    <td><a href="#"><span onclick="viewUser(<?= $project->adminId ?>)"><?= $project->adminUsername ?></span></a></td>
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
                                        <a href="#"><span class="glyphicon glyphicon-eye-open" onclick="location.href = '../controller/ViewProjectController.php?project=<?= $project->name ?> ';" title="View"></span></a>
                                           <?php 
                                           	//var_dump($allRoles);
                                           if($allRoles[$project->id] == 1 || $allRoles[$project->id] == 2){ ?>
				                                        <a href="#"><span class="glyphicon glyphicon-cog" onclick="location.href = '../controller/ViewEditProjectController.php?project=<?= $project->name ?> ';" title="Edit"></span></a>
				                                        <a href="#"><span class="glyphicon glyphicon-trash" onclick="deleteProject(<?= $project->id ?>)" title="Delete"></span></a>
                                   			<?php }?>
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

