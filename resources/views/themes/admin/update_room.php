<?php
require_once("header.php");

$rid = $this->rid;

$room = $this->model->view_room($rid);

foreach($room as $value){

$room = $value;

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
            									Update a room
            										</div>

            									</div>
            									<div class="portlet-body form">
            										<!-- BEGIN FORM-->
            										<form action="<?php echo BASE_URL; ?>AppAdmin/process_update_room" method="post" class="form-horizontal" enctype="multipart/form-data">
            											<div class="form-body">

            <div class="form-group">

                <label class="col-md-3 control-label" id="examplenameInputname2">Room Title</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" id="title" placeholder="eg Standard Room" name="title" required value="<?php echo $room['title']; ?>">
                </div>

            </div>

          <div class="form-group ">

                <label class="control-label col-md-3" id="examplenameInputname2">Rate</label>

              <div class="col-md-7">
                <input type="text" class="form-control" id="amount" placeholder"Amount" name="amount" required value="<?php echo $room['amount']; ?>">
              </div>

          </div>

          <div class="form-group ">

                <label class="control-label col-md-3" id="examplenameInputname2">Quantity</label>

              <div class="col-md-7">
                <input type="text" class="form-control" id="quantity" placeholder"Quantity" name="quantity" required value="<?php echo $room['quantity']; ?>">
              </div>

          </div>

          <div class="form-group ">

                <label class="control-label col-md-3" id="examplenameInputname2">Availability</label>

              <div class="col-md-7">
                <select class="form-control" name="availability">

                  <option value="">Select an option</option>
                  <option value="Available" <?php if($room['availability']=="Available"){ echo "Selected='selected'"; } ?>>Available</option>
                  <option value="Unavailable" <?php if($room['availability']=="Unavailable"){ echo "Selected='selected'"; } ?>>Unavailable</option>
                </select>
              </div>

          </div>

           <input type="hidden" name="property_id" value="<?php echo $room['property_id']; ?>" />

           <input type="hidden" name="id" value="<?php echo $room['id']; ?>" />

         <div class="row">
         <style type="text/css">
         .blah {
          width:100%;
         margin:auto;
         height:100%;
         }
         </style>
         <?php
         $property_photos = $this->model->view_room_photos($rid);
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
                               <a href="<?php echo BASE_URL; ?>AppAdmin/process_default_room_photo/<?php echo $photos[$a]['id']; ?>?rid=<?php echo $rid; ?>&property_id=<?php echo $room['property_id']; ?>" onclick="return confirm('Are you sure');" class="btn btn-primary">Make Default</a>

                              <a href="<?php echo BASE_URL; ?>AppAdmin/process_delete_room_photo/<?php echo $photos[$a]['id']; ?>?rid=<?php echo $rid; ?>&property_id=<?php echo $room['property_id']; ?>" onclick="return confirm('Are you sure');" class="btn btn-primary">Delete Photo</a>

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



            											</div>
            											<div class="form-actions">
            												<div class="row">
            													<div class="col-md-offset-3 col-md-3">
            														<button type="submit" class="btn btn-circle blue">Update</button>
            													</div>

                                      <div class=" col-md-3">
                                        <a href="<?php echo BASE_URL; ?>AppAdmin/update_property/<?php echo $room['property_id']; ?>" class="btn btn-circle blue">Cancel</a>
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
