<?php
$pageTitle = "Create user";
include "inc/header.php";

if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}
?>

<body>

    <?php include "inc/nav.php"; ?>

    <section id="content" role="main" class="container">
        <div id="homepage-panel">
            <div class="row">          
                <div class="myproject-header">
                    <div class="myproject-title">
                        <h2>Create user</h2>
                    </div>
                </div>
                <form id="create-user" action="" method="post">
                    <div class="tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#main" aria-controls="main" role="tab" data-toggle="tab">Main</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#preferences" aria-controls="preferences" role="tab" data-toggle="tab">Preferences</a></li>
                            <li role="presentation"><a href="#notifications" aria-controls="notifications" role="tab" data-toggle="tab">Notifications</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="main"> 
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-username">Username</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="jira-setup-account-field-username" id="jira-setup-account-field-username" placeholder="Type in a username" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-password">Password</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="password" name="jira-setup-account-field-password" id="jira-setup-account-field-password" placeholder="Enter a password" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-retype-password">Re-type password</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="password" name="jira-setup-account-field-retype-password" id="jira-setup-account-field-retype-password" placeholder="Re-type password" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-email">Email</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="email" name="jira-setup-account-field-email" id="jira-setup-account-field-email" placeholder="Type your email address" required="required">
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-firstname">Name</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="jira-setup-account-field-firstname" id="jira-setup-account-field-firstname" placeholder="Type in a first name" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-surname">Surname</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="jira-setup-account-field-surname" id="jira-setup-account-field-surname" placeholder="Type in a surname" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-level">Level</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="jira-setup-account-field-level" id="jira-setup-account-field-level" placeholder="Enter a level" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-loadcost">Load Cost</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="number" min="0" name="jira-setup-account-field-loadcost" id="jira-setup-account-field-loadcost" placeholder="Enter a load cost" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-dailyhours">Daily Hours</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="number" min="8" name="jira-setup-account-field-dailyhours" id="jira-setup-account-field-dailyhours" placeholder="Enter an hours" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-phone">Phone</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="jira-setup-account-field-phone" id="jira-setup-account-field-phone" placeholder="Enter a phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-2">
                                        <label for="jira-setup-account-field-mobile">Mobile</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <input class="form-control" type="text" name="jira-setup-account-field-mobile" id="jira-setup-account-field-mobile" placeholder="Enter a mobile">
                                    </div>
                                </div>

                                <div id="image-holder" class="col-md-3">
                                    <img style="width: 150px;" src="images/add-avatar_2.png" alt="avatar">
                                </div>

                                <div class="form-group col-md-9" style="height: 200px;">
                                    <label for="fileUpload">Avatar</label>
                                    <input type="file" id="image" name="image" required>
                                    <p class="help-block">Please upload image.</p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="preferences">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> Application Manager  
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> Developer
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> Project Manager
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> Role Manager
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> Task Manager
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> User Manager
                                    </label>
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
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div> <!-- class="buttons-container" -->

                </form>

            </div> <!-- class="row" -->
        </div>
    </section><!-- /.container -->
    <?php include "inc/footer.php"; ?>

