<?php
include("header.php");

?>

   <div id="toastError" class="toast-box toast-top " style="background:#FF396F; z-index:1100;">
            <div class="in ">
                <div class="text ">
                </div>
            </div>
        </div>

<div id="appCapsule">
<div class="col-md-8 mx-auto">
        <div class="section mt-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Update Password</h2>
                 <form id="update_password_form" name="update_password_form" method="post" action="<?php echo BASE_URL; ?>AppUser/processResetPassword">
                        <div class="form-group boxed">
                            <div class="input-wrapper not-empty">
                                <label class="label" for="password4b">Reset Code</label>
                                <input type="text" autocomplete="off" class="form-control" id="reset_code" name="reset_code" placeholder="Password reset code">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                                <div class="form-group boxed">
                            <div class="input-wrapper not-empty">
                                <label class="label" for="password4b">New Password</label>
                                <input type="password" autocomplete="off" class="form-control" id="user_password" name="user_password" placeholder="New Password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                            <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" id="update_user_password">Update Password</button>
                </div>
                
                        
                    </form>
                </div>
            </div>
        </div>
</div>

    </div>


<?php
include("footer.php");
?>