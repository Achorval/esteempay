<?php
include("header.php");

$user = $this->model->getUser($_SESSION['UserID']);

foreach($user as $key => $value){

$firstname = $value['firstname'];

$lastname = $value['lastname'];

$email = $value['email'];

}

?>

<div id="appCapsule" class="col-lg-6 mx-auto">

   
        
        <div class="listview-title mt-1">Security</div>
        <ul class="listview image-listview text mb-2 inset">
            <li>
                <a href="<?php echo BASE_URL; ?>AppUser/update_password_code" class="item">
                    <div class="in">
                        <div>Update Password</div>
                    </div>
                </a>
            </li>
    
        </ul>


    </div>
    
    <?php
include("footer.php");
?>