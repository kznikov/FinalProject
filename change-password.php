<?php 
$pageTitle="Change password";
include 'inc/header.php'; 
?>

<body>
	<div id="page">
		<header id="header" role="banner">
			<nav class="aui-header aui-dropdown2-trigger-group aui-header-logo-hires" role="navigation" data-aui-responsive="true">
				<div class="aui-header-inner">
					<div class="aui-header-primary">
						<h1 id="logo" class="aui-header-logo">
	                        <img src="aui/css/logos/aui-header-logo-jira.png" alt="JIRA" data-aui-responsive-header-index="0">
	                    </h1>
					</div>
					<div class="aui-header-secondary">
						<ul class="aui-nav" resolved="">
							<li><a href="#">Log out</a></li>
						</ul>
					</div>
				</div><!-- .aui-header-inner-->
			</nav><!-- .aui-header -->
		</header>

		<section id="content" role="main">
			<header class="aui-page-header">
				<div class="aui-page-header-inner">
					<div class="aui-page-header-image">
						<span class="aui-avatar aui-avatar-large">
							<span class="aui-avatar-inner">
								<img src="aui/css/images/add-avatar_2.png">
							</span>
						</span>
					</div><!-- .aui-page-header-image -->
					<div class="aui-page-header-main">
						<h1 class="mainHeading">Manage your account</h1>
					</div><!-- .aui-page-header-main -->
				</div><!-- .aui-page-header-inner -->
			</header>
			<!-- .aui-page-header -->


			<div class="aui-page-panel manage-account">
				<div class="aui-page-panel-inner">

					<div class="aui-page-panel-nav aid-sidebar">
						<nav class="aui-navgroup aui-navgroup-vertical">
							<div class="aui-navgroup-inner">
								<div class="aui-nav-heading">
									<strong>General</strong>
								</div>
								<ul class="aui-nav" resolved="">
									<li>
										<a href="./account-settings.php">Account settings</a>
									</li>
									<li>
										<a href="./change-email.php">Change email address</a>
									</li>
								</ul>
								<div class="aui-nav-heading">
									<strong>Security</strong>
								</div>
								<ul class="aui-nav" resolved="">
									<li class="aui-nav-selected">
										<a href="./change-password.php">Change password</a>
									</li>
								</ul>						
						</nav>
					</div>
					<!-- .aui-page-panel-nav -->

					<section class="aui-page-panel-content">
						<h2>Change your password</h2>

						<form id="change-password-form" class="aui" action="#" method="post">	 <div class="field-group">
								<label for="currentPassword">Current password</label>
									<input class="text" type="password" name="currentPassword" id="currentPassword" autofocus="">
							</div>
							<div class="field-group has-password-revealer">
								<label for="newPassword">New password</label>
								<input class="text" type="password" name="newPassword" id="newPassword">
							</div>
							<div class="buttons-container">
								<div class="buttons">
									<input type="submit" class="aui-button aui-button-primary" value="Change password" resolved="">
								</div>
							</div>
						</form>
					</section> <!-- class="aui-page-panel-content" -->

				</div> <!-- class="aui-page-panel-inner" -->
			</div><!--  class="aui-page-panel" -->
		</section>
	</div> <!-- id="page" -->
<?php include "inc/footer.php"; ?>