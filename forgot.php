<?php 
$pageTitle="Login";
include 'inc/header.php'; 
?>

<body>
<div id="page" class="page-type-message">

	<header id="header" role="banner">
	    <nav class="aui-header aui-dropdown2-trigger-group" role="navigation">
	        <div class="aui-header-inner">
	        	<div class="aui-header-primary">
	        		<h1 id="logo" class="aui-header-logo">
                        <img src="aui/css/logos/aui-header-logo-jira.png" alt="JIRA" data-aui-responsive-header-index="0">
                    </h1>
	        	</div>
	        </div><!-- .aui-header-inner-->
	    </nav><!-- .aui-header -->
	</header>

	<section id="content" role="main">
		<div class="aui-page-panel">

		<h2>Forgot username or password</h2>
			<form id="form-forgot-credentials" autocapitalize="off" autocorrect="off" class="aui top-label" method="POST" action="/login/forgot">
	            <div class="form-body">
	            	<fieldset class="group">
	    				<legend><span>Which did you forget?</span></legend>
					    <div class="matrix">
							<div class="radio">
							<input type="radio" id="forgotten_forgotPassword" name="forgotten" value="forgotPassword" checked _label="Which did you forget?">
							<label for="forgotten_forgotPassword">Password</label>
							</div>

							<div class="radio">
							<input type="radio" id="forgotten_forgotUserName" name="forgotten" value="forgotUserName"  _label="Which did you forget?">
							<label for="forgotten_forgotUserName">Username</label>
							</div>
						</div> <!-- class="matrix" -->
					</fieldset>
				<div class="field-group" id="username-field">
		  			<label for="username">Username <span class="aui-icon icon-required"> required</span></label>
		  			<input type="text" id="username" name="username" value="" class="text" required="true"/>
				</div>
				<div class="field-group" id="email-field">
				  <label for="email">Email <span class="aui-icon icon-required"> required</span></label>
				    <input type="text" id="email" name="email" value="" class="text" required="true"/>
				</div>
				<div class="buttons-container">
				    <div class="buttons">
				        <button type="submit" id="email-me" class="aui-button aui-button-primary">Email</button>
				        <a href="./index.php" class="aui-button aui-button-link">Return to log in page</a>
				    </div>
				</div>
			</div>
		</form>
	    </div>
	</section>
</div> <!-- id="page" -->
	  
	<script src="assets/js/app.js"></script>
<?php include "inc/footer.php"; ?>