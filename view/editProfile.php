<?php
$pageTitle = "Users";
include "inc/header.php";
?>

<body>

    <?php include "inc/nav.php"; ?>

    <section id="content" role="main" class="container">
        <div id="homepage-panel">
            <div class="row">          
                <div class="myproject-header">
                    <div class="myproject-title">
                        <h2>Update User <?= $result->username ?></h2>
                    </div>
                </div>


                <form id="edit-account" name= "edit-account" action="../controller/UpdateProfileController.php" enctype="multipart/form-data" method="post">
                    <div class="tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#main" aria-controls="main" role="tab" data-toggle="tab">Main</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#notifications" aria-controls="notifications" role="tab" data-toggle="tab">Notifications</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="main"> 
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-username">Username</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="username" id="jira-setup-account-field-username" value=" <?= $result->username ?> ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-password">Password</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="password" name="password" id="jira-setup-account-field-password" placeholder="Enter a password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label class="control-label" for="jira-setup-account-field-retype-password">Re-type password</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="password" name="repassword" id="jira-setup-account-field-retype-password" placeholder="Re-type password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-email">Email</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="email" name="email" id="jira-setup-account-field-email" value="<?= $result->email ?>">
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-firstname">Name</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="firstname" id="firstname" value="<?= $result->firstname ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-surname">Surname</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="lastname" id="lastname" value="<?= $result->lastname ?>">
                                    </div>
                                </div>      
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-phone">Phone</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="phone" id="jira-setup-account-field-phone" value="<?= $result->phone ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-mobile">Mobile</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="mobile" id="jira-setup-account-field-mobile" value="<?= $result->mobile ?>" >
                                    </div>
                                </div>

                                <div id="image-holder" class="col-md-3">
                                    <?php if ($result->avatar != NULL) {
                                        ?>
                                        <img id="avatar" class="img-thumbnail" style="width: 190px;" src="../view/uploaded/<?= $result->avatar ?>" alt="avatar">
                                        <?php
                                    } else {
                                        ?>
                                        <img id="avatar" style="width: 150px;" src="../view/images/add-avatar_2.png" alt="avatar">
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div>
                                     <?php if (isset($result1) && $result1) { ?>
                                        <ul class="result">
                                            <?php
                                            foreach ($result1 as $message) {
                                                echo "<li>$message</li>";
                                            }
                                            ?>
                                        </ul>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-md-9" style="height: 200px;">
                                <input type="hidden" name="MAX_FILE_SIZE" value="<?php if (isset($max)) { echo $max; } ?>">
                                    <label for="fileUpload">Avatar</label>
                                    <input type="file" id="image" name="image">
                                    <p class="help-block">Please upload image.</p>
                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="notifications">

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> Task Association
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> Project Association
                                    </label>
                                </div>
                            </div>
                        </div>          
                    </div>
                    <div class="buttons-container text-right">
                        <div class="buttons"> 
                            <input type="submit" class="btn btn-primary" id="uploadImage" name="submit" value="Save">
                        </div>
                    </div> <!-- class="buttons-container" -->

                </form>







            </div> <!-- class="row" -->
        </div>
    </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

