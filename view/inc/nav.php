<?php 

	$userData = json_decode($_SESSION['user'], true);
	
?>

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
          <ul class="nav navbar-nav">
            <li class="active"><a href="/FinalProject/view/homepage.php">Home</a></li>
            <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/FinalProject/view/myproject.php">My projects</a></li>
          <li><a href="/FinalProject/view/allprojects.php">All projects</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="/FinalProject/view/newproject.php">Create project</a></li>
        </ul>
      </li>
            <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tasks <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/FinalProject/view/mytasks.php">My tasks</a></li>
          <li><a href="/FinalProject/view/alltasks.php">All tasks</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="/FinalProject/view/createtask.php">Create task</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/FinalProject/view/userlist.php">List</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="/FinalProject/view/createuser.php">Create</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Charges<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/FinalProject/view/mycharge.php">My charge</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Manage</a></li>
          <li><a href="#">Manage All</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Roles <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/FinalProject/controller/RoleController.php">List</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="/FinalProject/view/createrole.php">Create</a></li>
        </ul>
      </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Config <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">System</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Task status</a></li>
                <li><a href="#">Task type</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
   
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $userData['lastname'].", ".$userData['firstname']." " ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">My profile</a></li>
        <li><a href="/FinalProject/view/editProfile.php">Edit profile</a></li>
        <li role="separator" class="divider"></li>

        <li><a href="/FinalProject/controller/LogoutController.php">Logout</a></li>

      </ul>
      </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>