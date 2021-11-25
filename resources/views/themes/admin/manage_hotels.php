<?php
require_once("header.php");

$user_id = $_SESSION['userid'];

$properties = $this->model->view_hotels();

$main_model = $this->main_model;

//$pid = $this->pid;

//$property = $this->model->view_property($pid);

//foreach($property as $value){

//$property = $value;

//}

//$sale_type = $value['sale_type'];

//$use_type = $value['property_use'];
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
      					<!--<div class="note note-success note-shadow">

      					</div>-->
      					<!-- BEGIN SAMPLE TABLE PORTLET-->
      					<div class="portlet box green">
      						<div class="portlet-title">
      							<div class="caption">
      							Manage Hotels
      							</div>
      							<div class="tools">
      								<a href="javascript:;" class="collapse" data-original-title="" title="">

      								</a>
      								<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
      								</a>
      								<a href="javascript:;" class="reload" data-original-title="" title="">
      								</a>
      							</div>
      						</div>
      						<div class="portlet-body flip-scroll">
                    <?php
                     if(isset($_GET['msg'])){

                        if($_GET['msg']=="nophoto"){

                     ?>
                                   <div class="alert alert-block alert-danger fade in">
                                 <button type="button" class="close" data-dismiss="alert"></button>

                                 <p>
                                  Property without photos can't be submitted
                                 </p>
                                 </div>
                     <?php
                     }
                     if($_GET['msg']=="mainphoto"){

                  ?>
                                <div class="alert alert-block alert-danger fade in">
                              <button type="button" class="close" data-dismiss="alert"></button>

                              <p>
                               Property doesn't have a default photo
                              </p>
                              </div>
                  <?php
                  }
                     if($_GET['msg']=="submitted"){

                  ?>
                                <div class="alert alert-block alert-success fade in">
                              <button type="button" class="close" data-dismiss="alert"></button>

                              <p>
                              Property submission was successfull, wait for admin response
                              </p>
                              </div>
                  <?php
                  }
                     }
                      ?>
                      <a href="<?php echo BASE_URL; ?>AppAdmin/post_property?is_hotel=yes" class="btn btn-small btn-primary">Add Hotel</a>
                      <hr />
      							<table class="table table-bordered table-striped table-condensed flip-content">
      							<thead class="flip-content">
      							<tr>
                      <th>ID</th>
      								<th width="20%">
      									Title
      								</th>
      								<th>
      									 State
      								</th>
      								<th class="numeric">
      									 Local Area
      								</th>
      								<th class="numeric">
      									 Area
      								</th>
      								<th class="numeric">
      									 Pricing
      								</th>

      								<th class="numeric">
      									Status
      								</th>
      								<th class="numeric">
      								Action
      								</th>
      							</tr>
      							</thead>
      							<tbody>
                      <?php
                      if(!empty($properties))
foreach($properties as $key => $value){
                       ?>
      							<tr>
                      <td><?php echo $value['id']; ?></td>

      								<td>
      								<?php
echo $value['title'];
                       ?>
      								</td>
      								<td>
      		<?php
echo $this->main_model->getStateName($value['state']);
           ?>
      								</td>
      								<td class="numeric">
                        <?php
              echo $this->main_model->getLocalAreaName($value['local_area']);
                         ?>
      								</td>
      								<td class="numeric">
                        <?php
              echo $this->main_model->getAreaName($value['area']);
                         ?>
      								</td>
      								<td class="numeric">
                        ₦<?php
               echo number_format($value['amount'],2);
                          ?>
      								</td>

      								<td class="numeric">
                        <?php
              echo $value['status'];
                         ?>
      								</td>
      								<td class="numeric">

<a href="<?php echo BASE_URL; ?>AppAdmin/update_property/<?php echo $value['id']; ?>" class="btn btn-sm blue">View Property</a>

      								</td>
      							</tr>
<?php
}
 ?>
      							</tbody>
      							</table>
      						</div>
      					</div>
      					<!-- END SAMPLE TABLE PORTLET-->




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
