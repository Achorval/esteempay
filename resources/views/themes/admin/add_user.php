<?php
require_once("header.php")
 ?>
 <style type="text/css">

 #map {
   width: 100%;
   min-height: 250px;
 }
 .controls {
   margin-top: 10px;
   border: 1px solid transparent;
   border-radius: 2px 0 0 2px;
   box-sizing: border-box;
   -moz-box-sizing: border-box;
   height: 32px;
   outline: none;
   box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
 }
 #searchInput {
   background-color: #fff;
   font-family: Roboto;
   font-size: 15px;
   font-weight: 300;
   margin-left: 12px;
   padding: 0 11px 0 13px;
   text-overflow: ellipsis;
   width: 50%;
 }
 #searchInput:focus {
   border-color: #4d90fe;
 }
 .geo-data{
   border: 2px dashed #2A99CF;
     padding: 10px;
     font-size: 17px;
   list-style: none;
   clear:both;
   width:inherit;
   display: block;
max-width:600px;
 }
 .geo-data span{
   color: #ed691f;
 }

 </style>
<!-- END HEADER -->
<div class="clearfix">
</div>
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
require_once('menu.php');
     ?>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->

			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->

			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

          <div class="portlet box green">
            									<div class="portlet-title">
            										<div class="caption">
            										Add User
            										</div>

            									</div>
            									<div class="portlet-body form">
                                                <?php
												if(isset($_GET['err'])){
												if($_GET['err']=="usernameexists"){
												?>
											    <center><font color="#FF0000"><h3>Username already used!</h3></font></center>
												<?php
												}else if($_GET['err']=="emailexists") {
												?>
                                                <center><font color="#FF0000"><h3>Email already used!</h3></font></center>
                                                <?php
												} else if($_GET['err']=="password_not_match") {
												?>
                                                <center><font color="#FF0000"><h3>Passwords not matching!</h3></font></center>
                                                <?php
												} else if($_GET['err']=="db_error") {
												?>
                                                <center><font color="#FF0000"><h3>Unknown error occurred! Contact system admin</h3></font></center>
                                                <?php
												}
												}
												?>
            										<!-- BEGIN FORM-->
            										<form action="process_add_user" method="post" class="form-horizontal">
            											<div class="form-body">

            <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">First Name</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" placeholder="Firstname" name="firstname" value="<?php if(isset($_GET['firstname'])){ echo trim($_GET['firstname'],"'"); } ?>" required>
                </div>

            </div>
            
                <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Last Name</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" placeholder="Lastname" name="lastname" required value="<?php if(isset($_GET['lastname'])){ echo trim($_GET['lastname'],"'"); } ?>">
                </div>

            </div>
            
              <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Username</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username" required value="<?php if(isset($_GET['username'])){ echo trim($_GET['username'],"'"); } ?>">
                </div>

            </div>
            
                <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Email</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" id="email" placeholder="Email" name="email" required value="<?php if(isset($_GET['email'])){ echo trim($_GET['email'],"'"); } ?>">
                </div>

            </div>
            
                <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Phone</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" placeholder="Phone" name="phone" required value="<?php if(isset($_GET['phone'])){ echo trim($_GET['phone'],"'"); } ?>">
                </div>

            </div>
            
                <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Password</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" placeholder="Password" name="password" required value="<?php if(isset($_GET['password'])){ echo trim($_GET['password'],"'"); } ?>">
                </div>

            </div>
            
             <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Confirm Password</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" placeholder="Password" name="confirm_password" required value="<?php if(isset($_GET['confirm_password'])){ echo trim($_GET['confirm_password'],"'"); } ?>">
                </div>

            </div>
            
            
            
            
          <div class="form-group ">

                <label class="control-label col-md-3">User Type</label>

              <div class="col-md-7" >
                <select class="form-control" name="user_type" required>
                <?php if(isset($_GET['user_type'])){ ?>
                <option><?php echo trim($_GET['user_type'],"'"); ?></option>
                <?php } else { ?>
                    <option value="">Select an Option</option>
                    <?php } ?>
                    <option>Admin</option>
                    <option>Agent</option>
                    <option>User</option>
                </select>
              </div>

          </div>






          

         


            											</div>
            											<div class="form-actions">
            												<div class="row">
            													<div class="col-md-offset-3 col-md-9">
            														<button type="submit" class="btn btn-circle blue">Add</button>
            													</div>
            												</div>
            											</div>
            										</form>
            										<!-- END FORM-->
            									</div>



          			<!-- END PAGE CONTENT INNER -->
          		</div>

				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
require_once("footer.php")
 ?>
