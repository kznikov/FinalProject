<?php
$pageTitle = "Create project";
include "inc/header.php";

if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}
?>

<body>
    <?php include "inc/nav.php"; ?>
    <section id="content" role="main" class="container">
        <div id="homepage-panel">
			<?php if (isset($message)) { ?>
		        <div  class="<?= $message_class?>" style="margin-top:0px;"><?= $message ?></div>
					<?php }?>
            <div class="create-header text-center">
                <h1>Create project</h1>
                <p>Use this project to work on new features for your product and also track any bugs. This project provides you with a basic workflow and issue type configuration, which you can change later on.</p>
            </div>
            <hr>
            <div class="row">               
                <form id="create-project" name="create-project" action="../controller/ProjectController.php" method="post">
                    <fieldset> 
                        <div class="col-md-8">
								
                            <div class="form-group">
                                <label for="projectname">Name</label>
                                <input type="text" name="project_name" id="projectname" class="form-control" onblur="checkProjectName()" placeholder="Project name">
                                <div id="errorname"></div>
                            </div>

                            <div class="form-group">
                                <label for="clientname">Client</label>
                                <input type="text" id="clientname" name="client_name" class="form-control" placeholder="Client name">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" rows="7" name="description"  class="form-control" placeholder="Enter description"></textarea>
                            </div>

                        </div> <!-- class="col-md-8" -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prefix">Prefix</label>
                                <input type="text" id="prefix" name="prefix" style='text-transform:uppercase' class="form-control" maxlength="5" placeholder="Enter prefix" onblur="checkPrefixName()">
                                <div id="errorprefix"></div>
                            </div>

                            <div class="form-group"> 
                                <label for="status">Status</label>

                                <!-- взима данни от таблицата за регистрирани потребители -->
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
                                    <input id="enddate" name="end_date" type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="text-right">
                                <input type="submit" name="submit" id="createProject" class="btn btn-primary" value="Submit">
                            </div>
                        </div><!-- < class="col-md-4"> -->
                    </fieldset>
                </form>
            </div>
        </div>
    </section><!-- /.container -->
    <?php include "inc/footer.php"; ?>

