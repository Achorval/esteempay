<?php
require_once("header.php");

$user_id = $_SESSION['userid'];

$userdata = $_SESSION['userdata'];

$message_id = $_GET['t'];

global $wpdb;

$thread = getThread($message_id);

$current_person = $userdata['username'];

//$wpdb->query("UPDATE wa_messaging SET have_read = 'yes' WHERE have_read = 'no' AND to_username = '$current_person'");

foreach($thread as $key => $value){

  if($value->from_username!=$userdata['username']){

    $opponent = $value->from_username;

  }

  if($opponent==""){

    $opponent = $value->to_username;

  }

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

                <div class="portlet box green">
                  <div class="portlet-title">

                    <div class="caption">
                      Messaging
                    </div>

                  </div>
                  <div class="portlet-body form">


                    <!-- BEGIN FORM-->
                    <form action="process_send_message1.php" method="post" class="form-horizontal">

                      <div class="form-body">

                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-9">
                            <div id="loading-div">Type message below and click send</div>
                            <hr />
                            <input type="hidden" id="from_username" name="from_username" value="<?php echo $userdata['username']; ?>" />

                            <div class="form-group">
                              <label class="control-label col-md-3">Select Recipient</label>

                              <div class="col-md-4">
                                <!--<div class="select2-container select2-container-multi form-control select2" id="s2id_select2_sample2"><ul class="select2-choices">  <li class="select2-search-field ms-hover">    <label for="s2id_autogen27" class="select2-offscreen"></label>    <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" id="s2id_autogen27" placeholder="" style="width: 20px;" aria-activedescendant="select2-result-label-322">  </li></ul></div>-->
                                <?php $receiver = $this->main_model->getSuperAdmin(); ?>
                                <input type="hidden" name="to_username" value="<?php echo $receiver->username; ?>" />
                                <select id="select2_sample2" class="form-control select2 select2-offscreen" readonly tabindex="-1" required>

                                  <option><?php echo $receiver->username; ?></option>

                                </select>

                              </div>
                            </div>

                            <div class="form-group">

                              <label class="control-label col-md-3">Message </label>
                              <div class="col-md-4">
                                <textarea class="form-control" style="width:100%; min-height:100px;" placeholder="Enter message" name="message" id="message" required>

                                </textarea>
                              </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                              <input type="submit" class="btn btn-lg blue" value="Send Message" />
                            </div>

                          </div>

                        </form>
                        <hr />

                      </div>


                      <!-- END FORM-->
                    </div>



                    <!-- END PAGE CONTENT INNER -->
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
