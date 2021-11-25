<?php
require_once("header.php");

	foreach($this->user as $value){
												
					$user = $value;
												
												}
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
            										Edit User
            										</div>

            									</div>
            									<div class="portlet-body form">
               						<!-- BEGIN FORM-->
            										<form action="<?php echo BASE_URL; ?>AppAdmin/process_edit_user" method="post" class="form-horizontal">
                                                    <input type="hidden" type="text" value="<?php echo $this->uid; ?>" name="user_id" />
            											<div class="form-body">

            <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">First Name</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" placeholder="Firstname" name="firstname" value="<?php  echo $user['firstname']; ?>" required>
                </div>

            </div>
            
                <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Last Name</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" placeholder="Lastname" name="lastname" required value="<?php  echo $user['lastname']; ?>">
                </div>

            </div>
            
                <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Phone</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" placeholder="Phone" name="phone" required value="<?php  echo $user['phone']; ?>">
                </div>

            </div>
            
             <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Change Password?</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" placeholder="New Password" name="password"  >
                </div>

            </div>
                
          <div class="form-group ">

                <label class="control-label col-md-3">User Type</label>

              <div class="col-md-7" >
                <select class="form-control" name="user_type" required>
                <?php if($user['user_type']!=""){ ?>
                <option><?php echo $user['user_type']; ?></option>
                <?php } else { ?>
                    <option value="">Select an Option</option>
                    <?php } ?>
                    <option>Admin</option>
                    <option>Agent</option>
                    <option>User</option>
                </select>
              </div>

          </div>

                       <div class="form-group ">

                <label class="control-label col-md-3">User Status</label>

              <div class="col-md-7" >
                <select class="form-control" name="status" required>
                <?php if($user['status']!=""){ ?>
                <option><?php echo $user['status']; ?></option>
                <?php } else { ?>
                    <option value="">Select an Option</option>
                    <?php } ?>
                    <option>inactive</option>
                    <option>active</option>
                </select>
              </div>

          </div>         


            											</div>
            											<div class="form-actions">
            												<div class="row">
            													<div class="col-md-offset-3 col-md-9">
            														<button type="submit" class="btn btn-circle blue">Edit</button>
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
