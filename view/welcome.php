<?php 
  $pageTitle="Welcome to JIRA";
  include "inc/header.php"; 
  
  
  if(!isset($_SESSION['user'])){
  	header('Location:../view/index.php');
  }
  
  $userData = json_decode($_SESSION['user'], true);
?>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="/FinalProject/view/images/aui-header-logo-jira.png" alt=""></a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $userData['lastname'].", ".$userData['firstname']." " ?><span class="caret"></span></a>
			<ul class="dropdown-menu">

				<li><a href="/FinalProject/controller/LogoutController.php">Logout</a></li>

			</ul>
			</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
   <section id="content" role="main" class="container">
     <div id="register-panel">
        <div class="register-header">
           <h2>Welcome to JIRA, <?= $userData['firstname']." ".$userData['lastname']." " ?></h2>
        </div>
        <hr>
        <div class="avatar-body">

        	<p>Let's get started! You'll need an avatar to help other users identify you in JIRA.</p>
           <?php if (isset($result) && $result) { ?>
              <ul class="result">
                  <?php
                  foreach ($result as $message) {
                      echo "<li>$message</li>";
                  }
                  ?>
              </ul>
          <?php } ?>

			<form enctype="multipart/form-data" id="jira-avatar" action="../controller/uploadController.php" method="post">

		        <div id="image-holder" class="col-md-3">
		          <img style="width: 150px;" src="/FinalProject/view/images/add-avatar_2.png" alt="avatar">
		
		        </div>

				<div class="form-group col-md-9" style="height: 200px;">
              <input type="hidden" name="MAX_FILE_SIZE" value="<?php if(isset($max)){echo $max;} ?>">
		        	<label for="image">File input</label>
		        	<input type="file" id="image" name="image">
		        	<p class="help-block">Please upload image.</p>
		   		 </div>
		   		 
				<div id="errors"></div>
				<div class="buttons-container text-right">
					<div class="buttons">	
						<input type="submit" name="upload" class="btn btn-primary" value="Next">
					</div>
				</div> <!-- class="buttons-container" --> 
        
			</form>
		

        </div> <!-- class="register-body" -->
     </div> <!-- id="register-panel" -->
   </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

   