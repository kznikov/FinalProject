<?php 
  $pageTitle="Users";
  include "inc/header.php"; 
?>

<body>
   
   <?php include "inc/nav.php";  ?>

   <section id="content" role="main" class="container">
    <div id="homepage-panel">
      <div class="row">          
        <div class="myproject-header">
          <div class="myproject-title col-xs-12 col-md-10">
            <h2>Users</h2>

          </div>
          <div class="myproject-button col-xs-12 col-md-2">
             <button onclick="location.href = 'createtask.php';" class="btn btn-primary">Create  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
          </div>
        </div>

        <table class=" myproject-table table table-responsive table-bordered">
          <thead style="background-color: #205081; color: #fff;">
            <tr>
              <th>Avatar</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center"><img style="width: 150px;" src="images/add-avatar_2.png" alt="avatar"></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <p>Application Manager</p>
                <p>Developer</p>
                <p>Project Manager</p>
              </td>
              <td></td>
              <td class="text-center">
                <a href="#"><span class="glyphicon glyphicon-eye-open" title="View"></span></a>
                <a href="#"><span class="glyphicon glyphicon-cog" title="Edit"></span></a>
                <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"></span></a>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="bg-success">
          <p>Export as word, exel, pdf</p>
        </div>

       

      </div> <!-- class="row" -->
    </div>
   </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

   