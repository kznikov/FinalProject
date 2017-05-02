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
                <table id="viewproject" style="width: 40%; float:left;" class="myproject-table table table-responsive table-bordered">
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
						<td> <a href="#" title="<?= $projectInfo->adminUsername?>"><span onclick="viewUser(<?= $projectInfo->adminId ?>)"><?= $projectInfo->adminUsername ?></span></a></td>
                    </tr>
                    <tr>
                        <th>Client</th>
                        <td><?= $projectInfo->client ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= $projectInfo->status ?></td>
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
						<?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td><?= ($projectInfo->startDate == '0000-00-00' ||  $projectInfo->startDate == null ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($projectInfo->startDate))) ?></td>
                    </tr>
                    <tr>
                        <th>End Date</th>
                        <td><?= ($projectInfo->endDate== '0000-00-00' ||  $projectInfo->startDate == null ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($projectInfo->endDate))) ?></td>
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
                

              <?php if($userRole == 1 || $userRole == 2){?>
                <form id="add-user" name="add-project-user" action="/FinalProject/controller/AdduserToProject.php" method="post" accept-charset="utf-8">


                    <table id="add_user" style="width: 57%; float:left; margin-left:3%;" class="myproject-table table table-responsive table-bordered">
                        <thead style="background-color: #205081; color: #fff;">
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
	                        <td>
	                          <input id="search-box" autocomplete="off" class="form-control txt-auto" type="text" name="username" placeholder="Username">
	                       		<input type="hidden" value="<?= $_GET['project'] ?>">
	                       	<div id="suggesstion-box" style='z-index:123'></div>
	                       	<p id="user-exist" style="color:red;font-size:0.8em;margin:0px;"></p>
	                        </td>
	                        <td>
	                            <select class="form-control" id="role"  name="role">
	                            	  <option disabled="disabled" selected="selected">Please choose role</option> 
	                                  <option value="4">Developer</option>
	                                  <option value="3">QA</option>
	                                  <option value="2">Project Manager</option>
	                            </select>
	                        </td>
	                        <input type="hidden" name="projectId" value="<?= $projectInfo->id ?>"/>
	                        <td class="text-center">
	                            <input type="submit" class="btn btn-primary" name="submit" value="Add User">
	                        </td>
	                     </tr>
                        </tbody>
                    </table>
                </form>
                <?php }?>
                


				<div id="re" style="width: 57%; float:left; margin-left:3%;">
                <table id="assoc_userlist"   class="myproject-table table table-responsive table-bordered">
                    <thead  style="background-color: #205081; color: #fff;">
                        <tr>
                            <td colspan="9" style="text-align: center;"><em><strong>Users associated to <?= $projectInfo->name ?></strong></em></td>
                        </tr>
                        <tr>
                            <th>Avatar</th>
                            <th class="name_assoc_userlist">Name <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username_assoc_userlist">Username  <span class="glyphicon glyphicon-resize-vertical"></th>
                            <th class="email_assoc_userlist">Email <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th>Role</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody id="assoc-user-tbody">

						<?php
						if (isset($users) && $users) {
							foreach ($users as $user) {
						        ?>

                                <tr>
                                    <td class="text-center">

                                        <?php if ($user['avatar'] != NULL) {
                                            ?>
                                            <img id="avatar" class="img-thumbnail" style="width: 70px;" src="../view/uploaded/<?= $user['avatar'] ?>" alt="avatar">
                                            <?php
                                        } else {
                                            ?>
                                            <img id="avatar" style="width: 70px;" src="../view/images/add-avatar_2.png" alt="avatar">
					            <?php
					        }
					        ?>    

                                    </td>
                                    <td><?=  $user['firstname'] . " " . $user['lastname'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['role'] ?></td>
                                    <td class="text-center"> 
                                        <a href="#"><span class="glyphicon glyphicon-eye-open" title="View" onclick="viewUser(<?= $user['id'] ?>)"></span>
                                        </a>
                                       <a href="#"><span class="glyphicon glyphicon-cog" title="Edit" onclick="editUser(<?= $user['id']?>)"></span></a>
                                       <?php if($userRole == 1 || $userRole == 2){?>
	                                       <?php if($projectInfo->adminId !== $user['id']){?>
	                                        <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"  onclick="deleteUser(<?= $user['id']?>, <?= $projectInfo->id ?>, <?= $user['roles_id']?>)"></span></a>
	                                  		<?php }?>
										<?php } ?>
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
                <table id="priority_legend">
                    <tr>
                        <td><div class="priority_legend" style="background-color:#53ff1a"></div>Low</td>
                        <td><div class="priority_legend" style="background-color:#ffff1a"></div>Medium</td>
                        <td><div class="priority_legend" style="background-color:#ffbf00"></div>High</td>
                        <td><div class="priority_legend" style="background-color:red;"></div>Escalated</td>
                    </tr>
                </table>
                <div id="board">
                    <ul class="tasks_board">
                        <li>To Do</li>
						<?php if (isset($toDoTasks) && $toDoTasks) {
						    foreach ($toDoTasks as $task) {
						        ?>
                                <li class="board_note" style="background-color:<?= $colors[$task->priority] ?>" onclick="location.href = '../controller/ViewTaskController.php?name=<?= $task->id ?> ';">
                                    <ul>
                                        <li style="font-size: 1.3em;"><em><?= $task->title?></em></li>
                                        <li><?= $task->status?></li>
                                    </ul>
                                    <ul>
                                        <li><img style="width: 20px; margin-right: 5px;" src="../view/images/type_<?= $task->type ?>.png"><?= $task->type?></li>
                                    </ul>
                                    <ul style="clear: both;width: 50%">
                                        <li>
                                            <div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task->progress?>">
                                                <div class="progress-bar progress"></div>	  
                                            </div>
                                            <p class="progress_perc" ><?= $task->progress?>%</p>
                                        </li>
                                    </ul>
                                </li>
						    <?php
						    }
						} else {
						    echo "<li style='text-align:center'><em><strong>No tasks found.</strong></em></li>";
						}
						?>

                    </ul>
                    <ul class="tasks_board">
                        <li>Working On</li>
					<?php if (isset($workingOnTasks) && $workingOnTasks) {
					    foreach ($workingOnTasks as $task) {
					        ?>
                                <li class="board_note" style="background-color:<?= $colors[$task->priority] ?>" onclick="location.href = '../controller/ViewTaskController.php?name=<?= $task->id ?> ';">
                                    <ul>
                                        <li style="font-size: 1.3em;"><em><?= $task->title ?></em></li>
                                        <li><?= $task->status ?></li>
                                    </ul>
                                    <ul>
                                        <li><img style="width: 20px; margin-right: 5px;" src="../view/images/type_<?= $task->type ?>.png"><?= $task->type ?></li>
                                    </ul>
                                    <ul style="clear: both;width: 50%">
                                        <li>
                                            <div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task->progress ?>">
                                                <div class="progress-bar progress"></div>	  
                                            </div>
                                            <p class="progress_perc" ><?= $task->progress?>%</p>
                                        </li>
                                    </ul>
                                </li>
                            <?php
                            }
                        } else {
                            echo "<li style='text-align:center;'><em><strong>No tasks found.</strong></em></li>";
                        }
                        ?>

                    </ul>
                    <ul class="tasks_board">
                        <li>Done</li>
					<?php if (isset($doneTasks) && $doneTasks) {
					    foreach ($doneTasks as $task) {
					        ?>
                                <li class="board_note" style="background-color:<?= $colors[$task->priority] ?>" onclick="location.href = '../controller/ViewTaskController.php?name=<?= $task->id ?> ';">
                                    <ul>
                                        <li style="font-size: 1.3em;"><em><?= $task->title ?></em></li>
                                        <li><?= $task->status ?></li>
                                    </ul>
                                    <ul>
                                        <li><img style="width: 20px; margin-right: 5px;" src="../view/images/type_<?= $task->type ?>.png"><?= $task->type ?></li>
                                    </ul>
                                    <ul style="clear: both;width: 50%">
                                        <li> 			        			
                                            <div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task->progress ?>">
                                                <div class="progress-bar progress"></div>	  
                                            </div>
                                            <p class="progress_perc" ><?= $task->progress?>%</p>
                                        </li>
                                    </ul>
                                </li>
					    <?php
					    }
					} else {
					    echo "<li style='text-align:center;'><em><strong>No tasks found.</strong></em></li>";
					}
					?>

                    </ul>
                </div>
            </div>  
            <div class="bg-success">
                <p>Export as word, exel, pdf</p>
            </div>



        </div> <!-- class="row" -->


    </div>
</section><!-- /.container -->


<?php include "inc/footer.php"; ?>

