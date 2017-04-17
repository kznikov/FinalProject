<?php 
  $pageTitle="Login";
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
           <h1>Log in</h1>
        </div>
        <div class="login-body">
           <h2 class="login-heading">Use your <strong>JIRA</strong> account</h2>
           <form>
              <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" class="form-control" id="username" placeholder="Email">
              </div>
              <div class="form-group">
                 <label for="inputpassword">Password</label>
                 <input type="password" class="form-control" id="inputpassword" placeholder="Password">
              </div>
              <div class="checkbox">
                 <label>
                 <input type="checkbox"> Keep me logged in
                 </label>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary">Log in</button>
           </form>
           <div class="login-footer">
             <p><a href="./forgot.php" id="forgot" name="forgot">Unable to access your account?</a></p>
             <p><a href="./register.php">Create an account</a> </p>
           </div>
        </div>
     </div>
   </section><!-- /.container -->

<?php include "inc/footer.php"; ?>

   