<?php 
  include "inc/header.php";
  
  // header('Cache-Control: no cache'); //no cache
  // session_cache_limiter('private_no_expire'); // works
  //session_cache_limiter('public'); // works too
 // session_start();
  
  
  //session_start();
  if(!isset($_SESSION['user'])){
  	header('Location:../view/index.php');
  }
  
?>


<body>

	<?php if(isset($message)){?>
	
	<div  class="<?=$class ?>" style="margin-top:60px;"><?=$message ?></div>
	
	<?php }?>
      <!-- Fixed navbar -->
	<?php include "inc/nav.php";  ?>
  <section id="content" role="main" class="container">

		<div id="homepage-panel">

				<div class="row">

					<div class="col-md-10">
						<h3>My Open Tasks</h3>
						<table class="table table-responsive table-bordered">
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
				             <?php if(isset($openTasks) && $openTasks){
				             	foreach ($openTasks as $task){ ?>

				             	<?php //var_dump($task); ?>
								<tr>
									<td><?=$task['task_id']?></td>
									<td><?=$task['title']?></td>
									<td>
										<?php if ($task['type'] == "Bug"): ?>
											<img src="../view/images/bug.png" alt="Bug">
										<?php endif ?>
										<?php if ($task['type'] == "Enhancement"): ?>
											<img src="../view/images/epic.png" alt="Enhancement">
										<?php endif ?>
										<?php if ($task['type'] == "Task"): ?>
											<img src="../view/images/task.png" alt="Task">
										<?php endif ?>
										<?=$task['type']?>
									</td>
									<td><?php echo $task['priority']?>
										<?php if ($task['priority'] == "Low"): ?>
											<img src="../view/images/low.png" alt="Low">
										<?php endif ?>
										<?php if ($task['priority'] == "Medium"): ?>
											<img src="../view/images/medium.png" alt="Medium">
										<?php endif ?>
										<?php if ($task['priority'] == "High"): ?>
											<img src="../view/images/high.png" alt="High">
										<?php endif ?>
									</td>
									<td><?=(empty($task['start_date']) ? "<em style='color:red;'>Not set</em>" : $task['start_date'])?></td>
			              			<td><?=(empty($task['end_date']) ? "<em style='color:red;'>Not set</em>" : $task['end_date'])?></td>
									<td>
										<div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task['progress']?>">
										<div class="progress-bar progress"></div>	  
										</div>
										<p class="progress_perc" ><?=$task['progress']?>%</p>
					                </td>
									<td><?=$task['project']?></td>
								</tr>
								 <?php }
					          	}else{ ?>
								      	<tr>
								      	<td colspan="9" style="text-align: center;"><em><strong>No results found.</strong></em></td>
								      	</tr>
								<?php }?>
					          </tbody>
						</table>

						<h3>My Working On Tasks</h3>
							<table class="table table-responsive table-bordered">
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
				             <?php if(isset($workingOnTasks) && $workingOnTasks){
				             	foreach ($workingOnTasks as $task){ ?>

				             	<?php //var_dump($task); ?>
								<tr>
									<td><?=$task['task_id']?></td>
									<td><?=$task['title']?></td>
									<td>
										<?php if ($task['type'] == "Bug"): ?>
											<img src="../view/images/bug.png" alt="Bug">
										<?php endif ?>
										<?php if ($task['type'] == "Enhancement"): ?>
											<img src="../view/images/epic.png" alt="Enhancement">
										<?php endif ?>
										<?php if ($task['type'] == "Task"): ?>
											<img src="../view/images/task.png" alt="Task">
										<?php endif ?>

										<?=$task['type']?>
									</td>
									<td><?=$task['priority']?>
										<?php if ($task['priority'] == "Low"): ?>
											<img src="../view/images/low.png" alt="Low">
										<?php endif ?>
										<?php if ($task['priority'] == "Medium"): ?>
											<img src="../view/images/medium.png" alt="Medium">
										<?php endif ?>
										<?php if ($task['priority'] == "High"): ?>
											<img src="../view/images/high.png" alt="High">
										<?php endif ?>
									</td>
									<td><?=(empty($task['start_date']) ? "<em style='color:red;'>Not set</em>" : $task['start_date'])?></td>
			              			<td><?=(empty($task['end_date']) ? "<em style='color:red;'>Not set</em>" : $task['end_date'])?></td>
									<td>
										<div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task['progress']?>">
										<div class="progress-bar progress"></div>	  
										</div>
										<p class="progress_perc" ><?=$task['progress']?>%</p>
					                </td>
									<td><?=$task['project']?></td>
								</tr>
								 <?php }
					          	}else{ ?>
								      	<tr>
								      	<td colspan="9" style="text-align: center;"><em><strong>No results found.</strong></em></td>
								      	</tr>
								<?php }?>
					          </tbody>
						</table>


					</div><!-- /.blog-main -->

					<aside class="col-md-2 sidebar">
						<div class="bg-info">
							<h3 class="text-center">My projects</h3>
							<ul>
				             <?php if(isset($workingOnTasks) && $workingOnTasks) 
				             	foreach ($workingOnTasks as $task): ?>
							  <li onclick="viewProject(<?=$task['project']?>)"><a href="#"><?=$task['project']?></a></li>
							<?php endforeach ?>
							</ul>

							

						</div>
						<div class="bg-info">
							<h3 class="text-center">Users</h3>

						</div>
					<aside><!-- /.blog-sidebar -->

				</div><!-- /.row -->
		</div>

 
   </section><!-- /.container -->


<?php include "inc/footer.php"; ?>
