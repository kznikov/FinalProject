<?php
$pageTitle = "Login";
include "inc/header.php";

if(isset($_SESSION['error'])){
	$message=$_SESSION['error'];	
}

?>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand" href="#"><img src="/FinalProject/view/images/pmc-logo.svg" alt=""></a>

            </div>
        </div>
        <!--  class="container" -->
    </nav>
    <section id="notFound">
        <h3><img alt="Broke Page" src="/FinalProject/view/images/brokenPage.png"><?php echo $message; ?></h3>
        <a href='javascript:history.go(-1)'>GO BACK</a>
    </section><!-- /.container -->

<?php include "inc/footer.php";?>

