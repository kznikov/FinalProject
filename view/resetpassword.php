<?php 
  $pageTitle="Forgot password";
  include "inc/header.php"; 
  
  
/*   if(!isset($_POST['e']) && !isset($_POST['t'])){
  	header('Location:../view/index.php');
  } */
  
  
?>

<body>
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
         <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="/FinalProject/view/images/aui-header-logo-jira.png" alt=""></a>
         </div>
      </div>
      <!--  class="container" -->
   </nav>
   <section id="content" role="main" class="container">
     <div id="login-panel">
        <div class="login-header">
           <h2>Reset password</h2>
        </div>
        <hr>
         <?php if(isset($successMessage) && $successMessage){?>
	        <div class="aui-message error">
	            <span class="aui-icon icon-error"></span>
	            <span class="success" id="error-authentication_failure_invalid_credentials">Your password was reset successfully.</span>
	        </div>
        <?php }
        if(isset($successMessage) && !$successMessage){ ?>
        	 <div class="aui-message error">
	            <span class="aui-icon icon-error"></span>
	            <span class="error" id="error-authentication_failure_invalid_credentials">Error while attempting to reset password.</span>
	        </div>
        <?php } ?>
        <div class="login-body">
           <form id="jira-setup-account" action="../controller/ResetController.php" method="post">
              <div class="form-group">
                 <label for="email">Password</label>
                 <input id="jira-setup-account-field-password" type="password" class="form-control"  name="password" placeholder="Enter a password" required="required">
              </div>
              <div class="form-group">
                 <label for="email">Re-type password</label>
                 <input id="jira-setup-account-field-retype-password" type="password" class="form-control"  name="repassword" placeholder="Re-type password" required="required">
              </div>
              <input type="hidden" name='e' value="<?=$_GET['e'] ?>">
              <input type="hidden" name='t' value="<?=$_GET['t'] ?>">
              <input type="submit" class="btn btn-primary" name="submit" value="Reset">
           </form>
           <hr>
           <div class="login-footer">
              <a href="/FinalProject/view/index.php" class="aui-button aui-button-link">Return to log in page</a>
           </div>
        </div>
     </div>
   </section><!-- /.container -->

<?php include "inc/footer.php"; ?>

   