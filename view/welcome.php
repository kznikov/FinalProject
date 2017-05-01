<?php
$pageTitle = "Welcome to PMC";
include "inc/header.php";
session_cache_limiter('private_no_expire'); // works
session_cache_limiter('public'); // works too
if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}

$userData = json_decode($_SESSION['user'], true);
$user_id = $userData['id'];

?>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../view/images/pmc-logo.svg" alt="PMC"></a>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $userData['lastname'] . ", " . $userData['firstname'] . " " ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="/FinalProject/controller/LogoutController.php">Logout</a></li>

                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <section id="content" role="main" class="container">
        <div id="register-panel">
            <div class="register-header">
                <h2>Welcome to PMC, <?= $userData['firstname'] . " " . $userData['lastname'] . " " ?></h2>
            </div>
            <hr>
            <div class="avatar-body">

                <p>Let's get started! You'll need an avatar to help other users identify you in PMC.</p>
                <?php if (isset($result) && $result) { ?>
                    <ul class="result">
                        <?php
                        foreach ($result as $message) {
                            echo "<li>$message</li>";
                        }
                        ?>
                    </ul>
                <?php } ?>

                <form enctype="multipart/form-data" id="jira-avatar" action="../controller/uploadController.php" method="post">

                    <div id="image-holder" class="col-md-3">
                        <?php if (isset($image) && $image) {
                            ?>
                            <img id="avatar" class="img-thumbnail" style="width: 150px;" src="../view/uploaded/<?php echo $image; ?>" alt="avatar">
                            <?php
                        } else {
                            ?>
                            <img id="avatar" style="width: 150px;" src="/FinalProject/view/images/add-avatar_2.png" alt="avatar">
                            <?php
                        }
                        ?>
                    </div>

                    <div class="form-group col-md-9" style="height: 200px;">
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php if (isset($max)) {
                            echo $max;
                        } ?>">
                        <label for="image">File input</label>
                        <input type="file" id="image" name="image">
                        <p class="help-block">Please upload image.</p>
                    </div>

                    <div id="errors"></div>
                    <div class="buttons-container">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <div class="buttons"> 
                                    <input type="submit" name="upload" id="uploadImage" class="btn btn-primary" value="Upload">
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="buttons">
                                    <button type="button" onclick="location.href = '../controller/nextController.php';" class="btn btn-primary">Next</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- class="buttons-container" --> 

                </form>


            </div> <!-- class="register-body" -->
        </div> <!-- id="register-panel" -->
    </section><!-- /.container -->
    <?php include "inc/footer.php"; ?>

