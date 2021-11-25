<?php
class User extends BaseController {

       public function __construct(){

                    parent::__construct();

                    Session::init();

                    if (Session::get('IsLoggedIn') != "true") {

                        $this->redirect(BASE_URL."login");

                        exit();

                    }
                    if (Session::get('UserType') != "User") {

                        $this->redirect(BASE_URL."login");

                        exit();

                    }

                }

  public function index() {

		$this->view->title = SITE_TITLE;

		return $this->view->render('themes/user/index');

	}

  public function post_property() {

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;

    return $this->view->render('themes/user/post_property');

  }

  public function profile() {

    $user_id = $_SESSION['userid'];

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA("Main");

    $this->view->userprofile = $this->view->main_model->view_user($user_id);

    return $this->view->render('themes/user/profile');

  }

  public function manage_properties() {

    $this->view->title = "Manage Properties - ".SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA("Main");

    return $this->view->render('themes/user/manage_properties');

  }

  public function callback_requests() {

    $this->view->title = "Callback Requests - ".SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA("Main");

    return $this->view->render('themes/user/callback_requests');

  }



function process_update_profile(){

  if(!empty($_POST)){

    $data = $_POST;

    foreach($data as $value){

    $id = $this->model->db->escapeString($_POST['id']);

    $firstname = $this->model->db->escapeString($_POST['firstname']);

    $lastname = $this->model->db->escapeString($_POST['lastname']);

    $phone  = $this->model->db->escapeString($_POST['phone']);

    $newpassword1 = $this->model->db->escapeString($_POST['newpassword1']);

    $newpassword2  = $this->model->db->escapeString($_POST['newpassword2']);

    $oldpassword = $this->model->db->escapeString($_POST['oldpassword']);

    $meta_key = $_POST['meta_key'];

  }

  //SEND ACTIVATION EMAIL TO REGISTERED USER
  //$mail = new sendgrid();
  $update_rate = $this->model->db->queryDB("UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone' WHERE id = '$id'");

    $get_all_meta = $this->model->db->queryDB("SELECT * FROM `usermeta` WHERE user_id = '$id'");

//$meta_data = array();

foreach($meta_key as $keyMK1 => $valueMK1){

$keyFromForm[] = rtrim(ltrim($keyMK1,"'"),"'");

}

    foreach($get_all_meta as $keyGAM => $valueGAM){

$meta_data[$valueGAM['meta_key']] = $valueGAM['meta_value'];

$keyMain = $valueGAM['meta_key'];

if(!in_array($valueGAM['meta_key'],$keyFromForm)){

  $get_all_meta = $this->model->db->queryDB("DELETE FROM `usermeta` WHERE user_id = '$id'  AND meta_key='$keyMain'");

}

    }


  foreach($meta_key as $keyMK => $valueMK){

    //$this->view->main_model = $this->loadModelA("Main");

    //echo $keyMK.'='.$valueMK.'<br />';

    $this->model->add_update_meta($id,$keyMK,$valueMK);

  }
//exit;

    $user = $this->model->db->queryDB("SELECT password FROM users WHERE id = '$id'");

    foreach($user as $keyU => $valueU){

        $currentpassword = $valueU['password'];

      }
    //$hashPass = md5( trim( $oldpassword ) );

    //$checkpass = password_verify($oldpassword,$currentpassword);


  if($newpassword1!=""){

   if($newpassword1!=$newpassword2){

     $redirect_to = "Appuser/profile?&msg=updtd&passwd=err1";

     $this->redirect( BASE_URL.$redirect_to );

     exit;

   }
   else if(password_verify($oldpassword,$currentpassword)&&$newpassword1==$newpassword2){

     $changepassword = password_hash($newpassword1,PASSWORD_DEFAULT);

     $this->model->db->queryDB("UPDATE `users` SET `password`='$changepassword' WHERE id = '$id'");

     $redirect_to = "Appuser/profile?&msg=updtd&passwd=did";

     $this->redirect( BASE_URL.$redirect_to );

      exit;

   }
   else {

    $redirect_to = "Appuser/profile?&msg=updtd&passwd=err2";

    $this->redirect( BASE_URL.$redirect_to );

    exit;

   }


  }


  $redirect_to = "Appuser/profile?&msg=updtd";

 $this->redirect( BASE_URL.$redirect_to );

  exit;
  }
  exit;

}

public function messages() {

  $this->view->title = "Messages - ".SITE_TITLE;

  $this->view->model = $this->model;

  $this->view->main_model = $this->loadModelA("Main");

  return $this->view->render('themes/user/messages');

}

public function send_message() {

  $this->view->title = "Send Message - ".SITE_TITLE;

  $this->view->model = $this->model;

  $this->view->main_model = $this->loadModelA("Main");

  return $this->view->render('themes/user/send_message');

}


}
