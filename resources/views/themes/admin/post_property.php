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
            										Add a property
            										</div>

            									</div>
            									<div class="portlet-body form">
            										<!-- BEGIN FORM-->
            										<form action="process_post_property" method="post" class="form-horizontal">
            											<div class="form-body">

            <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Title</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" id="address" placeholder="eg Happy Time Hotel" name="title" required>
                </div>

            </div>

           <div class="form-group">

                <label class="col-md-3 control-label">State</label>

                <div class="col-md-7">
                <select class="form-control" onchange="showLocalArea(this.value)" name="state" required>
                  <option selected="">Select State</option>
                  <?php
                  $appagentmodel = $this->model->getStates();
                  $states = $this->model->getStates();
                  foreach($states as $key => $state){
                    ?>
                  <option value="<?php echo $state['id']; ?>"><?php echo $state['name']; ?></option>
                <?php
}
                 ?>
                </select>
              </div>

          </div>

          <div class="form-group ">

                <label class="control-label col-md-3">Local Area</label>

              <div class="col-md-7" >
                <select class="form-control" id="localities" name="local_area" onchange="showArea(this.value);" required>
                    <option value="">Select an Option</option>
                </select>
              </div>

          </div>

          <div class="form-group ">

                <label class="control-label col-md-3">Area</label>

              <div class="col-md-7" >
                <select class="form-control" id="area" name="area" >
                     <option value="">Select an Option</option>
                </select>
              </div>

          </div>

          <div class="form-group ">

                <label class="control-label col-md-3">Currency</label>

              <div class="col-md-7" >
                <select class="form-control" id="currency" name="currency" required>
                     <option value="Naira">Naira</option>
                      <option value="Usd">USD</option>
                </select>
              </div>

          </div>

          <div class="form-group ">

                <label class="control-label col-md-3" id="examplenameInputname2">Minimum Rate</label>

              <div class="col-md-7">
                <input type="text" class="form-control" id="amount" placeholder"Amount" name="amount" required>
              </div>

          </div>

          <div class="form-group ">

                <label class="control-label col-md-3">Duration</label>

              <div class="col-md-7" >
                <select class="form-control" id="duration" name="duration" required>
                     <option value="per_day">Per Day</option>
                </select>
              </div>

          </div>

          <div class="form-group ">

              <div class="col-md-10">

                <div class="container">
                  <!-- Search input -->
                  <input id="searchInput" class="controls" type="text" name="address" placeholder="Enter a location">

                  <!-- Google map -->
                  <div id="map"></div>

                  <!-- Display geo location data -->
                  <ul class="geo-data">
                    <li>Full Address: <span id="location"></span></li>
                    <li>Postal Code: <span id="postal_code"></span></li>
                    <li>Country: <span id="country"></span></li>
                    <li>Latitude: <span id="lat"></span></li>
                    <li>Longitude: <span id="lon"></span></li>
                  </ul>
                </div>

              </div>

          </div>

           <input type="hidden" name="longitude" id="longitude" />

           <input type="hidden" name="latitude" id="latitude" />

           <input type="hidden" name="user_id" value="" />

           <input type="hidden" name="is_hotel" value="yes" />

           <input type="hidden" name="status" value="Submitted" />


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
