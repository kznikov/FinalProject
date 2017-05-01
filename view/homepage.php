<?php
include "inc/header.php";

if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}
?>


<body>

    <!-- Fixed navbar -->
    <?php include "inc/nav.php"; ?>
    <section id="content" role="main" class="container">

        <div id="homepage-panel">

            <div class="row">

                <div class="col-md-10">
                     <?php if (isset($_SESSION['message']) && isset($_SESSION['message_class'])) { ?>
			
			        <div  class="<?= $_SESSION['message_class']?>" style="margin-top:0px;"><?= $_SESSION['message']?></div>
					<?php
					unset($_SESSION['message']);
					unset($_SESSION['message_class']);
						}?>
                    <h3>My Open Tasks</h3>
                    <div class="search-input">
                        <input type="text" id="search" class="form-control" placeholder="Type to search">
                    </div>
                    <div style="height: 100%; max-height: 500px; overflow-y: scroll; margin-top: 20px;">
                    <table id="userlist" class="table table-responsive table-bordered">
                        <thead style="background-color: #205081; color: #fff;">
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Priority</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Progress</th>
                                <th>Project</th>
                            </tr>
                        </thead>
                        <tbody>
								<?php if (isset($openTasks) && $openTasks) {
								    foreach ($openTasks as $task) {
								        ?>

                                    <?php //var_dump($task); ?>
                                    <tr  class="myproject-name" onclick="location.href = '../controller/ViewTaskController.php?name=<?= $task->id ?> ';">
                                        <td><?= $task->prefixId ?></td>
                                        <td><?= $task->title?></td>
                                        <td><img style="width: 20px; margin-right: 5px;" src="../view/images/type_<?= $task->type?>.png"><?= $task->type?></td>
                                        <td><?= $task->priority?><img style="width: 30px; margin-left: 0px;" src="../view/images/priority_<?= $task->priority?>.png"></td>
                                         <td><?= (!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->startDate))) ?></td>
                               			 <td><?= (!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->endDate))) ?></td>
                                        <td>
                                            <div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task->progress?>">
                                                <div class="progress-bar progress"></div>	  
                                            </div>
                                            <p class="progress_perc" ><?= $task->progress ?>%</p>
                                        </td>
                                   		 <td><a href="#" title="<?= $task->projectName ?>"><span onclick="viewProject('<?= $task->projectName?>')"><?= $task->projectName?></span></a></td>
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

                    <h3>My Working On Tasks</h3>
                    <div style="height: 100%; max-height: 500px; overflow-y: scroll; margin-top: 20px;">
                    <table id="userlist" class="table table-responsive table-bordered">
                        <thead style="background-color: #205081; color: #fff;">
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Priority</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Progress</th>
                                <th>Project</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($workingOnTasks) && $workingOnTasks) {
                                foreach ($workingOnTasks as $task) {
                                    ?>

                                    <?php //var_dump($task); ?>
                                    <tr  class="myproject-name" onclick="location.href = '../controller/ViewTaskController.php?name=<?= $task->id ?> ';">
                                        <td><?= $task->prefixId ?></td>
                                        <td><?= $task->title ?></td>
                                        <td><img style="width: 20px; margin-right: 5px;" src="../view/images/type_<?= $task->type ?>.png"><?= $task->type ?></td>
                                        <td><?= $task->priority ?><img style="width: 30px; margin-left: 0px;" src="../view/images/priority_<?= $task->priority?>.png"></td>
                                         <td><?= (!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->startDate))) ?></td>
                               			 <td><?= (!strtotime($task->startDate) ? "<em style='color:red;'>Not set</em>" : date("d/m/Y",strtotime($task->endDate))) ?></td>
                                        <td>
                                            <div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task->progress ?>">
                                                <div class="progress-bar progress"></div>	  
                                            </div>
                                            <p class="progress_perc" ><?= $task->progress ?>%</p>
                                        </td>
                                   		 <td><a href="#" title="<?= $task->projectName ?>"><span onclick="viewProject('<?= $task->projectName?>')"><?= $task->projectName?></span></a></td>
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


                </div><!-- /.blog-main -->

                <aside class="col-md-2 sidebar">
                    <div class="bg-info">
                        <h3 class="text-center">My projects</h3>
                        <p id="sub_header" class="text-center">(Last Created)</p>
                        <ul class="home_page_lists">
                            <?php if (isset($lastProjects) && $lastProjects)
                            	foreach ($lastProjects as $project){
                                    ?>
                                    <li onclick="location.href = '../controller/ViewProjectController.php?project=<?= $project->name?> ';">
                                    <img id="home_page_project_icons" src="/FinalProject/view/images/project_status_<?=$project->status ?>.png"> <a href="#"><?= $project->name ?></a></li>
  							  <?php }?>
                        </ul>
                    </div>
                    <div class="bg-info">
                        <h3 class="text-center">Online Users</h3>
                        <ul class="home_page_lists">
                             <?php
                             if(isset($onlineUsers) && $onlineUsers){
                             	foreach ($onlineUsers as $user){
                                    ?>
                                     <li onclick="location.href = '../controller/ViewUserController.php?user=<?= $user->id ?> ';">
                                    	<img id="home_page_project_icons" src="/FinalProject/view/images/online_user.ico"> <a href="#"><?= $user->username ?></a>
                                    </li>
  							  <?php }
  							  }?>
                        </ul>

                    </div>
                    <aside><!-- /.blog-sidebar -->

                        </div><!-- /.row -->
                        </div>


                        </section><!-- /.container -->


<?php include "inc/footer.php"; ?>
