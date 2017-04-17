<?php 
  $pageTitle="Forgot password";
  include "inc/header.php"; 
?>

<body>
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
         <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="images/aui-header-logo-jira.png" alt=""></a>
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
        <div class="login-body">
           <form>
              <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" class="form-control" id="username" placeholder="Email">
              </div>
              <button type="submit" class="btn btn-primary">Email</button>
           </form>
           <hr>
           <div class="login-footer">
              <a href="./index.php" class="aui-button aui-button-link">Return to log in page</a>
           </div>
        </div>
     </div>
   </section><!-- /.container -->

<?php include "inc/footer.php"; ?>

   