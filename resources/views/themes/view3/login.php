<?php
include("header_front.php");
?>


    <!-- App Capsule -->
    <div id="appCapsule">
  <div class="col-md-7 mx-auto">
        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>Fill the form to log in</h4>
        </div>
        <div class="section mb-5 p-2">

            <form action="<?php echo BASE_URL; ?>process_login" method="post">
                <div class="card">
                             <?php 
			if(isset($_GET['msg'])){
			if($_GET['msg']=="password_changed"){
			?>
             <div class="alert alert-success mb-1" role="alert">
                       Your password has been changed successfully! 
                    </div>
            <?php
            }
			}
			?>
                                <?php 
			if(isset($_GET['msg'])){
			if($_GET['msg']=="s"){
			?>
             <div class="alert alert-success mb-1" role="alert">
                       Your account was created successfully! 
                    </div>
            <?php
            }
			}
			?>
                          <?php 
			if(isset($_GET['err'])){
			if($_GET['err']=="p"){
			?>
            <div class="alert alert-outline-danger mb-1" role="alert">
                        An error occurred! Incorrect password
                    </div>
            <?php
			}
			if($_GET['err']=="d"){
			?>
              <div class="alert alert-outline-danger mb-1" role="alert">
                        User not found!
                    </div>
            <?php
            }
					if($_GET['err']=="invalid_code"){
			?>
              <div class="alert alert-outline-danger mb-1" role="alert">
                       Invalid code
                    </div>
            <?php
            }
			}
			?>
            
            
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="username" name="username" placeholder="Your e-mail" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                                    placeholder="Your password" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                        <a href="<?php echo BASE_URL; ?>register">Register Now</a>
                    </div>
                    <div><a href="<?php echo BASE_URL; ?>send_reset_code" >Forgot Password?</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>
</div>
    </div>
    <!-- * App Capsule -->


<!-- iOS Add to Home Action Sheet -->
    <div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="index.html#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1"><img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>Finapp</strong> on your iPhone's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="share-outline"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- * iOS Add to Home Action Sheet -->


    <!-- Android Add to Home Action Sheet -->
    <div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1"
        role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="index.html#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1">
                            <img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>Finapp</strong> on your Android's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Android Add to Home Action Sheet -->



    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/plugins/splide/splide.min.js"></script>
   <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/jquery-3.6.0.min.js"></script>
    <!-- Base Js File -->
    <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/base.js"></script>

    <script>
        // Add to Home with 2 seconds delay.
       // AddtoHome("2000", "once");
	
    </script>

</body>

</html>