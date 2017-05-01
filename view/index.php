<?php
$pageTitle = "Login";
include "inc/header.php";

//session_start();
if(isset($_SESSION['user'])){
	header('Location: ../controller/HomeController.php', true, 302);
	exit;
}

?>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand" href="../controller/HomeController.php"><img src="../view/images/pmc-logo.svg" alt="Home"></a>

            </div>
        </div>
        <!--  class="container" -->
    </nav>
    <section id="content" role="main" class="container">
        <div id="login-panel">
            <div class="login-header">
                <h1>Log in</h1>
            </div>
            <?php if (isset($errorMessage) && $errorMessage) { ?>
                            <div  class="flash_login_error" >Sorry, we didn&#x27;t recognize that username and password combination. Please double-check and try again.</div>

            <?php } ?>

            <?php if (isset($message)) { ?>
                <div  class="<?= $class ?> ?>" ><?= $message ?></div>
            <?php } ?>
            <div class="login-body">
                <h2 class="login-heading">Use your <strong>PMC</strong> account</h2>

                <form id="jira-setup-account" action="../controller/LoginController.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" onblur="checkUserName()" required="required">
                        <div id="exist"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" name="submit" id="login" value="Log in">
                </form>
                <div class="login-footer">
                    <p><a href="/FinalProject/view/forgot.php" id="forgot" name="forgot">Unable to access your account?</a></p>
                    <p><a href="/FinalProject/view/register.php">Create an account</a> </p>

                </div>
            </div>
        </div>
    </section><!-- /.container -->

<?php include "inc/footer.php"; ?>

