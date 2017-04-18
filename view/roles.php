<?php 
  $pageTitle="Charge";
  include "inc/header.php"; 
?>

<body>

<?php include "inc/nav.php";  ?>

<section id="content" role="main" class="container">
   <div id="homepage-panel">
      <div class="row">
         <div class="myproject-header">
            <div class="myproject-title col-xs-12 col-md-10">
               <h2>Roles</h2>
            </div>
            <div class="myproject-button col-xs-12 col-md-2">
               <button onclick="location.href = 'createrole.php';" class="btn btn-primary">Create  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
         </div>
         <table class=" myproject-table table table-responsive table-bordered">
            <thead style="background-color: #205081; color: #fff;">
               <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Operations</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>
                     <div id="search-area">
                        <select class="form-control" id="roles">
                           <option disabled selected>Please select</option>
                           <option value="Application Manager">Application Manager</option>
                           <option value="Developer">Developer</option>
                           <option value="Project Manager">Project Manager</option>
                           <option value="Role Manager">Role Manager</option>
                           <option value="Task Manager">Task Manager</option>
                           <option value="User Manager">User Manager</option>
                        </select>
                     </div>
                  </td>
                  <td>
                     <input type="text" class="form-control" name="" value="" placeholder="">
                  </td>
                  <td></td>
                  <td class="text-center">
                     <a href="#"><span class="glyphicon glyphicon-cog" title="Edit"></span></a>
                     <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"></span></a>
                  </td>
               </tr>
               <div id="role-result">
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>
                  
               </div>
            </tbody>
         </table>
      </div>
      <!-- class="row" -->
   </div>
</section>
<!-- /.container -->
<?php include "inc/footer.php"; ?>

   