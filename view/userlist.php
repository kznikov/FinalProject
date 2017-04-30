<?php
$pageTitle = "Users";
include "inc/header.php";

//session_start();
if (!isset($_SESSION['user'])) {
    header('Location:../view/index.php');
}
?>

<body>
    <div id="ajax_msg" class="alert alert-success"></div>

    <?php include "inc/nav.php"; ?> 
    <section id="content" role="main" class="container">
        <div id="homepage-panel">
            <div class="row">
                <?php if (isset($successMessage)) { ?>
                    <div class="flash_success" ><?= $successMessage ?></div>
                <?php } ?>
            </div>
            <div class="row">        
                <div class="userlist-header">
                    <div class="myproject-title col-xs-12 col-md-10">
                        <h2>Find Users</h2>
                    </div>
                    

                </div>
                <input type="text" id="search-user" class="form-control" placeholder="Type to search">
            </div>

            <div class="row" style="height: 100%; max-height: 500px; overflow-y: scroll;">   
                <table id="userlist"  class="myproject-table table table-responsive table-bordered">
                    <thead style="background-color: #205081; color: #fff;">
                        <tr>
                            <th style="width: 200px;">Avatar</th>
                            <th class="name">Name <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th class="username">Username  <span class="glyphicon glyphicon-resize-vertical"></th>
                            <th class="email">Email <span class="glyphicon glyphicon-resize-vertical"></span></th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody id="search_tbody">
						<tr id="empty_result" >
							<td colspan="5" style="text-align: center;"><em><strong>No results found.</strong></em></td>
						</tr>
                    </tbody>
                </table>
                <div class="bg-success">
                    <p>Export as word, exel, pdf</p>
                </div>



            </div> <!-- class="row" -->
        </div>
    </section><!-- /.container -->
<?php include "inc/footer.php"; ?>

