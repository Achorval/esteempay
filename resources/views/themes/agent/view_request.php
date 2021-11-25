<?php
require_once("header.php");

$id = $this->id;

$property_request = $this->model->view_property_request($id);

foreach($property_request as $key=>$value){

$request = $value;

}

if($request['sale_type']=="for_rent"){

    $sale_type = "To rent";

}
else if($request['sale_type']=="for_sale"){

    $sale_type = "To Buy";

}
else if($request['sale_type']=="shortlet"){

  $sale_type ="To Shortlet";

}

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
              										View Property Request
              										</div>

              									</div>
              									<div class="portlet-body form">
              										<!-- BEGIN FORM-->
              										<form action="process_post_property" method="post" class="form-horizontal">
              											<div class="form-body">
                                        <div class="form-group">
                                          <div class="col-md-7 control-label">
    <h3>Client wants to <?php echo $sale_type; ?> a <?php if($request['bedrooms']!=""){ echo $request['bedrooms'].'Bedroom';
if($request['bedrooms']>1){

echo "s";

}
} ?><?php echo "&nbsp;".$this->main_model->getCatName($request['category']); ?></h3>

  </div>
</div>


              <div class="form-group">

                  <label class="col-md-5 control-label" id="examplenameInputname2">
<b>Location details:</b>
                  </label>

              </div>

             <div class="form-group">

                  <label class="col-md-3 control-label">State</label>

                  <div class="col-md-7">
                    <div class="form-control">

<?php
                       echo $this->main_model->getStateName($request['state']);

       ?>
</div>
                </div>

            </div>

            <div class="form-group ">

                  <label class="control-label col-md-3">Local Area</label>

                  <div class="col-md-7">
                    <div class="form-control">

<?php
                       echo $this->main_model->getLocalAreaName($request['local_area']);

       ?>
</div>
                </div>

            </div>

            <div class="form-group ">

                  <label class="control-label col-md-3">Area</label>

                  <div class="col-md-7">
                    <div class="form-control">

<?php
                       echo $this->main_model->getAreaName($request['area']);

       ?>
</div>
                </div>

            </div>

            <div class="form-group">

                <label class="col-md-5 control-label" id="examplenameInputname2">
<b>Client's Budget:</b>
                </label>

            </div>

            <div class="form-group ">

                  <label class="control-label col-md-3">Max Amount</label>

                <div class="col-md-7" >
            <div class="form-control">
&#8358;<?php echo number_format($request['max_price'],2); ?>
            </div>
                </div>

            </div>



            <div class="form-group ">

                  <label class="control-label col-md-3">Contact Options:</label>

                <div class="col-md-7" >
<a href="tel:<?php echo $request['phone_number']; ?>" class="btn btn-sm blue">Call Client</a>
<a href="https://api.whatsapp.com/send?phone=+234<?php echo $request['phone_number']; ?>" target="_blank" class="btn btn-sm blue">WhatsApp Client</a>
<hr />
Phone: <?php echo $request['phone_number']; ?>
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
require_once("footer.php");
 ?>
