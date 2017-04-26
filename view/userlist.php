<?php 
  $pageTitle="Users";
  include "inc/header.php";
  
  //session_start();
  if(!isset($_SESSION['user'])){
  	header('Location:../view/index.php');
  }
?>

<body>
  <div id="ajax_msg" class="alert alert-success"></div>
   
   <?php include "inc/nav.php";  ?> 
   <section id="content" role="main" class="container">
    <div id="homepage-panel">
      <div class="row">
        <?php if(isset($successMessage)){?>
          <div class="flash_success" ><?=$successMessage?></div>
        <?php } ?>
      </div>
      <div class="row">        
        <div class="userlist-header">
          <div class="myproject-title col-xs-12 col-md-10">
            <h2>Users</h2>
          </div>
          <div class="myproject-button col-xs-12 col-md-2">
             <button onclick="location.href = '../controller/CreateUserController.php';" class="btn btn-primary">Create  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
          </div>
      
        </div>
        <input type="text" id="search" class="form-control" placeholder="Type to search">
      </div>

        <div class="row">   

        <table id="userlist" class="myproject-table table table-responsive table-bordered">
          <thead style="background-color: #205081; color: #fff;">
            <tr>
              <th>Avatar</th>
              <th class="name">Name <span class="glyphicon glyphicon-resize-vertical"></span></th>
              <th class="username">Username  <span class="glyphicon glyphicon-resize-vertical"></th>
              <th class="email">Email <span class="glyphicon glyphicon-resize-vertical"></span></th>
              <th>Role</th>
              <th>Action</th> 
            </tr>
          </thead>
          <tbody>
          
          <?php foreach ($result as $value): ?>
           
            <tr>
              <td class="text-center">
                       
                <?php if ($value['avatar'] != NULL) {
                ?>
                 <img id="avatar" class="img-thumbnail" style="width: 190px;" src="../view/uploaded/<?php echo $value['avatar']; ?>" alt="avatar">
                <?php  
                } else {

                 ?>
                  <img id="avatar" style="width: 150px;" src="../view/images/add-avatar_2.png" alt="avatar">
                <?php 
                } 

              ?>    
             
              </td>
              <td><?php echo $value['firstname'] . " " .  $value['lastname'];  ?></td>
              <td><?php echo $value['username'] ;  ?></td>
              <td><?php echo $value['email'] ;  ?></td>
              <td>
                <p>Application Manager</p>
                <p>Developer</p>
                <p>Project Manager</p>
              </td>
              <td class="text-center"> 
                
                <a href="#"><span class="glyphicon glyphicon-eye-open" title="View" onclick="viewUser(<?php echo $value['id']; ?>)"></span>
                </a>

                <a href="#"><span class="glyphicon glyphicon-cog" title="Edit" onclick="editUser(<?php echo $value['id']; ?>)"></span></a>
                <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"  onclick="deleteUser(<?php echo $value['id'] ?>)"></span></a>
              </td>
            </tr>
            
          <?php endforeach ?>




          </tbody>
        </table>
        <div class="bg-success">
          <p>Export as word, exel, pdf</p>
        </div>

       

      </div> <!-- class="row" -->
    </div>
   </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

   