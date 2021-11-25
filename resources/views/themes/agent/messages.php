<?php
require_once("header.php");

$user_id = $_SESSION['userid'];

$userdata = $_SESSION['userdata'];

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
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="col-md-12 col-sm-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">

  <?php

  if(isset($_GET['msg'])){

   if($_GET['msg']=="r"){

  ?>
              <div class="alert alert-block alert-success fade in">
            <button type="button" class="close" data-dismiss="alert"></button>

            <p>
               Customer account has been removed successfully
            </p>
            </div>
  <?php
  }
  }
  ?>
  <?php
  if(isset($_GET['msg'])){

    if($_GET['msg']=="added"){

  ?>
               <div class="alert alert-block alert-success fade in">
             <button type="button" class="close" data-dismiss="alert"></button>

             <p>
                Customer account added successfully
             </p>
             </div>
  <?php
  }
  }
  ?>
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-user"></i>Messages
                </div>

              </div>
              <div class="portlet-body">
                <!--<a href="<?php echo BASE_URL; ?>AppAgent/send_message" class="btn blue btn-block btn-sm" >Send message</a>
                <hr />-->
                <table class="table table-striped table-bordered table-hover" id="sample_3">
                <thead>

                <tr>

                  <th>
                     Sent By
                  </th>
                  <th>
                    Message
                  </th>
                  <th>
                     Date
                  </th>


                  <th>
                  Action
                  </th>

                </tr>

                </thead>
                <tbody>
                  <?php
                  $user_id = $userdata['id'];

                    $messages = $this->main_model->getUserMessages($userdata['username'],'');

                    foreach($messages as $key => $value){

  $last_thread = $this->main_model->getLastThread($value->id);

  if($last_thread->to_username==$userdata['username']){

  $user = $last_thread->from_username;

  }
  else {

  $user = $last_thread->to_username;

  }
  ?>

                <tr class="odd gradeX">

                  <td>
                     <?php echo $user; //echo $value->firstname.' '.$value->lastname; ?>
                  </td>

                  <td style="overflow:hidden;text-overflow: ellipsis;" class="message">
                     <?php if($last_thread->from_username!=$userdata['username']&&$last_thread->have_read=="no")
                     {

                       echo "<strong>".$last_thread->message."</strong>"; //echo $value->email;

                     }
                     else {

  echo "".$last_thread->message."";

                     }
                       ?>
                  </td>

                  <td>
              <?php echo $last_thread->date_sent; //$value->phonenumber; ?>
                  </td>

                  <td>

                      <a href="view_thread_1.php?t=<?php echo $value->id; ?>" class="btn blue btn-block btn-sm" >View</a>


  <!--<form action="remove_agent.php" method="post" onsubmit="return confirm('Are you sure you want to Remove?')">
    <input type="hidden" name="id" value="<?php //echo $value->id; ?>" />
  <input type="submit" class="btn blue btn-block btn-sm" value="Delete" style="margin-top:3px;" />-->

                  </td>
                </tr>
                <?php
              }
                 ?>
                </tbody>
                </table>
              </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
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
