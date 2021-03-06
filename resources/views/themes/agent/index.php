<?php
require_once("header.php");
 ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<?php
     require_once("menu.php");
     ?>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Dashboard <small>statistics & reports</small></h1>
				</div>
				<!-- END PAGE TITLE -->
				<!-- BEGIN PAGE TOOLBAR -->
				<div class="page-toolbar">
					<!-- BEGIN THEME PANEL -->
					<div class="btn-group btn-theme-panel">
						<a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
						<i class="icon-settings"></i>
						</a>
						<div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<h3>THEME</h3>
									<ul class="theme-colors">
										<li class="theme-color theme-color-default" data-theme="default">
											<span class="theme-color-view"></span>
											<span class="theme-color-name">Dark Header</span>
										</li>
										<li class="theme-color theme-color-light active" data-theme="light">
											<span class="theme-color-view"></span>
											<span class="theme-color-name">Light Header</span>
										</li>
									</ul>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-12 seperator">
									<h3>LAYOUT</h3>
									<ul class="theme-settings">
										<li>
											 Theme Style
											<select class="layout-style-option form-control input-small input-sm">
												<option value="square">Square corners</option>
												<option value="rounded" selected="selected">Rounded corners</option>
											</select>
										</li>
										<li>
											 Layout
											<select class="layout-option form-control input-small input-sm">
												<option value="fluid" selected="selected">Fluid</option>
												<option value="boxed">Boxed</option>
											</select>
										</li>
										<li>
											 Header
											<select class="page-header-option form-control input-small input-sm">
												<option value="fixed" selected="selected">Fixed</option>
												<option value="default">Default</option>
											</select>
										</li>
										<li>
											 Top Dropdowns
											<select class="page-header-top-dropdown-style-option form-control input-small input-sm">
												<option value="light">Light</option>
												<option value="dark" selected="selected">Dark</option>
											</select>
										</li>
										<li>
											 Sidebar Mode
											<select class="sidebar-option form-control input-small input-sm">
												<option value="fixed">Fixed</option>
												<option value="default" selected="selected">Default</option>
											</select>
										</li>
										<li>
											 Sidebar Menu
											<select class="sidebar-menu-option form-control input-small input-sm">
												<option value="accordion" selected="selected">Accordion</option>
												<option value="hover">Hover</option>
											</select>
										</li>
										<li>
											 Sidebar Position
											<select class="sidebar-pos-option form-control input-small input-sm">
												<option value="left" selected="selected">Left</option>
												<option value="right">Right</option>
											</select>
										</li>
										<li>
											 Footer
											<select class="page-footer-option form-control input-small input-sm">
												<option value="fixed">Fixed</option>
												<option value="default" selected="selected">Default</option>
											</select>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- END THEME PANEL -->
				</div>
				<!-- END PAGE TOOLBAR -->
			</div>
			<!-- END PAGE HEAD -->
      <div class="page-content-wrapper">
    		<div class="page-content">
    			<!-- BEGIN PAGE HEAD -->
    			<div class="page-head">
    				<!-- BEGIN PAGE TITLE -->
    				<div class="page-title">
    					<h1>Dashboard <small>statistics & reports</small></h1>
    				</div>
    				<!-- END PAGE TITLE -->
    				<!-- BEGIN PAGE TOOLBAR -->
    				<div class="page-toolbar">
    					<!-- BEGIN THEME PANEL -->
    					<div class="btn-group btn-theme-panel">
    						<a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
    						<i class="icon-settings"></i>
    						</a>
    						<div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
    							<div class="row">
    								<div class="col-md-4 col-sm-4 col-xs-12">
    									<h3>THEME</h3>
    									<ul class="theme-colors">
    										<li class="theme-color theme-color-default" data-theme="default">
    											<span class="theme-color-view"></span>
    											<span class="theme-color-name">Dark Header</span>
    										</li>
    										<li class="theme-color theme-color-light active" data-theme="light">
    											<span class="theme-color-view"></span>
    											<span class="theme-color-name">Light Header</span>
    										</li>
    									</ul>
    								</div>
    								<div class="col-md-8 col-sm-8 col-xs-12 seperator">
    									<h3>LAYOUT</h3>
    									<ul class="theme-settings">
    										<li>
    											 Theme Style
    											<select class="layout-style-option form-control input-small input-sm">
    												<option value="square">Square corners</option>
    												<option value="rounded" selected="selected">Rounded corners</option>
    											</select>
    										</li>
    										<li>
    											 Layout
    											<select class="layout-option form-control input-small input-sm">
    												<option value="fluid" selected="selected">Fluid</option>
    												<option value="boxed">Boxed</option>
    											</select>
    										</li>
    										<li>
    											 Header
    											<select class="page-header-option form-control input-small input-sm">
    												<option value="fixed" selected="selected">Fixed</option>
    												<option value="default">Default</option>
    											</select>
    										</li>
    										<li>
    											 Top Dropdowns
    											<select class="page-header-top-dropdown-style-option form-control input-small input-sm">
    												<option value="light">Light</option>
    												<option value="dark" selected="selected">Dark</option>
    											</select>
    										</li>
    										<li>
    											 Sidebar Mode
    											<select class="sidebar-option form-control input-small input-sm">
    												<option value="fixed">Fixed</option>
    												<option value="default" selected="selected">Default</option>
    											</select>
    										</li>
    										<li>
    											 Sidebar Menu
    											<select class="sidebar-menu-option form-control input-small input-sm">
    												<option value="accordion" selected="selected">Accordion</option>
    												<option value="hover">Hover</option>
    											</select>
    										</li>
    										<li>
    											 Sidebar Position
    											<select class="sidebar-pos-option form-control input-small input-sm">
    												<option value="left" selected="selected">Left</option>
    												<option value="right">Right</option>
    											</select>
    										</li>
    										<li>
    											 Footer
    											<select class="page-footer-option form-control input-small input-sm">
    												<option value="fixed">Fixed</option>
    												<option value="default" selected="selected">Default</option>
    											</select>
    										</li>
    									</ul>
    								</div>
    							</div>
    						</div>
    					</div>
    					<!-- END THEME PANEL -->
    				</div>
    				<!-- END PAGE TOOLBAR -->
    			</div>
    			<!-- END PAGE HEAD -->
    			<!-- BEGIN PAGE BREADCRUMB -->
    			<ul class="page-breadcrumb breadcrumb hide">
    				<li>
    					<a href="javascript:;">Home</a><i class="fa fa-circle"></i>
    				</li>
    				<li class="active">
    					 Dashboard
    				</li>
    			</ul>
    			<!-- END PAGE BREADCRUMB -->
    			<!-- BEGIN PAGE CONTENT INNER -->
    		<h1>Main dashboard comes here</h1>
    			<!-- END PAGE CONTENT INNER -->
    		</div>
    	</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
require_once("footer.php");
?>
