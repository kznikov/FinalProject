<?php
$pageTitle = "Create Role";
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
                        <h2>Create Role</h2>

                    </div>
                    <div class="myproject-button col-xs-12 col-md-2">
                        <button onclick="location.href = '../controller/MyProjectsController.php';" class="btn btn-primary">Back</button>
                    </div>
                </div>
            </div>
            <div class="row">  

                <form action="" method="post" accept-charset="utf-8">


                    <table id="userlist" class="myproject-table table table-responsive table-bordered">
                        <thead style="background-color: #205081; color: #fff;">
                            <tr>
                                <th>Project</th>
                                <th>User</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <td>
                            <select class="form-control" id="roles-project" name="roles-project">
                                <option disabled selected>Please select</option>
                                <?php foreach ($getproject as $value): ?>
                                    <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" id="roles-users" name="roles-users">
                                <option disabled selected>Please select</option>
                                <?php foreach ($getuser as $value): ?>
                                    <option value="<?php echo $value['username']; ?>"><?php echo $value['username']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" id="role"  name="role">
                                <option disabled selected>Please select</option>
                                <?php foreach ($result as $value): ?>
                                    <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                        <td class="text-center">
                            <input type="submit" class="btn btn-primary" name="submit" value="Create">
                        </td>
                        </tbody>
                    </table>
                </form>
            </div> <!-- class="row" -->
        </div>
    </section><!-- /.container -->
    <?php include "inc/footer.php"; ?>

