<?php
$pageTitle = "Charge";
include "inc/header.php";

session_start();
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
                    <div class="myproject-title col-xs-12">
                        <h2>Create Charge</h2>
                    </div>

                </div>

                <table class=" myproject-table table table-responsive table-bordered">
                    <thead style="background-color: #205081; color: #fff;">
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Type</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Status</th>
                            <th>Progress</th>
                            <th>Project</th>
                            <th>Action</th>
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
                            <td></td>
                            <td class="text-center">
                                <a href="#"><span class="glyphicon glyphicon-eye-open" title="View"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-cog" title="Edit"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"></span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>




            </div> <!-- class="row" -->
        </div>
    </section><!-- /.container -->
    <?php include "inc/footer.php"; ?>

