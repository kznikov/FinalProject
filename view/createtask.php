<?php 
  $pageTitle="Create task";
  include "inc/header.php"; 
  
  session_start();
  if(!isset($_SESSION['user'])){
  	header('Location:../view/index.php');
  }
?>

<body>
  <?php include "inc/nav.php";  ?>
   <section id="content" role="main" class="container">
     <div id="homepage-panel">

        <div class="create-header text-center">
           <h1>Create task</h1>
        </div>
        <hr>
        <div class="row">               
              <form id="create-project" action="" method="">
                <fieldset> 
                <div class="col-md-8">

                  <div class="form-group">
                     <label for="selectproject">Project name</label>

                    <!-- взима данни от таблицата за регистрирани потребители -->
                    <select id="selectproject" class="form-control">
                      <option>Choose</option> 
                      <option>Name1</option>
                      <option>Name2</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tasktitle">Title</label>
                    <input type="text" id="tasktitle" class="form-control" placeholder="Task title">
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

                  <textarea class="form-control" rows="10"></textarea>

                  </div> <!-- class="col-md-8" -->

                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="type">Type</label>
                    <select id="type" class="form-control">
                      <option>Task</option> 
                      <option>Bug</option>
                      <option>Enhancement</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="priority">Priority</label>
                    <select id="priority" class="form-control">
                      <option>Low</option> 
                      <option>Medium</option>
                      <option>High</option>
                       <option>Escalated</option>
                    </select>
                  </div>
                  <div class="form-group"> 
                    <label for="status">Status</label>
                    <select id="status" class="form-control">
                      <option>Choose</option> 
                      <option>Suspended</option>
                      <option>Closed</option>
                      <option>Deleted</option>
                      <option>Chardge item</option>
                    </select>
                  </div>

                  <div class="form-group">
                     <div class='input-group'>
                        <label for="progress">Progress</label>
                        <input type="number" min="0" max="100" step="5" class="form-control" />
                      </div>
                  </div>

                  <div class="form-group">
                     <div class='input-group date'>
                        <label for="startdate">Start Date</label>
                        <input id="startdate" type="date" class="form-control" />
                      </div>
                  </div>
                  <div class="form-group">
                     <div class='input-group date'>
                        <label for="enddate">End Date</label>
                        <input id="enddate" type="date" class="form-control" />
                      </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                 
                  </div><!-- < class="col-md-4"> -->

                  
                </fieldset>
              </form>
         </div>
      </div>
   </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

   