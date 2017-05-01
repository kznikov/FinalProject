<?php
$pageTitle = "JS Error";
include "inc/header.php";
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
    
        <h3><img alt="Broke Page" src="/FinalProject/view/images/brokenPage.png">JavaScript is not enabled!</h3>
        <a href='javascript:history.go(-1)'>GO BACK</a>
        <a href='/FinalProject/controller/LogoutController.php'>EXIT</a>
    </section><!-- /.container -->


<?php include "inc/footer.php";?>

