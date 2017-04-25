<?php 
  $pageTitle="Charge";
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
               <h2>Roles</h2>
            </div>
            <div class="myproject-button col-xs-12 col-md-2">
               <button onclick="location.href = 'createtask.php';" class="btn btn-primary">Create  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
         </div>
      </div>
      <!-- class="row" -->
   </div>
</section>
<!-- /.container -->
<?php include "inc/footer.php"; ?>

   