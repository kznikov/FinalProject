<?php 
  $pageTitle="Welcome to JIRA";
  include "inc/header.php"; 
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
          <a class="navbar-brand" href="#"><img src="images/aui-header-logo-jira.png" alt=""></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User name <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="#">Logout</a></li>
			</ul>
			</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
   <section id="content" role="main" class="container">
     <div id="register-panel">
        <div class="create-header text-center">
           <h1>Welcome!</h1>
           <p>Choose an option below to get started.</p>
        </div>
        <hr>
        <div class="row">
        <div class="nextstep col-xs-12 col-md-6">
        
          <div class="col-xs-12 col-md-4">
            <div class="icon-image text-center">
              <span class="glyphicon glyphicon-search"></span>
            </div>  
          </div>
          <div class="col-xs-12 col-md-8">   
              <h2>See the projects</h2>
              <p>Go to the dahboard and explore a project.</p>
              <button type="button" onclick="location.href = 'homepage.php';" class="btn btn-primary">Go to the dahboard</button>
          </div>
        </div>
        <div class="nextstep col-xs-12 col-md-6">
        
          <div class="col-xs-12 col-md-4">
            <div class="icon-image text-center">
              <span class="glyphicon glyphicon-pencil"></span>
            </div>  
          </div>
          <div class="col-xs-12 col-md-8">   
              <h2>Create a project</h2>
              <p>Get stuck in and create your first project in JIRA.</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create a new project</button>
          </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Create project</h4>
            </div>
            <div class="modal-body">
              
            <form id="create-project" action="" method="">
              <fieldset>
                <div class="form-group">
                  <label for="projectname">Name</label>
                  <input type="text" id="projectname" class="form-control" placeholder="Project name">
                </div>
                <div class="form-group"> 
                  <label for="selectlead">Project lead</label>

                  <!-- взима данни от таблицата за регистрирани потребители -->
                  <select id="selectlead" class="form-control">
                    <option>Choose</option> 
                    <option>Name1</option>
                    <option>Name2</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="clientname">Client</label>
                  <input type="text" id="clientname" class="form-control" placeholder="Client name">
                </div>
                <div class="form-group"> 
                  <label for="selectusers">Users</label>

                  <!-- взима данни от таблицата за регистрирани потребители -->
                  <select id="selectusers" class="form-control">
                    <option>Choose</option> 
                    <option>Name1</option>
                    <option>Name2</option>
                  </select>
                </div>
                <hr>
                <div class="form-group">
                  <label for="prefix">Prefix</label>
                  <input type="text" id="prefix" style='text-transform:uppercase' class="form-control" maxlength="3" placeholder="Enter prefix">
                </div>

                <div class="form-group"> 
                  <label for="status">Status</label>

                  <!-- взима данни от таблицата за регистрирани потребители -->
                  <select id="status" class="form-control">
                    <option>Choose</option> 
                    <option>Suspended</option>
                    <option>Closed</option>
                    <option>Deleted</option>
                    <option>Chardge item</option>
                  </select>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Chargeable
                  </label>
                </div>

                <hr>

                <div class="form-group">
                   <div class='input-group date'>
                      <label for="startdate">Start Date</label>
                      <input it="startdate" type="date" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                   <div class='input-group date'>
                      <label for="enddate">End Date</label>
                      <input it="enddate" type="date" class="form-control" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </fieldset>
            </form>


            </div>
          </div>
        </div>
      </div>
 
         
        </div> <!-- class="nextstep" -->
     </div> <!-- id="register-panel" -->
   </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

   