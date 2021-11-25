<?php
require_once("header.php");

$currency = getSetting("currency");
 ?>
<!-- BEGIN CONTAINER -->

	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->

				<!-- END PAGE TITLE -->
				<!-- BEGIN PAGE TOOLBAR -->
				<!-- END PAGE TOOLBAR -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->

			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
      <div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="col-md-12 col-sm-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">


              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-user"></i>Your payment history
                </div>

              </div>
              <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" >
                <thead>

                <tr>

                  <th>Date</th>
                  <th>
                     Amount
                  </th>
                  <th>
                    Remark
                  </th>

                  <th>
                     Status
                  </th>


                </tr>

                </thead>
                <tbody>
                  <?php
                    $agent = $userdata['id'];

                  $payments = getUserPayments($agent);

                  $payment_id = $payments->id;

                    foreach($payments as $key => $value){



?>

                <tr class="odd gradeX">

                  <td>
<?php echo $value->date; ?>
                  </td>

                  <td>
                     <?php echo $currency.number_format($value->amount,2); ?>
                  </td>

                  <td>
              <?php  echo $value->remark; ?>
                  </td>

                  <td>
              <?php echo $value->status; ?>
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
</div>
</div>

	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
require_once("footer.php");
 ?>
