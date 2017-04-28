<?php
$pageTitle = "My profile";
include "inc/header.php";
?>

<body>

<?php include "inc/nav.php"; ?>

    <section id="content" role="main" class="container">


        <div id="homepage-panel"> 
            <div class="row">
<?php if (isset($successMessage)) { ?>
                    <div class="flash_success" ><?= $successMessage ?></div>
                <?php } ?>
            </div>
            <div class="row">  
                <div class="myproject-header">
                    <div class="myproject-title col-xs-12 col-md-10">
                        <h2><?= $result->username?> profile</h2>

                    </div>
                    <div class="myproject-button col-xs-12 col-md-2">
                        <button onclick="location.href = '../controller/editProfileController.php';" class="btn btn-primary">Update  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </div>
                </div>

<?php //var_dump($result);  ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Username</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-center">
					<?php if ($result->avatar) {
					    ?>
                                    <img id="avatar" class="img-thumbnail" style="width: 190px;" src="../view/uploaded/<?= $result->avatar?>" alt="avatar">
                                    <?php
                                } else {
                                    ?>
                                    <img id="avatar" style="width: 150px;" src="../view/images/add-avatar_2.png" alt="avatar">
                                    <?php
                                }
                                ?>
                            </th>
                            <td><?= $result->username ?></td>
                            <td><?= $result->firstname ?></td>
                            <td><?= $result->lastname?></td>
                            <td><?= $result->email ?></td>
                            <td><?= $result->phone ?></td>
                            <td><?= $result->mobile ?></td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div> <!-- class="row" -->
        </div>
    </section><!-- /.container -->
<?php include "inc/footer.php"; ?>