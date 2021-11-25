<?php
require_once("header.php");

$pid = $this->pid;

$property = $this->model->view_property($pid);

foreach($property as $value){

$property = $value;

}

$sale_type = $value['sale_type'];

$use_type = $value['property_use'];
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
								<i class="fa fa-gift"></i> Update a property - <span class="step-title">
								Step 1 of 5 </span>
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
							    <form class="form-horizontal" action="<?php echo BASE_URL; ?>AppAgent/process_update_property" id="submit_form" method="post" >
                    <input type="hidden" value="<?php echo $property['id']; ?>" name="id" />
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Details </span>
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
												<i class="fa fa-check"></i> Pricing </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i>Features </span>
												</a>
											</li>

                      <li>
                        <a href="#tab5" data-toggle="tab" class="step">
                        <span class="number">
                        4 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Photos </span>
                        </a>
                      </li>
<!--
                      <li>
                        <a href="#tab6" data-toggle="tab" class="step">
                        <span class="number">
                        4 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Video </span>
                        </a>
                      </li>-->

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
												<h3 class="block">Add property information</h3>
							<!-- START CONTENT-->
              <div class="form-group ">

                    <label class="control-label col-md-3" id="examplenameInputname2">Title</label>

                  <div class="col-md-7">
                    <input type="text" class="form-control" id="address" placeholder="eg Newly built 3 bedroom flat in Lekki" name="title" value="<?php echo $property['title']; ?>" required>
                  </div>
              </div>

              <div class="form-group ">

                    <label class="control-label col-md-3" id="examplenameInputname2">Description</label>

                  <div class="col-md-7">
                    <textarea type="text" class="form-control" id="address" placeholder="eg Enter property description" name="description" ><?php echo $property['description']; ?></textarea>
                  </div>
              </div>

              <div class="form-group ">

                    <label class="control-label col-md-3">Sale Type</label>

                    <div class="col-md-7">
                    <div class="selectgroup selectgroup-pills">
                      <label class="selectgroup-item">
                        <input type="radio" name="sale_type" value="for_rent" class="selectgroup-input" <?php if($sale_type=="for_rent"){ echo "checked"; }; ?>>
                        <span class="selectgroup-button">For Rent</span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="sale_type" value="for_sale" class="selectgroup-input" <?php if($sale_type=="for_sale"){ echo "checked"; }; ?>>
                        <span class="selectgroup-button">For Sale</span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="sale_type" value="for_shortlet" class="selectgroup-input" <?php if($sale_type=="for_shortlet"){ echo "checked"; }; ?>>
                        <span class="selectgroup-button">For Shortlet</span>
                      </label>
        </div>
                    </div>

                  </div>

                  <div class="form-group ">

                        <label class="control-label col-md-3">Use Type</label>

                        <div class="col-md-7">
                        <div class="selectgroup selectgroup-pills">
                          <label class="selectgroup-item">
                            <input type="radio" name="property_use" value="Commercial" class="selectgroup-input" <?php if($use_type=="Commercial"){ echo "checked"; }; ?>>
                            <span class="selectgroup-button">Commercial</span>
                          </label>

                          <label class="selectgroup-item">
                            <input type="radio" name="property_use" value="Residential" class="selectgroup-input" <?php if($use_type=="Residential"){ echo "checked"; }; ?>>
                            <span class="selectgroup-button">Residential</span>
                          </label>
        </div>
                        </div>

                      </div>

                      <div class="form-group ">

                            <label class="control-label col-md-3">Category</label>

                          <div class="col-md-7" >
                            <select class="form-control" id="category" name="category" onchange="loadSubCat(this.value)" >
                              <option value="">Select an option</option>
                              <?php
        $categories = $this->model->view_categories();
                               ?>

                               <?php
                               foreach($categories as $keyC => $valueC){
                                 ?>
                                 <option value="<?php echo $valueC['id']; ?>" <?php if($property['category']==$valueC['id']){ echo "selected"; } ?>><?php echo $valueC['name']; ?></option>
                                 <?php
        }
                                  ?>
                            </select>
                          </div>
                      </div>

                      <div class="form-group ">

                            <label class="col-md-3 control-label">Sub Category</label>

                          <div class="col-md-7" >
                            <select class="form-control" id="sub_category" name="sub_category" >
                        <option value="<?php echo $property['sub_category']; ?>"><?php echo $this->model->getSubCatName($property['sub_category']); ?></option>
                            </select>
                          </div>

                      </div>

                      <div class="form-group ">

                            <label class="control-label col-md-3">Bedrooms</label>

                          <div class="col-md-7" >
                            <select class="form-control" id="bedrooms" name="bedrooms" >
                              <option value="">Select an option</option>
                              <?php
                              $i=0;
                              for($i=1; $i<11; $i++){
                               ?>
        <option value="<?php echo $i; ?>" <?php if($i==$property['bedrooms']) { echo "selected"; } ?>><?php echo $i; ?></option>
                               <?php
        }
                                ?>
                            </select>
                          </div>

                      </div>

                      <div class="form-group ">

                            <label class="col-md-3 control-label">Bathrooms</label>

                          <div class="col-md-7" >
                            <select class="form-control" id="bathrooms" name="bathrooms" >
                              <option value="">Select an option</option>
                              <?php
                              $p=0;
                              for($p=1; $p<11; $p++){
                               ?>
        <option value="<?php echo $p; ?>" <?php if($p==$property['bathrooms']) { echo "selected"; } ?>><?php echo $p; ?></option>
                               <?php
        }
                                ?>
                            </select>
                          </div>
                      </div>

                      <div class="form-group ">

                            <label class="col-md-3 control-label">Toilets</label>

                          <div class="col-md-7" >
                            <select class="form-control" id="toilets" name="toilets" >
                              <option value="">Select an option</option>
                              <?php
                              $o=0;
                              for($o=1; $o<11; $o++){
                               ?>
        <option value="<?php echo $o; ?>" <?php if($o==$property['toilets']) { echo "selected"; } ?>><?php echo $o; ?></option>
                               <?php
        }
                                ?>
                            </select>
                          </div>

                      </div>

                      <div class="form-group ">

                            <label class="control-label col-md-3" id="examplenameInputname2">Square Ft</label>

                          <div class="col-md-7">
                            <input type="text" class="form-control" id="square_feet" placeholder="Property Square feet" name="square_feet" value="<?php echo $property['square_feet']; ?>">
                          </div>
                      </div>

                      <div class="form-group ">

                            <label class="control-label col-md-3" id="examplenameInputname2">Number of Cars</label>

                          <div class="col-md-7">
                            <input type="text" class="form-control" id="no_of_cars" placeholder="Number of cars" name="no_of_cars" value="<?php echo $property['no_of_cars']; ?>" >
                          </div>
                      </div>

                      <div class="form-group ">


                            <label class="col-md-3 control-label">Property Condition</label>

                          <div class="col-md-7" >
                            <select class="form-control" id="property_condition" name="property_condition" >
                              <option value="">Select an option</option>
                              <option <?php if($property['property_condition']=="New") { echo "selected"; } ?>>New</option>
                              <option <?php if($property['property_condition']=="Old") { echo "selected"; } ?>>Old</option>
                              <option <?php if($property['property_condition']=="Refurbished") { echo "selected"; } ?>>Refurbished</option>
                            </select>
                          </div>
                      </div>
                      
                      <div class="form-group">
                      <label class="col-md-3 control-label">Video</label>
                      <div class="col-md-7">
                      <input type="text" class="form-control" id="video_link"  name="video_link" value="<?php echo $property['video_link']; ?>">
                      </div>
                      </div>
              <!--END CONTENT-->
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Poperty Address</h3>

                                                    <div class="form-group ">

                                                          <label class="control-label col-md-3">State</label>

                                                        <div class="col-md-7">
                                                          <select class="form-control" onchange="showLocalArea(this.value)" name="state">

                                                            <?php
                                                            $appagentmodel = $this->model->getStates();
                                                            $states = $this->model->getStates();
                                                            foreach($states as $key => $state){
                                                              ?>
                                                            <option value="<?php echo $state['id']; ?>" <?php if($property['state']==$state['id']) { echo "selected"; } ?>><?php echo $state['name']; ?></option>
                                                          <?php
                                   }
                                                           ?>
                                                          </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">

                                                          <label class="control-label col-md-3">Local Area</label>

                                                        <div class="col-md-9" >
                                                          <select class="form-control" id="localities" name="local_area" onchange="showArea(this.value);" >
                                                              <?php
                                                            $localities = $this->main_model->loadLocalArea($property['state']);
                                                              foreach($localities as $key => $locality){
                                                                ?>
                                                              <option value="<?php echo $locality['id']; ?>" <?php if($property['local_area']==$locality['id']) { echo "selected"; } ?>><?php echo $locality['name']; ?></option>
                                                            <?php
                                     }
                                                             ?>
                                                          </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                          <label class="control-label col-md-3">Area</label>

                                                        <div class="col-md-9" >
                                                          <select class="form-control" id="area" name="area" >

                                                                                             <?php
                                                                                        $areas = $this->main_model->loadArea($property['local_area']);
                                                                                             foreach($areas as $key => $area){
                                                                                               ?>
                                                                                             <option value="<?php echo $area['id']; ?>" <?php if($property['area']==$area['id']) { echo "selected"; } ?>><?php echo $area['name']; ?></option>
                                                                                           <?php
                                                                    }
                                                                                            ?>
                                                          </select>
                                                        </div>

                                                    </div>

                                                    <div class="form-group ">
                                                      <div class="row">
                                                        <div class="col-md-12">

                                                          <div class="container">
                                                            <!-- Search input -->
                                                            <input id="searchInput" name="address" value="<?php echo $property['address']; ?>" class="controls" type="text" placeholder="Enter a location">

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
                                <select class="form-control" id="currency" name="currency" >
                                   <option value="<?php echo $property['currency']; ?>"><?php echo $property['currency']; ?></option>
                                     <option value="Naira">Naira</option>
                                      <option value="Usd">USD</option>
                                </select>
                              </div>

                          </div>

                          <div class="form-group ">

                                <label class="control-label col-md-3" id="examplenameInputname2">Amount</label>

                              <div class="col-md-9">
                                <input type="text" class="form-control" id="amount" placeholder"Amount" name="amount" value="<?php echo $property['amount']; ?>">
                              </div>

                          </div>

                          <div class="form-group ">

                                <label class="control-label col-md-3">Duration</label>

                              <div class="col-md-9" >
                                <select class="form-control" id="duration" name="duration">
                                     <option value="per_day" <?php if($property['duration']=="per_day"){ echo "selected"; } ?>>Per Day</option>
                                      <option value="per_month" <?php if($property['duration']=="per_month"){ echo "selected"; } ?>>Per Month</option>
                                          <option value="per_year" <?php if($property['duration']=="per_year"){ echo "selected"; } ?>>Per Year</option>
                                              <option value="Once-Off" <?php if($property['duration']=="Once-Off"){ echo "selected"; } ?>>Once-Off</option>
                                </select>
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

                                 ?>
                                <label class="selectgroup-item">
                                  <input type="checkbox" name="property_features[]" value="<?php echo $value['id']; ?>" class="selectgroup-input" <?php if($feature_name==$value['id']){ echo "checked"; } ?> >
                                  <span class="selectgroup-button"><?php echo $value['name']; ?></span>
                                </label>
                      <?php
                      }
                      ?>

                      </div>
                              </div>

                            </div>

<div class="" style="width:150px; margin-left:auto; margin-right:auto;" >
  Note: Remember to submit any update to this property first below before continuing to photo upload
                            <button type="submit" class="btn green button-submit">
                             Submit <i class="m-icon-swapright m-icon-white"></i>
                            </button>
                          </div>

											</div>
</form>
                      	<div class="tab-pane" id="tab5">

                          <form action="<?php echo BASE_URL; ?>AppAgent/process_upload_property_photos" enctype="multipart/form-data" method="post" />
                            <input type="hidden" name="property_id" value="<?php echo $pid; ?>" />
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

                      for($a=1; $a<11; $a++){

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
                                              <a href="<?php echo BASE_URL; ?>AppAgent/process_default_property_photo/<?php echo $photos[$a]['id']; ?>?pid=<?php echo $pid; ?>" onclick="return confirm('Are you sure');" class="btn btn-primary">Make Default</a>

                                             <a href="<?php echo BASE_URL; ?>AppAgent/process_delete_property_photo/<?php echo $photos[$a]['id']; ?>?pid=<?php echo $pid; ?>" onclick="return confirm('Are you sure');" class="btn btn-primary">Delete Photo</a>

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

                      <div class="form-group mb-0 row justify-content-end" >
                      <div class="col-md-9 float-right" style="margin-bottom:20px; margin-top:20px;">
                      <button type="submit" class="btn btn-primary" name="action" value="upload_photos">Upload Photos</button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light" name="action" value="delete_photos">Delete All</button>
                      </div>
                      </div>
                      </form>

                        </div>

                        <!--	<div class="tab-pane" id="tab6">

                        </div>-->

										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>
												<a href="javascript:;" class="btn blue button-next">
												Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>
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
