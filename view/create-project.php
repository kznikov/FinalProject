<?php
$pageTitle = "Welcome to JIRA";
include "inc/header.php";

$userData = json_decode($_SESSION['user'], true);

if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $userData['lastname'] . ", " . $userData['firstname'] . " " ?><span class="caret"></span></a>
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
                        <button type="button" onclick="location.href = '../controller/HomeController.php';" class="btn btn-primary">Go to the dahboard</button>
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

                                <form  id="create-project" name="create-project" action="../controller/ProjectController.php" method="post">
                                    <fieldset>

                                        <div class="form-group">
                                            <label for="projectname">Name</label>
                                            <input type="text" name="project_name" id="projectname" class="form-control" placeholder="Project name">
                                        </div>

                                        <div class="form-group">
                                            <label for="clientname">Client</label>
                                            <input type="text" id="clientname" name="client_name" class="form-control" placeholder="Client name">
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <label for="prefix">Prefix</label>
                                            <input type="text" id="prefix" style='text-transform:uppercase' name="prefix" class="form-control" maxlength="5" placeholder="Enter prefix">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" rows="3"  class="form-control" name="description"  placeholder="Enter description"></textarea>
                                        </div>
                                        <div class="form-group"> 
                                            <label for="status">Status</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="1">Open</option> 
                                                <option value="2">Suspended</option>
                                                <option value="3">Closed</option>
                                                <option value="4">Deleted</option>
                                            </select>
                                        </div>


                                        <hr>

                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <label for="startdate">Start Date</label>
                                                <input id="startdate" name="start_date" type="date" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <label for="enddate">End Date</label>

                                                <input id="enddate" name="end_date" type="date"  class="form-control" />
                                            </div>
                                        </div>

                                        <input type="submit" name="submit" class="btn btn-primary" value="submit">
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

