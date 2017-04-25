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
								<tr>
									<td><?=$task['task_id']?></td>
									<td><?=$task['title']?></td>
									<td><?=$task['type']?></td>
									<td><?=$task['priority']?></td>
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
								<tr>
									<td><?=$task['task_id']?></td>
									<td><?=$task['title']?></td>
									<td><?=$task['type']?></td>
									<td><?=$task['priority']?></td>
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
							<h3>My projects</h3>

						</div>
						<div class="bg-info">
							<h3>Users</h3>

						</div>
					<aside><!-- /.blog-sidebar -->

				</div><!-- /.row -->
		</div>

 
   </section><!-- /.container -->


<?php include "inc/footer.php"; ?>
