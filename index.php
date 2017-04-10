<?php 
$pageTitle="Login";
include 'inc/header.php'; 
?>

<body>
<div id="page">

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
	    
	    <div id="login-panel" class="aui-page-panel
	            indra-one-wide">
	        <header class="indra-header aui-page-header">
	            <div class="aui-page-header-inner">
	                <div class="aui-pageheader-main">
	                    <h1>Log in</h1>
	                </div>
	            </div>
	        </header>
	        
	        <div class="aui-group indra-login-method ">
	              <div class="aui-item indra-login-item indra-login-crowd">
	                  <h2 class="indra-login-item-heading">Use your <strong>JIRA</strong> account</h2>
	                  <form id="form-crowd-login" class="aui top-label "
	                        autocapitalize="off" autocorrect="off" data-login-type="crowd" method="POST">
							<div class="field-group" id="username-field">
		  						<label for="username">Email address / Username </label>
		    					<input type="text" id="username" name="username" value="" class="text full-width-field" placeholder="Email address / Username" autofocus="autofocus"/>
	    					</div>
	    					<div class="field-group" id="password-field">
	 							<label for="password">Password </label>
	 							<input type="password" id="password" name="password" value="" class="password full-width-field" placeholder="Password">
	 						</div>
	                      <div class="buttons-container">
	                          <div class="buttons">
	                              <button type="submit" id="login" class="aui-button aui-button-primary">
	                                Log in
	                              </button>
	                          </div>
	                      </div>
	                          <div class="field-group">
	                              <div class="checkbox">
	                                  <input type="checkbox" class="checkbox" name="remember-me" id="remember-me" value="true" />
	                                  <label for="remember-me">Keep me logged in</label>
	                              </div>
	                          </div>
	                      <p class="indra-signup">
	                          <a href="./forgot.php" id="forgot" name="forgot">Unable to access your account?</a><br />
	                          <span id="signup-disabled">To request an account, please contact your site administrators.</span>
	                          <span id="signup-enabled">
	                            <a href="./index.php">Create an account</a>
	                          </span>
	                      </p>
	                  </form>
	              </div>
	        </div>
	    </div>
	</section>
</div> <!-- id="page" -->
	  
	<script src="assets/js/app.js"></script>
<?php include "inc/footer.php"; ?>