<?php 
  $pageTitle="Create project";
  include "inc/header.php"; 
?>

<body>
  <?php include "inc/nav.php";  ?>
   <section id="content" role="main" class="container">
     <div id="homepage-panel">

        <div class="create-header text-center">
           <h1>Create project</h1>
           <p>Use this project to work on new features for your product and also track any bugs. This project provides you with a basic workflow and issue type configuration, which you can change later on.</p>
        </div>
        <hr>
        <div class="row">               
              <form id="create-project" action="" method="">
                <fieldset> 
                <div class="col-md-8">

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

                  </div> <!-- class="col-md-8" -->

                  <div class="col-md-4">
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
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                 
                  </div><!-- < class="col-md-4"> -->

                  
                </fieldset>
              </form>
         </div>
      </div>
   </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

   