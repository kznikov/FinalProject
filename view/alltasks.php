<?php
$pageTitle = "All tasks";
include "inc/header.php";

if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}
?>

<body>
    <?php if (isset($message)) { ?>

        <div  class="<?= $class ?>" style="margin-top:60px;"><?= $message ?></div>

    <?php } ?>

    <?php include "inc/nav.php"; ?>

    <section id="content" role="main" class="container">
        <div id="homepage-panel">
            <div class="row">          
                <div class="myproject-header">
                    <div class="myproject-title col-xs-12 col-md-10">
                        <h2>All tasks</h2>

                    </div>
                    <div class="myproject-button col-xs-12 col-md-2">
                        <button onclick="location.href = '/FinalProject/controller/CreateTaskController.php';" class="btn btn-primary">Create  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </div>
                </div>

                <div class="search-input">
                    <input type="text" id="search" class="form-control" placeholder="Type to search">
                </div>

                <table id="userlist" class="myproject-table table table-responsive table-bordered">
                    <thead style="background-color: #205081; color: #fff;">
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Type</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th style="width: 190px;">Progress</th>
                            <th>Project</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php if (isset($allTasks) && $allTasks) {
                        foreach ($allTasks as $task) {
                            ?>
                            <tr class="myproject-name" onclick="location.href = '../controller/ViewTaskController.php?name=<?= $task['id'] ?> ';">
                                <td><?= $task['task_id'] ?></td>
                                <td><?= $task['title'] ?></td>
                                <td><?= $task['username'] ?></td>
                                <td><img style="width: 20px; margin-right: 5px;" src="../view/images/type_<?= $task['task_type_id'] ?>.png"><?= $task['type'] ?></td>
                                <td><?= (empty($task['start_date']) ? "<em style='color:red;'>Not set</em>" : $task['start_date']) ?></td>
                                <td><?= (empty($task['end_date']) ? "<em style='color:red;'>Not set</em>" : $task['end_date']) ?></td>
                                <td><?= $task['status'] ?></td>
                                <td><?= $task['priority'] ?><img style="width: 30px; margin-left: 0px;" src="../view/images/priority_<?= $task['task_priority_id'] ?>.png"></td>
                                <td><div class="progress-wrap progress" style="background-color:orange;" data-progress-percent="<?= $task['progress'] ?>">
                                        <div class="progress-bar progress"></div>	  
                                    </div>
                                    <p class="progress_perc" ><?= $task['progress'] ?>%</p>
                                </td>
                                <td><?= $task['project'] ?></td>
                                <td class="text-center">
                                    <a href="#"><span class="glyphicon glyphicon-eye-open" title="View"></span></a>
                                    <a href="#"><span class="glyphicon glyphicon-cog" title="Edit"></span></a>
                                    <a href="#"><span class="glyphicon glyphicon-trash" title="Delete"></span></a>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        ?>
                        <tr>
                            <td colspan="11" style="text-align: center;"><em><strong>No results found.</strong></em></td>
                        </tr>
<?php } ?>
                    </tbody>
                </table>

                <div class="bg-success">
                    <p>Export as word, exel, pdf</p>
                </div>



            </div> <!-- class="row" -->
        </div>
    </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

