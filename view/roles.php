<?php
$pageTitle = "Roles";
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
                    <div class="myproject-title col-xs-12 col-md-10">
                        <h2>Roles List</h2>
                    </div>
                </div>
                <div style="height: 100%; max-height: 500px; overflow-y: scroll; margin-top: 20px;">
                <table class=" myproject-table table table-responsive table-bordered">
                    <thead style="background-color: #205081; color: #fff;">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Operations</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div id="search-area">
                                    <select class="form-control" id="roles">
                                        <option disabled selected>Please select</option>
                                        <option value="Project Admin">Project Admin</option>
                                        <option value="Project Manager">Project Manager</option>
                                        <option value="QA">QA</option>
                                        <option value="Developer">Developer</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="" value="" placeholder="">
                            </td>
                            <td></td>
                            <td class="text-center">

                            </td>
                        </tr>
                    <div id="role-result">
                        <?php foreach ($r as $elem) { ?>
                            <tr>
                                <td id="roles_td_role"><?= $elem->__get('name') ?></td>
                                <td class="roles_td"></td>
                                <td class="roles_td">
                                    <ul style="list-style:none; padding:0px;">
                                        <?php foreach ($elem->__get('permissions') as $key => $perm) { ?>
                                            <li><?php echo $key . ":" . ($perm == 1 ? " Yes" : " No") ?></li>
                                        <?php } ?>
                                    </ul>
                                </td>

                                <td style="vertical-align: middle;" class="text-center">
                                    <a href="#"><span class="glyphicon glyphicon-cog" title="Edit"></span></a>
                                    <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"></span></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </div>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- class="row" -->
        </div>
    </section>
    <!-- /.container -->
    <?php include "inc/footer.php"; ?>

