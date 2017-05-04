<?php
$pageTitle = "Create task";
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
                <h1>Create task</h1>
            </div>
            <hr>
            <div class="row">               
                <form id="create-task" name="create-task" action="/FinalProject/controller/TaskController.php" method="post">
                    <fieldset> 
                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="selectproject">Project name</label>

                                <!-- взима данни от таблицата за регистрирани потребители -->
                                <select name="project" id="selectproject" class="form-control">
                                <option selected="selected">Choose project</option>
                                <?php foreach ($projects as $project) {?>
                                    <option value="<?= $project->id ?>"><?= $project->name ?></option> 
                                   <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tasktitle">Title</label>
                                <input type="text" name="title" id="tasktitle" class="form-control" placeholder="Task title">
                            </div>
                            <div class="form-group"> 
                                <label for="selectusers">Assign to</label>

                                <!-- взима данни от таблицата за регистрирани потребители -->
                                <select name="owner" id="selectusers" class="form-control">
                                   <option class="form-control" disabled="disabled"><em>Please choose project first</em></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" rows="9" placeholder="Task description"></textarea>
                            </div>


                        </div> <!-- class="col-md-8" -->

                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label for="type">Type</label>
                                <select id="type" name="type" class="form-control">
                                    <option value="3">Task</option> 
                                    <option value="1">Bug</option>
                                    <option value="2">Enhancement</option>
                                </select>
                            </div>


                            <div class="form-group"> 
                                <label for="priority">Priority</label>
                                <select id="priority" name="priority" class="form-control">
                                    <option value="1">Low</option> 
                                    <option value="2">Medium</option>
                                    <option value="5">High</option>
                                    <option value="6">Escalated</option>
                                </select>
                            </div>
                            <div class="form-group"> 
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1">Open</option> 
                                    <option value="2">Working on</option>
                                    <option value="3">Suspended</option>
                                    <option value="4">Closed</option>
                                    <option value="5">Cancelled</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class='input-group'>
                                    <label for="progress">Progress</label>
                                    <input type="number" name="progress" min="0" max="100" step="5" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class='input-group date'>
                                    <label for="startdate">Start Date</label>
                                    <input id="startdate" name="start_date" type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class='input-group date'>
                                    <label for="enddate">End Date</label>
                                    <input id="enddate" type="date" name="end_date" class="form-control" />
                                </div>
                            </div>
                            <div class="text-right">
                                <input type="submit" name="submit" class="btn btn-primary" value="Create">
                            </div>

                        </div><!-- < class="col-md-4"> -->


                    </fieldset>
                </form>
            </div>
        </div>
    </section><!-- /.container -->
    <?php include "inc/footer.php"; ?>

