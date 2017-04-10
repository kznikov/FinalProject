<?php include 'inc/header.php'; ?>

<body>
    <div id="page">
        <header id="header" role="banner">
            <nav class="aui-header aui-dropdown2-trigger-group" role="navigation" resolved="" data-aui-responsive="true">
                <div class="aui-header-inner">
                    <div class="aui-header-primary">
                        <h1 id="logo" class="aui-header-logo aui-header-logo-custom">
				    		<a href="#">
				    			<img src="aui/css/logos/aui-header-logo-jira.png" alt="JIRA" data-aui-responsive-header-index="0">
				    		</a>
			    		</h1>
                        <ul class="aui-nav">
                            <li>
                                <a class="aui-nav-link aui-dropdown2-ajax aui-dropdown2-trigger aui-alignment-target aui-alignment-abutted aui-alignment-abutted-left aui-alignment-element-attached-top aui-alignment-element-attached-left aui-alignment-target-attached-bottom aui-alignment-target-attached-left" href="#" id="home_link" title="View and manage your dashboards" aria-haspopup="true" aria-controls="home_link-content" resolved="" aria-expanded="false" data-dropdown2-loaded="">Dashboards</a>

                                <div id="home_link-content" class="aui-dropdown2 aui-style-default aui-layer aui-dropdown2-in-header aui-alignment-element aui-alignment-side-bottom aui-alignment-snap-left aui-alignment-abutted aui-alignment-abutted-left aui-alignment-element-attached-top aui-alignment-element-attached-left aui-alignment-target-attached-bottom aui-alignment-target-attached-left" data-aui-dropdown2-ajax-key="home_link" resolved="" aria-hidden="true" data-aui-alignment="bottom auto" data-aui-alignment-static="true">
                                    <div class="aui-dropdown2-section">
                                        <ul class="aui-list-truncate" id="dashboard_link_main">
                                            <li id="dash_lnk_system">
                                                <a href="/secure/Dashboard.jspa" id="dash_lnk_system_lnk" title="View the System's default dashboard" class="">View system dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="aui-dropdown2-section">
                                        <ul class="aui-list-truncate" id="dashboard_link_manage">
                                            <li id="manage_dash_link">
                                                <a href="#" id="manage_dash_link_lnk" title="Add, remove or search for dashboards" class="">Manage dashboards</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="aui-nav-link aui-dropdown2-ajax aui-dropdown2-trigger aui-alignment-target aui-alignment-abutted aui-alignment-abutted-left aui-alignment-element-attached-top aui-alignment-element-attached-left aui-alignment-target-attached-bottom aui-alignment-target-attached-left" href="#" id="browse_link" title="View recent projects and browse a list of projects" aria-haspopup="true" aria-controls="browse_link-content" resolved="" aria-expanded="false" data-dropdown2-loaded="">Projects</a>
                                <div id="browse_link-content" class="aui-dropdown2 aui-style-default aui-layer aui-dropdown2-in-header aui-alignment-element aui-alignment-side-bottom aui-alignment-snap-left aui-alignment-abutted aui-alignment-abutted-left aui-alignment-element-attached-top aui-alignment-element-attached-left aui-alignment-target-attached-bottom aui-alignment-target-attached-left" data-aui-dropdown2-ajax-key="browse_link" resolved="" aria-hidden="true" data-aui-alignment="bottom auto" data-aui-alignment-static="true">
                                    <div class="aui-dropdown2-section"><strong>Current project</strong>
                                        <ul class="aui-list-truncate" id="project_current">
                                            <li id="admin_main_proj_link">
                                                <a href="#" id="admin_main_proj_link_lnk" class="aui-icon-container">Title projects</a>
                                            </li>
                                        </ul>
                                    </div>
                            </li>
                            <li>
                                <a class="aui-nav-link aui-dropdown2-ajax aui-dropdown2-trigger aui-alignment-target aui-alignment-abutted aui-alignment-abutted-left aui-alignment-element-attached-top aui-alignment-element-attached-left aui-alignment-target-attached-bottom aui-alignment-target-attached-left" href="#" id="find_link" title="Search for issues and view recent issues" aria-haspopup="true" aria-controls="find_link-content" resolved="" aria-expanded="false" data-dropdown2-loaded="">Issues</a>

                                <div id="find_link-content" class="aui-dropdown2 aui-style-default aui-layer aui-dropdown2-in-header aui-alignment-element aui-alignment-side-bottom aui-alignment-snap-left aui-alignment-abutted aui-alignment-abutted-left aui-alignment-element-attached-top aui-alignment-element-attached-left aui-alignment-target-attached-bottom aui-alignment-target-attached-left" data-aui-dropdown2-ajax-key="find_link" resolved="" aria-hidden="true" data-aui-alignment="bottom auto" data-aui-alignment-static="true">
                                    <div class="aui-dropdown2-section">
                                        <ul class="aui-list-truncate" id="issues_new">
                                            <li id="jira.top.navigation.bar:issues_drop_current">
                                                <a href="#" id="jira.top.navigation.bar:issues_drop_current_lnk" title="View your current search" class="">Current search</a>
                                            </li>
                                            <li id="issues_new_search_link">
                                                <a href="/issues/?jql=" id="issues_new_search_link_lnk" title="Start a new search" class="">Search for issues</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="aui-dropdown2-section"><strong>Recent issues</strong>
                                        <ul class="aui-list-truncate" id="issues_history_main">

                                            <li id="issue_lnk_10012">
                                                <a href="#" id="issue_lnk_10012_lnk" title="BD-4 123" class="aui-icon-container issue-link" data-issue-key="BD-4" iconurl="/secure/viewavatar?size=xsmall&amp;avatarId=10318&amp;avatarType=issuetype">Title issue</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="aui-nav-link aui-dropdown2-ajax aui-dropdown2-trigger aui-alignment-target aui-alignment-abutted aui-alignment-abutted-left aui-alignment-element-attached-top aui-alignment-element-attached-left aui-alignment-target-attached-bottom aui-alignment-target-attached-left" href="/secure/RapidBoard.jspa" id="greenhopper_menu" title="Manage your project with JIRA Software" aria-haspopup="true" aria-controls="greenhopper_menu-content" resolved="" aria-expanded="false" data-dropdown2-loaded="">Boards</a>
                                <div id="greenhopper_menu-content" class="aui-dropdown2 aui-style-default aui-layer aui-dropdown2-in-header aui-alignment-element aui-alignment-side-bottom aui-alignment-snap-left aui-alignment-abutted aui-alignment-abutted-left aui-alignment-element-attached-top aui-alignment-element-attached-left aui-alignment-target-attached-bottom aui-alignment-target-attached-left" data-aui-dropdown2-ajax-key="greenhopper_menu" resolved="" aria-hidden="true" data-aui-alignment="bottom auto" data-aui-alignment-static="true">

                                    <div class="aui-dropdown2-section"><strong>Recent Boards</strong>
                                        <ul class="aui-list-truncate" id="greenhopper_menu_dropdown_recent">
                                            <li id="rapidb_lnk_5"><a href="#" id="rapidb_lnk_5_lnk" title="View Kanban Board '456'" class="">456</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="aui-dropdown2-section">
                                        <ul class="aui-list-truncate" id="greenhopper_menu_dropdown">
                                            <li id="ghx-manageviews-mlink">
                                                <a href="/secure/ManageRapidViews.jspa" id="ghx-manageviews-mlink_lnk" title="View all boards available to you" class="">View all boards</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li id="create-menu">
                                <a id="create_link" class="aui-button aui-button-primary aui-style create-issue " title="Create a new issue / bug / feature request / etc ( Type 'c' )" href="#">Create</a>
                            </li>
                        </ul>
                    </div>
                    <div class="aui-header-secondary">
                        <ul class="aui-nav" resolved="">
                            <li>
                                <form action="" method="get" id="quicksearch" class="aui-quicksearch dont-default-focus ajs-dirty-warning-exempt">
                                    <input id="quickSearchInput" class="search" type="text" title="Search ( Type '/' )" placeholder="Search" name="searchString" accesskey="q" autocomplete="off" aria-controls="quick-search-dialog" aria-expanded="false" aria-haspopup="true" aria-activedescendant="" role="combobox">
                                    <div class="search-spinner"></div>
                                    <input type="submit" class="hidden" value="Search">
                                </form>
                            </li>
                            <li id="system-admin-menu">
                                <a href="#" id="admin_menu" class="aui-nav-link aui-dropdown2-trigger" aria-haspopup="true" title="Administration" resolved="" aria-controls="system-admin-menu-content" aria-expanded="false">
                                    <span class="aui-icon aui-icon-small aui-iconfont-configure">Administration</span>
                                </a>

                                <div id="system-admin-menu-content" class="aui-dropdown2 aui-style-default aui-layer" resolved="" aria-hidden="true">
                                    <div class="aui-dropdown2-section">
                                        <strong>JIRA administration</strong>
                                        <ul class="aui-list-truncate">
                                            <li>
                                                <a href="#" class="aui-nav-link" id="admin_project_menu">Projects</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li id="user-options">
                                <a id="header-details-user-fullname" class="aui-dropdown2-trigger" aria-haspopup="true" data-username="pancho.angarev" data-displayname="pancho.angarev" href="#" title="User profile" resolved="" aria-controls="user-options-content" aria-expanded="false">
                                <span class="aui-avatar aui-avatar-small">
					                <span class="aui-avatar-inner">
					                    <img src="https://secure.gravatar.com/avatar/d27a9361680ec60177bc06d9e32d7507?d=mm&amp;s=24" alt="User profile for pancho.angarev">
					                </span>
                                </span>
                                </a>
                                <div id="user-options-content" class="aui-dropdown2 aui-style-default aui-layer" resolved="" aria-hidden="true">
                                    <div class="aui-dropdown2-section">
                                        <ul id="personal" class="aui-list-truncate">
                                            <li>
                                                <a id="view_profile" class="" title="View and change your details and preferences" href="./account-settings.php">Profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="aui-dropdown2-section">
                                        <ul id="system" class="aui-list-truncate">
                                            <li>
                                                <a id="log_out" class="" title="Log out and cancel any automatic login." href="#">Log out</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .aui-header-inner-->
            </nav>
        </header> <!-- .aui-header -->

        <div id="dashboard" class="dashboard">
        	<div id="dashboard-content">
				<div class="aui-page-header">
					<div class="aui-page-header-inner">
						<div class="aui-page-header-main">
							<h1>System dashboard</h1>
						</div>
					</div>
				</div>
				<div class="layout layout-aa">
					<ul class="column first">
						<li class="gadget" id="rep-10000"></li>
					</ul>
					<ul class="column second">
						<li class="gadget" id="rep-10002"></li>
						<li class="gadget" id="rep-10003"></li>
					</ul>
					<ul class="column third"></ul>
				</div>
        	</div> <!-- id="dashboard-content" -->
       	</div> <!-- id="dashboard" class="dashboard" -->


    </div>
<?php include 'inc/footer.php'; ?>