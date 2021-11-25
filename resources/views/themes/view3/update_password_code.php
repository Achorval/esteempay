<?php
include("header.php");

$cards = $this->model->cards($_SESSION['UserID']);

$transactions = $this->model->getTransactions($_SESSION['UserID']);
?>

<div id="appCapsule">
<div class="col-md-8 mx-auto">
        <div class="section mt-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Update Password</h2>
                 <form action="<?php echo BASE_URL; ?>AppUser/sendPasswordResetCode" method="post">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <span><?php echo $email; ?></span>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        
                    </div>
                </div>
                
                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Reset Password</button>
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