<?php require_once "resources/views/app/headerError.php"; ?>


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Error title -->
				<div class="text-center content-group">
					<h1 class="error-title">404</h1>
					<h5>Oops, an error has occurred. Page not found!</h5>
				</div>
				<!-- /error title -->


				<!-- Error content -->
				<div class="row">
					<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="text-center">
                            <a href="<?php echo BASE_URL; ?>" class="btn bg-pink-400"><i class="icon-circle-left2 position-left"></i> Back to home</a>
                        </div>						
					</div>
				</div>
				<!-- /error wrapper -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	
<?php require_once "resources/views/app/footer.php"; ?>