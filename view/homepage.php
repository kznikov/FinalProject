<?php 
  include "inc/header.php";
  
  // header('Cache-Control: no cache'); //no cache
  // session_cache_limiter('private_no_expire'); // works
  //session_cache_limiter('public'); // works too
 // session_start();
  
  
  //session_start();
  if(!isset($_SESSION['user'])){
  	header('Location:../view/index.php');
  }
  
?>


<body>

	<?php if(isset($message)){?>
	
	<div  class="<?=$class ?>" ><?=$message ?></div>
	
	<?php }?>
      <!-- Fixed navbar -->
	<?php include "inc/nav.php";  ?>
   <section id="content" role="main" class="container">

		<div id="homepage-panel">

				<div class="row">

					<div class="col-md-10">
						<h3>My Open Tasks</h3>
						<table style="float:left;" class="table table-responsive table-bordered">
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
							<table  class="table table-responsive table-bordered" >
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


				</div><!-- /.row -->
		</div>
		
		<div style="float:left; font-size:10px;"   id="homepage-panel">

				<div class="row">

					<div class="col-md-10">
						<h3>My Open Tasks</h3>
						<table style="float:left;" class="table table-responsive table-bordered">
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
							<table  class="table table-responsive table-bordered" >
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


				</div><!-- /.row -->
		</div>

 
   </section><!-- /.container -->


<?php include "inc/footer.php"; ?>
