<?php 
  $pageTitle="Project: " . $infoProject['name'];
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
            <h2><img style="width: 40px; margin-right: 5px;" src="../view/images/project_status_<?=$infoProject['project_status_id']?>.png"> Project: <?php echo $infoProject['name']; ?></h2>
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
              <td><?php echo $infoProject['name']; ?></td>
            </tr>
            <tr>
              <th >Prefix</th>
              <td><?php echo $infoProject['prefix']; ?></td>
            </tr>
            <tr>
              <th>Admin</th>
              <td><?php echo $infoProject['username']; ?></td>
            </tr>
             <tr>
              <th>Client</th>
              <td><?php echo $infoProject['client']; ?></td>
            </tr>
             <tr>
              <th>Status</th>
              <td><?php echo $infoProject['status']; ?></td>
            </tr>
             <tr>
              <th>All tasks</th>
              <td><?php echo $infoProject['all_tasks']; ?></td>
            </tr>
            <tr>
              <th>Progress</th>
              <td><?php if($infoProject['avg_tasks_progress'] == null){
              				echo "<em>No tasks found.</em>";
              			}else{?>
              			
              	  <div class="progress-wrap progress" data-progress-percent="<?= $infoProject['avg_tasks_progress']?>">
				  <div class="progress-bar progress"></div>
				  
				</div>
				<p class="progress_perc" ><?=$infoProject['avg_tasks_progress']?>%</p>
             			<?php }?>
              </td>
            </tr>
             <tr>
              <th>Start Date</th>
              <td><?=($infoProject['start_date'] == '0000-00-00' ? "<em style='color:red;'>Not set</em>" : $infoProject['start_date'])?></td>
            </tr>
             <tr>
              <th>End Date</th>
			  <td><?=($infoProject['end_date'] == '0000-00-00'? "<em style='color:red;'>Not set</em>" : $infoProject['end_date'])?></td>
            </tr>
            <tr>
              <th>Email</th>
             <td>
                 <a href="mailto:<?php if(isset($infoProject['user_email'])){$infoProject['user_email'];}?>"><span class="glyphicon glyphicon-envelope"></span></a>
              </td>
            </tr>
        </table>
        
   
        <table id="assoc_userlist"  style="width: 57%; float:left; margin-left:3%;" class="myproject-table table table-responsive table-bordered">
          <thead style="background-color: #205081; color: #fff;">
         	 <tr>
		      	<td colspan="9" style="text-align: center;"><em><strong>Users associated to <?=$infoProject['name']; ?></strong></em></td>
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
          <tbody>
          	
	          <?php 
	          if(isset($users) && $users){
		          foreach ($users as $user){ ?>
		           
		            <tr>
		              <td class="text-center">
		                       
		                <?php if ($user['avatar'] != NULL) {
		                ?>
		                 <img id="avatar" class="img-thumbnail" style="width: 70px;" src="../view/uploaded/<?php echo $user['avatar']; ?>" alt="avatar">
		                <?php  
		                } else {
		
		                 ?>
		                  <img id="avatar" style="width: 70px;" src="../view/images/add-avatar_2.png" alt="avatar">
		                <?php 
		                } 
		
		              ?>    
		             
		              </td>
		              <td><?php echo $user['firstname'] . " " .  $user['lastname'];  ?></td>
		              <td><?php echo $user['username'] ;  ?></td>
		              <td><?php echo $user['email'] ;  ?></td>
		              <td>
		                <p>Application Manager</p>
		                <p>Developer</p>
		                <p>Project Manager</p>
		              </td>
		              <td class="text-center"> 
		                
		                <a href="#"><span class="glyphicon glyphicon-eye-open" title="View" onclick="viewUser(<?php echo $user['id']; ?>)"></span>
		                </a>
		
		                <a href="#"><span class="glyphicon glyphicon-cog" title="Edit" onclick="editUser(<?php echo $user['id']; ?>)"></span></a>
		                <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"  onclick="deleteUser(<?php echo $user['id'] ?>)"></span></a>
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
         </div>  
        <div class="bg-success">
          <p>Export as word, exel, pdf</p>
        </div>

       

      </div> <!-- class="row" -->
      
      
    </div>
   </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

   