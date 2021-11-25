<?php
include("header_front.php");
?>
    <!-- App Capsule -->
    <div id="appCapsule">
  <div class="col-md-7 mx-auto">
        <div class="section mt-2 text-center">
            <h1>Register now</h1>
            <h4>Create an account</h4>
    
        </div>
        <div class="section mb-5 p-2">
        
            <form action="<?php echo BASE_URL; ?>process_registration" method="post">
                <div class="card">
                    <div class="card-body">
                            <?php 
			if(isset($_GET['err'])){
			if($_GET['err']=="p"){
			?>
            <div class="alert alert-outline-danger mb-1" role="alert">
                        An error occurred! Passwords didn't match
                    </div>
            <?php
			}
			if($_GET['err']=="e"){
			?>
              <div class="alert alert-outline-danger mb-1" role="alert">
                        A user with this email already exists!
                    </div>
            <?php
            }
			}
			?>
            
            
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="email1" name="email" placeholder="Your e-mail" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="password1" name="password1" autocomplete="off"
                                    placeholder="Your password" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password2">Password Again</label>
                                <input type="password" class="form-control" id="password2" name="password2" autocomplete="off"
                                    placeholder="Type password again" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
<!--
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheckb1">
                                <label class="form-check-label" for="customCheckb1">
                                    I agree <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and
                                        conditions</a>
                                </label>
                            </div>
                        </div>
-->
                    </div>
                </div>

      <div class="form-links mt-2">
                    <div>
                        <a href="<?php echo BASE_URL; ?>login">Back to login</a>
                    </div>
                   
                </div>

                <div class="form-button-group transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
                </div>

            </form>
        </div>
</div>
    </div>
    <!-- * App Capsule -->


    <!-- Terms Modal -->
    <div class="modal fade modalbox" id="termsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms and Conditions</h5>
                    <a href="javascript:;" data-bs-dismiss="modal">Close</a>
                </div>
                <div class="modal-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum, urna eget finibus
                        fermentum, velit metus maximus erat, nec sodales elit justo vitae sapien. Sed fermentum
                        varius erat, et dictum lorem. Cras pulvinar vestibulum purus sed hendrerit. Praesent et
                        auctor dolor. Ut sed ultrices justo. Fusce tortor erat, scelerisque sit amet diam rhoncus,
                        cursus dictum lorem. Ut vitae arcu egestas, congue nulla at, gravida purus.
                    </p>
                    <p>
                        Donec in justo urna. Fusce pretium quam sed viverra blandit. Vivamus a facilisis lectus.
                        Nunc non aliquet nulla. Aenean arcu metus, dictum tincidunt lacinia quis, efficitur vitae
                        dui. Integer id nisi sit amet leo rutrum placerat in ac tortor. Duis sed fermentum mi, ut
                        vulputate ligula.
                    </p>
                    <p>
                        Vivamus eget sodales elit, cursus scelerisque leo. Suspendisse lorem leo, sollicitudin
                        egestas interdum sit amet, sollicitudin tristique ex. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos. Phasellus id ultricies eros. Praesent
                        vulputate interdum dapibus. Duis varius faucibus metus, eget sagittis purus consectetur in.
                        Praesent fringilla tristique sapien, et maximus tellus dapibus a. Quisque nec magna dapibus
                        sapien iaculis consectetur. Fusce in vehicula arcu. Aliquam erat volutpat. Class aptent
                        taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- * Terms Modal -->
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