<!DOCTYPE html>
<html lang="zxx" class="js">
   <head>
      <meta charset="utf-8">
      <meta name="author" content="Softnio">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Fully featured and complete ICO Dashboard template for ICO backend management.">
      <!-- Fav Icon -->
      <link rel="shortcut icon" href="images/favicon.png">
      <!-- Site Title  -->
      <title>TokenWiz - ICO User Dashboard Admin Template</title>
      <!-- Vendor Bundle CSS -->
      <link rel="stylesheet" href="<?php echo BASE_URL.ACTIVE_THEME; ?>assets/css/vendor.bundle.css@ver=104.css">
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="<?php echo BASE_URL.ACTIVE_THEME; ?>assets/css/style.css@ver=104.css" id="layoutstyle">
      <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-91615293-2', 'auto');ga('send', 'pageview');</script>
   </head>
   <body class="page-ath">
      <div class="page-ath-wrap">
         <div class="page-ath-content">
            <div class="page-ath-header"><a href="index.html" class="page-ath-logo"><img src="<?php echo BASE_URL.ACTIVE_THEME; ?>images/logo.png" srcset="images/logo2x.png 2x" alt="logo"></a></div>
            <div class="page-ath-form">
               <h2 class="page-ath-heading">Sign in <small>with your TokenWiz Account</small></h2>
               <form action="<?php echo BASE_URL; ?>process_login" method="post">
                  <div class="input-item"><input type="text" placeholder="Your Email" class="input-bordered" name="username" /></div>
                  <div class="input-item"><input type="password" placeholder="Password" class="input-bordered" name="password" /></div>
                  <div class="d-flex justify-content-between align-items-center">
                     <div class="input-item text-left"><input class="input-checkbox input-checkbox-md" id="remember-me" type="checkbox"><label for="remember-me">Remember Me</label></div>
                     <div>
                        <a href="forgot.html">Forgot password?</a>
                        <div class="gaps-2x"></div>
                     </div>
                  </div>
                  <button class="btn btn-primary btn-block">Sign In</button>
               </form>
               <div class="sap-text"><span>Or Sign In With</span></div>
               <ul class="row guttar-20px guttar-vr-20px">
                  <li class="col"><a href="sign-in.html#" class="btn btn-outline btn-dark btn-facebook btn-block"><em class="fab fa-facebook-f"></em><span>Facebook</span></a></li>
                  <li class="col"><a href="sign-in.html#" class="btn btn-outline btn-dark btn-google btn-block"><em class="fab fa-google"></em><span>Google</span></a></li>
               </ul>
               <div class="gaps-2x"></div>
               <div class="gaps-2x"></div>
               <div class="form-note">Don’t have an account? <a href="<?php echo BASE_URL; ?>register"> <strong>Sign up here</strong></a></div>
            </div>
            <div class="page-ath-footer">
               <ul class="footer-links">
                  <li><a href="regular-page.html">Privacy Policy</a></li>
                  <li><a href="regular-page.html">Terms</a></li>
                  <li>&copy; 2018 TokenWiz.</li>
               </ul>
            </div>
         </div>
         <div class="page-ath-gfx">
            <div class="w-100 d-flex justify-content-center">
               <div class="col-md-8 col-xl-5"><img src="images/ath-gfx.png" alt="image"></div>
            </div>
         </div>
      </div>
      <!-- JavaScript (include all script here) -->
	  	  <script src="<?php echo BASE_URL.ACTIVE_THEME; ?>assets/js/jquery.bundle.js"></script>
	  <script src="<?php echo BASE_URL.ACTIVE_THEME; ?>assets/js/script.js"></script>
        <script src="<?php echo BASE_URL.ACTIVE_THEME; ?>assets/js/sweat.examples.js"></script>
                <?php
			   if(isset($_GET['msg'])){
			   if($_GET['msg']=="s"){
			   ?>
              <!-- <div class="col-lg-3"><a href="alert-sweat.html#" class="btn btn-primary basic-swal">Basic Sweat Alert</a></div>-->
              <script type="text/javascript">
			  
  	            swal("It worked!", "Your registration was successful. You can now login!", "success");
		
			  </script>
                    <?php
					}
					}
					?>
                    
                        <?php
			   if(isset($_GET['err'])){
			   if($_GET['err']=="p"){
			   ?>
              <!-- <div class="col-lg-3"><a href="alert-sweat.html#" class="btn btn-primary basic-swal">Basic Sweat Alert</a></div>-->
              <script type="text/javascript">
			  
  	            swal("An error occurred!", "The password you entered is incorrect!", "error");
		
			  </script>
                    <?php
					}
					if($_GET['err']=="d"){
					?>
                     <script type="text/javascript">
			  
  	            swal("An error occurred!", "This user account doesnt exist!", "error");
		
			  </script>
					<?php
					}
					}
					?>
   </body>
</html>