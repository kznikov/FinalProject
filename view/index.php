<?php 
  $pageTitle="Login";
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
           <h1>Log in</h1>
        </div>
        <?php if(isset($errorMessage) && $errorMessage){?>
        <div class="aui-message error">
            <span class="aui-icon icon-error"></span>
            <span class="error" id="error-authentication_failure_invalid_credentials">Sorry, we didn&#x27;t recognize that username and password combination. Please double-check and try again.</span>
        </div>
        <?php }?>
        <div class="login-body">
           <h2 class="login-heading">Use your <strong>JIRA</strong> account</h2>

           <form action="../controller/LoginController.php" method="post">
              <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" class="form-control" id="username" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                 <label for="inputpassword">Password</label>
                 <input type="password" class="form-control" id="inputpassword" name="password" placeholder="Password">

              </div>
              <div class="checkbox">
                 <label>
                 <input type="checkbox"> Keep me logged in
                 </label>
              </div>
              <hr>
              <input type="submit" class="btn btn-primary" name="submit" value="Log in">
           </form>
           <div class="login-footer">
             <p><a href="/FinalProject/view/forgot.php" id="forgot" name="forgot">Unable to access your account?</a></p>
             <p><a href="/FinalProject/view/register.php">Create an account</a> </p>

           </div>
        </div>
     </div>
   </section><!-- /.container -->

<?php include "inc/footer.php"; ?>

   