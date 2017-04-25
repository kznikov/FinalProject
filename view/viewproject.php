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
            <h2>Project: <?php echo $infoProject['name']; ?></h2>

          </div>
          <div class="myproject-button col-xs-12 col-md-2">
             <button onclick="location.href = '../controller/MyProjectsController.php';" class="btn btn-primary">Back</button>
          </div>
        </div>
      </div>
       <div class="row">  
        <table id="userlist" class="myproject-table table table-responsive table-bordered">
          <thead style="background-color: #205081; color: #fff;">
            <tr>
              <th>Name</th>
              <th>Admin</th>
              <th>Client</th>
              <th>Status</th>
              <th>All tasks</th>
              <th>Progress</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $infoProject['name']; ?></td>
              <td><?php echo $result['firstname'] . " " . $result['lastname']; ?></td>
              <td><?php echo $infoProject['client']; ?></td>
              <td><?php echo $infoProject['status']; ?></td>
              <td><?php echo $infoProject['all_tasks']; ?></td>
              <td><?php echo $infoProject['progress']; ?></td>
              <td class="text-center">
                 <a href="mailto:<?=$infoProject['user_email'];?>"><span class="glyphicon glyphicon-envelope"></span></a>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="bg-success">
          <p>Export as word, exel, pdf</p>
        </div>

       

      </div> <!-- class="row" -->
    </div>
   </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

   