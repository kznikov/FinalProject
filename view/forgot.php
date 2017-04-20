<?php 
  $pageTitle="Forgot password";
  include "inc/header.php"; 
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
           <h2>Forgot password</h2>
        </div>
        <hr>
         <?php if(isset($successMessage) && $successMessage){?>
        <div class="aui-message error">
            <span class="aui-icon icon-error"></span>
            <span class="success" id="error-authentication_failure_invalid_credentials">The password was sent to your email!</span>
        </div>
        <?php }?>
        <div class="login-body">
           <form action="../controller/ForgotController.php" method="post">
              <div class="form-group">
                 <label for="email">Email</label>
                 <input type="text" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <input type="submit" class="btn btn-primary" name="submit" value="Send">
           </form>
           <hr>
           <div class="login-footer">
              <a href="/FinalProject/view/index.php" class="aui-button aui-button-link">Return to log in page</a>
           </div>
        </div>
     </div>
   </section><!-- /.container -->

<?php include "inc/footer.php"; ?>

   