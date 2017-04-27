<?php
include "inc/header.php";

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();

if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}
?>


<body>
    <!-- Fixed navbar -->
    <?php include "inc/nav.php"; ?>
    <section id="content" role="main" class="container">

        <div id="homepage-panel">

            <div class="row">

                <div class="col-md-10">
                    <h3>My Open Tasks</h3>
                    <table class="table table-responsive table-bordered">
                        <thead style="background-color: #205081; color: #fff;">
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Priority</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Progress</th>
                                <th>Project</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <h3>My Working On Tasks</h3>
                    <table class="table table-responsive table-bordered">
                        <thead style="background-color: #205081; color: #fff;">
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Priority</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Progress</th>
                                <th>Project</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>


                </div><!-- /.blog-main -->

                <aside class="col-md-2 sidebar">
                    <div class="bg-info">
                        <h3>My projects</h3>

                    </div>
                    <div class="bg-info">
                        <h3>Users</h3>

                    </div>
                    <aside><!-- /.blog-sidebar -->

                        </div><!-- /.row -->
                        </div>


                        </section><!-- /.container -->


                        <?php include "inc/footer.php"; ?>
