<?php
require_once("header.php");

$pid = $this->pid;

$property = $this->AppAgent_Model->view_property($pid);

foreach($property as $value){

$property = $value;

}

$sale_type = $value['sale_type'];

$use_type = $value['property_use'];

$p_status = $value['status'];
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
					<div class="portlet box blue" id="form_wizard_1">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> View Property - <span class="step-title">
								Page 1 of 5 </span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							    <form class="form-horizontal" action="<?php echo BASE_URL; ?>AppAdmin/process_update_property" id="submit_form" method="post" >
                    <input type="hidden" value="<?php echo $property['id']; ?>" name="id" />
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Property Details </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Address </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i>Property Pricing </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Property Features </span>
												</a>
											</li>

                      <li>
                        <a href="#tab5" data-toggle="tab" class="step">
                        <span class="number">
                        4 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Action </span>
                        </a>
                      </li>

										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
											<div class="tab-pane active" id="tab1">
												<h3 class="block">Property information</h3>
							<!-- START CONTENT-->
              <div class="form-group ">

                    <label class="control-label col-md-3" id="examplenameInputname2">Title</label>

                  <div class="col-md-7">
                        <span class="form-control">
                           <?php echo $property['title']; ?>
                        </span>

                  </div>
              </div>

              <div class="form-group ">

                    <label class="control-label col-md-3">Sale Type</label>

                    <div class="col-md-7">
                      <span class="form-control">
                  <?php echo $sale_type; ?>
                </span>
                    </div>

                  </div>

                  <div class="form-group ">

                        <label class="control-label col-md-3">Use Type</label>

                        <div class="col-md-7">
                          <span class="form-control">
                           <?php echo $use_type; ?>
                         </span>

                        </div>

                      </div>

                      <div class="form-group ">

                            <label class="control-label col-md-3">Category</label>

                          <div class="col-md-7" >
<span class="form-control">
                            <?php
  $categories = $this->model->view_categories();
   foreach($categories as $keyC => $valueC){

     if($property['category']==$valueC['id']){
       echo $valueC['name'];
}

   }
                             ?>
</span>
                          </div>
                      </div>

                      <div class="form-group ">

                            <label class="col-md-3 control-label">Sub Category</label>

                          <div class="col-md-7" >
                        <span class="form-control">
<?php echo $this->model->getSubCatName($property['sub_category']); ?>
                        </span>
                          </div>

                      </div>

                      <div class="form-group ">

                            <label class="control-label col-md-3">Bedrooms</label>

                          <div class="col-md-7" >
                          <span class="form-control">
<?php
echo $property['bedrooms'];
 ?>
                          </span>
                          </div>

                      </div>

                      <div class="form-group ">

                            <label class="col-md-3 control-label">Bathrooms</label>

                          <div class="col-md-7" >
                          <span class="form-control">
<?php echo $property['bathrooms']; ?>
                          </span>
                          </div>
                      </div>

                      <div class="form-group ">

                            <label class="col-md-3 control-label">Toilets</label>

                          <div class="col-md-7" >
                      <span class="form-control">
<?php
echo $property['toilets'];
 ?>
                      </span>
                          </div>

                      </div>

                      <div class="form-group ">


                            <label class="col-md-3 control-label">Property Condition</label>

                          <div class="col-md-7" >

                            <span class="form-control">
                      <?php
echo  $property['property_condition'];
                       ?>
                     </span>
                          </div>
                      </div>


                      <form action="<?php echo BASE_URL; ?>AppAdmin/process_upload_property_photos" enctype="multipart/form-data" method="post" />

                  <div class="row">
                  <style type="text/css">
                  .blah {
                     width:100%;
                   margin:auto;
                   height:100%;
                  }
                  </style>
                  <?php
                  $property_photos = $this->model->view_property_photos($pid);
                  if($property_photos!=NULL){
                  $imgID = 0;
                  foreach($property_photos as $keyPP => $valuePP){
                  $imgID++;
                  $photos[$imgID] = $valuePP;

                  }
                  }
                  //echo var_dump($photos);

                  for($a=1; $a<5; $a++){

                  ?>
                      <div class="col-lg-3 col-sm-12">
                        <div class="form-group">
                                               <label for="exampleInputFile" class="col-md-12 control-label">Photo <?php echo $a; ?></label>
                                               <div class="col-md-12">
                                                 <?php
                  if(!isset($photos[$a])){
                                                  ?>
                                                   <input type="file" class="form-control" placeholder="Picture" onchange="readURL(this,'#blah<?php echo $a; ?>')" name="File[]" id="File[<?php echo $a; ?>]">
                  <?php
                  }
                  ?>
                                         <div style="width:100%; height:150px; margin:auto; border:1px solid #CCC; float:left;" id="picturepreview">
                                           <?php  ?>
                                          <!--<span class="help-block">Photo Preview</span>-->
                                          <img id="blah<?php echo $a; ?>" class="blah" src="<?php if($property_photos!=NULL){ echo BASE_URL.$photos[$a]['photo_url']; }else { echo BASE_URL.ACTIVE_THEME."/house-image.png"; } ?>" alt="your image" />

                                         </div>
                                         <?php
                  if(isset($photos[$a])){
                                          ?>


                  <?php
                  }
                  ?>
                                               </div>
                                           </div>
                  </div>
                  <?php
                  }
                  ?>

                  </div>

                  </form>
              <!--END CONTENT-->
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Poperty Address</h3>

                                                    <div class="form-group ">

                                                          <label class="control-label col-md-3">State</label>

                                                        <div class="col-md-7">
<span class="form-control">
                                                            <?php
                                                            $appagentmodel = $this->model->getStates();
                                                            $states = $this->model->getStates();
                                                            foreach($states as $key => $state){
                                                            if($property['state']==$state['id']) {
                                                             echo $state['name'];
}
                                                             ?>
                                                          <?php
                                   }
                                                           ?>
</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">

                                                          <label class="control-label col-md-3">Local Area</label>

                                                        <div class="col-md-7" >
                                                        <span class="form-control">
                                                              <?php
                                                            $localities = $this->main_model->loadLocalArea($property['state']);
                                                              foreach($localities as $key => $locality){

                                                             if($property['local_area']==$locality['id']) {   echo $locality['name'];
                                                             }

                                     }
                                                             ?>
                                                          </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                          <label class="control-label col-md-3">Area</label>

                                                        <div class="col-md-7" >
                                                          <span class="form-control">

                                                                                             <?php
                                                                                        $areas = $this->main_model->loadArea($property['local_area']);
                                                                                             foreach($areas as $key => $area){
                                                                                             if($property['area']==$area['id']) { echo $area['name'];   }
                                                                                           }
                                                                                            ?>
                                                      </span>
                                                        </div>

                                                    </div>

                                                    <div class="form-group ">
                                                      <div class="row">
                                                        <div class="col-md-12">

                                                          <div class="container">
                                                            <!-- Search input -->
                                                            <input id="searchInput" name="address" value="<?php echo $property['address']; ?>" class="controls" type="text" placeholder="Enter a location" readonly>

                                                            <!-- Google map -->
                                                            <div id="map"></div>

                                                            <!-- Display geo location data -->
                                                            <ul class="geo-data">
                                                              <li>Full Address: <span id="location"><?php echo $property['address']; ?></span></li>
                                                              <li>Postal Code: <span id="postal_code"></span></li>
                                                              <li>Country: <span id="country">Nigeria</span></li>
                                                              <li>Latitude: <span id="lat"><?php echo $property['latitude']; ?></span></li>
                                                              <li>Longitude: <span id="lon"><?php echo $property['longitude']; ?></span></li>
                                                            </ul>
                                                          </div>
                                                          <input type="hidden" id="longitude" name="longitude" value="<?php echo $property['longitude']; ?>" />
                          <input type="hidden" id="latitude" name="latitude" value="<?php echo $property['longitude']; ?>" />
                                                        </div>
                                                      </div>
                                                    </div>

											</div>
                      <div class="tab-pane" id="tab3">

                          <div class="form-group ">

                                <label class="control-label col-md-3">Currency</label>

                              <div class="col-md-9" >
                              <span class="form-control">
                                   <?php echo $property['currency']; ?></span>
                              </div>

                          </div>

                          <div class="form-group ">

                                <label class="control-label col-md-3" id="examplenameInputname2">Amount</label>

                              <div class="col-md-9">
<span class="form-control">
                              <?php echo $property['amount']; ?>
                            </span>
                              </div>

                          </div>

                          <div class="form-group ">

                                <label class="control-label col-md-3">Duration</label>

                              <div class="col-md-9" >
                                <span class="form-control">
                              <?php echo $property['duration']; ?>
                            </span>
                              </div>

                          </div>

											</div>
											<div class="tab-pane" id="tab4">

                        <div class="form-group ">

                              <label class="control-label col-md-3">Features</label>

                              <div class="col-md-7">
                              <div class="selectgroup selectgroup-pills">
                                <?php
                                 $features = $this->model->view_features();
                                 foreach($features as $key=>$value){
                                   $feature_name = $this->model->getPropertyFeature($pid,$value['id']);
if($feature_name!=$value['id'])
continue;
                                 ?>
                                <label class="selectgroup-item">
                                  <input type="checkbox" name="property_features[]" value="<?php echo $value['id']; ?>" class="selectgroup-input" <?php if($feature_name==$value['id']){ echo "checked"; } ?> disabled>
                                  <span class="selectgroup-button"><?php echo $value['name']; ?></span>
                                </label>
                      <?php
                      }
                      ?>

                      </div>
                              </div>

                            </div>


											</div>
</form>
                      	<div class="tab-pane" id="tab5">

<div class="row">
 <div class="col-md-6 col-md-offset-3">
   <div class="clearfix">
   													<h4 class="block">Perform an action on this property using any of the buttons below</h4>
<?php
  if($p_status=="Submitted"){
 ?>
   													<a onclick="return confirm('Are you sure??')"  href="<?php echo BASE_URL; ?>AppAdmin/change_status/<?php echo $pid; ?>?action=Reject" class="btn blue-madison">Reject</a>
                            <?php
                            }
                             ?>
                             <?php
                               if($p_status=="Submitted"||$p_status=="Unpublished"){
                              ?>
                            	<a href="<?php echo BASE_URL; ?>AppAdmin/change_status/<?php echo $pid; ?>?action=Publish" onclick="return confirm('Are you sure??')" class="btn blue-madison">Publish</a>

                              <?php
                              }
                               ?>
                               <?php
                                 if($p_status=="Published"){
                                ?>
                               	<a onclick="return confirm('Are you sure??')" href="<?php echo BASE_URL; ?>AppAdmin/change_status/<?php echo $pid; ?>?action=Un-Publish" class="btn blue-madison">Un-Publish</a>

                              	<a onclick="return confirm('Are you sure??')" href="<?php echo BASE_URL; ?>AppAdmin/change_status/<?php echo $pid; ?>?action=Featured" class="btn blue-madison">Make Featured</a>
<a href="<?php echo BASE_URL; ?>AppAdmin/change_status/<?php echo $pid; ?>?action=Notfeatured" onclick="return confirm('Are you sure??')" class="btn blue-madison">Disable Featured</a>
<?php
}
 ?>
                              	<a href="<?php echo BASE_URL; ?>AppAdmin/change_status/<?php echo $pid; ?>?action=Delete" onclick="return confirm('Are you sure??')" class="btn blue-madison">Remove</a>

   												</div>
 </div>
</div>

                        </div>

										</div>
									</div>

								</div>
							</form>
						</div>
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
 <script type="text/javascript">

 function page1(){

   $("#page1").css("display","block");

    $("#page2").css("display","none");

 }

    function page2(){

      $("#page1").css("display","none");

       $("#page2").css("display","block");

    }

    function page3(){

     // $("#page1").css("display","none");

      $("#page2").css("display","none");

       $("#page3").css("display","block");

    }

    function page4(){

      //$("#page1").css("display","none");

      $("#page3").css("display","none");

       $("#page4").css("display","block");

    }

    function readURL(input,div) {

           if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                   $(div).attr('src', e.target.result);
               }

               reader.readAsDataURL(input.files[0]);
           }
       }

       function previewPhoto(url,div){
           readURL(url,div);
       }

     //function PreviewPicture(pic){
       //document.getElementById("picturepreview").innerHTML = "<img src='"+pic+"' />";
     //}

 </script>
