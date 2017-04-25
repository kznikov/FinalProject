<?php 
  $pageTitle="All projects";
  include "inc/header.php"; 
  

  if(!isset($_SESSION['user'])){
  	header('Location:../view/index.php');
  }
?>

<body>
   
   <?php include "inc/nav.php";  ?>

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

        <table class=" myproject-table table table-responsive table-bordered">
          <thead style="background-color: #205081; color: #fff;">
            <tr>
              <th>Name</th>
              <th>Admin</th>
              <th>Open tasks</th>
              <th>All tasks</th>
              <th>Client</th>
              <th>Status</th>
              <th>Progress</th>
              <th>Action</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
             <?php if(isset($allProjects) && $allProjects){
             	
             	foreach ($allProjects as $project){ ?>
			            <tr>
			              <td><?= $project['name']?></td>
			              <td><a href="#"><span onclick="viewUser(<?= $project['admin_id']?>)"><?= $project['username']?></span></a></td>
			              <td><?= $project['open_tasks']?></td>
			              <td><?= $project['all_tasks']?></td>
			              <td><?= ($project['client'] == null ? "" : $project['client'])?></td>
			              <td><?= $project['status']?></td>
			              <td><?php if($project['avg_tasks_progress'] == null){
			              				echo "<em>No tasks found.</em>";
			              			}else{?>
			              			
			              			<div class="progress-wrap progress" data-progress-percent="<?= $project['avg_tasks_progress']?>">
									  <div class="progress-bar progress"></div>
									  
									</div>
									<p class="progress_perc" ><?=$project['avg_tasks_progress']?>%</p>
			             			<?php }?>
			              </td>
			              <td class="text-center">
			                <a href="#"><span class="glyphicon glyphicon-eye-open" title="View"></span></a>
			                <a href="#"><span class="glyphicon glyphicon-cog" title="Edit"></span></a>
			                <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"></span></a>
			              </td>
			              <td lass="text-center">

			                <a href="mailto:
                      <?php if (isset($project['user_email'])) {echo $project['user_email'];} ?>"><span class="glyphicon glyphicon-envelope"></span></a>

			              </td>
			            </tr>
			      <?php }
          	}else{ ?>
			      	<tr>
			      	<td colspan="9" style="text-align: center;"><em><strong>No results found.</strong></em></td>
			      	</tr>
			<?php }?>
          </tbody>
        </table>
        <div class="bg-success">
          <p>Export as word, exel, pdf</p>
        </div>

       

      </div> <!-- class="row" -->
    </div>
   </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

   