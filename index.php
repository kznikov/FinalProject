<?php 
$pageTitle="Registration Form";
include 'inc/header.php'; 
?>

<body>
	<div id="page">
	    <header id="header" role="banner">
	        <nav class="aui-header" role="navigation" data-aui-responsive="true">
	            <div class="aui-header-inner">
	                <div class="aui-header-primary">
	                    <h1 id="logo" class="aui-header-logo">
	                        <img src="aui/css/logos/aui-header-logo-jira.png" alt="JIRA" data-aui-responsive-header-index="0">
	                    </h1>
	                </div>
	            </div>
	        </nav>
	    </header> <!-- end header -->

	    <section id="content" role="main">
	    	<div class="aui-page-panel margin-fix">
	    		<div class="aui-page-panel-inner">
	    			<section class="aui-page-panel-content">
	    				<div class="setup-account-view-container">
	    					<form id="jira-setup-account" class="aui ajs-dirty-warning-exempt jira-setup-form jira-setup-account-form" action="form.php" method="post">

		    					<h2>Administrator account setup</h2>
		    					
		    					<p class="jira-setup-account-description">You'll need administrator credentials to log in to JIRA. Please provide an email address, username and password for your first administrator account. Make sure the password is secure.</p>

		    					<div class="jira-setup-account-contents">
			    					<div class="jira-setup-account-form-login">
			    						<div class="field-group">
			    							
			    							<label for="jira-setup-account-field-email">Email</label>
			    							<input class="text jira-setup-account-form-field" type="email" name="jira-setup-account-field-email" id="jira-setup-account-field-email" placeholder="Type your email address" required="required">

			    						</div> <!-- class="field-group" -->

			    						<div class="field-group">
			    							<label for="jira-setup-account-field-username">Username</label>
			    							<input class="text jira-setup-account-form-field" type="text" name="jira-setup-account-field-username" id="jira-setup-account-field-username" placeholder="Type in a username" required="required">

			    						</div> <!-- class="field-group" -->

			    						<div class="field-group">
			    							<label for="jira-setup-account-field-password">Password</label>
			    							<input class="text jira-setup-account-form-field" type="password" name="jira-setup-account-field-password" id="jira-setup-account-field-password" placeholder="Enter a password" required="required">
			    						
			    						</div> <!-- class="field-group" -->
			    						
			    						<div class="field-group">
			    							<label for="jira-setup-account-field-retype-password">Re-type password</label>
			    							<input class="text jira-setup-account-form-field" type="password" name="jira-setup-account-field-retype-password" id="jira-setup-account-field-retype-password" placeholder="Re-type password" required="required">
			    							<div id="validate-status" class="error"></div>
			    						</div> <!-- class="field-group" -->
			    					</div> <!-- class="jira-setup-account-form-login" -->
			    				</div> <!-- class="jira-setup-account-contents" -->

		    					<div class="buttons-container jira-setup-account-buttons jira-setup-form-with-no-fields">
		    						<div class="buttons">	
		    							<button type="submit" id="jira-setup-account-button-submit" class="aui-button aui-button-primary">Next</button>
		    						</div>
		    					</div> <!-- class="buttons-container" -->
	    					</form>
	    				</div><!-- class="setup-account-view-container" -->
	    			</section> <!-- class="aui-page-panel-content" -->
	    		</div><!-- .aui-page-panel-inner -->
	    	</div> <!-- class="aui-page-panel margin-fix" -->
	    </section> <!-- end main section -->

	    <footer id="footer" role="contentinfo">
	    	
	    </footer>
	</div> <!-- end page -->
	<script src="assets/js/app.js"></script>
</body>
</html>