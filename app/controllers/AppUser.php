<?php
class AppUser extends BaseController {

    var $user_id;

       public function __construct(){

                    parent::__construct();

                    Session::init();

                    if (Session::get('IsLoggedIn') != "true") {

                        $this->redirect(BASE_URL."login");

                        exit();

                    }
                    if(Session::get('UserType') != "public") {

                        $this->redirect(BASE_URL."login");

                        exit();

                    }
                    
					$this->user_id = $_SESSION['UserID'];
					

                }
				
					public function processCreateCard(){
				    
				    $data = array();
				    
				  $data['user_id'] = $_SESSION['UserID'];
				  
				  $data['card_name'] = $_POST['card_name'];
				  
				  $data['amount'] = $_POST['amount'];
				  
				  $data['transaction_fee'] = $_POST['transaction_fee'];
				  
				  if($data['user_id']==""||$data==""){
				      
				      header("Location: ".BASE_URL."AppUser/cards");
				      
				      exit();
				      
				  }
				  
				 $feedback = $this->model->processCreateCard($data);
				  
				  if($feedback['error']=="yes"){
				      
				      header("Location: ".BASE_URL."AppUser/cards?error=yes&message=".$feedback['message']);
				      
				      exit();
				      
				  }else {
				      
				      header("Location: ".BASE_URL."AppUser/cards?error=no&message=".$feedback['message']);
				      
				      exit();
				      
				  }
				
				}
				
					public function processCreateCard(){
				    
				    $data = array();
				    
				  $data['user_id'] = $_SESSION['UserID'];
				  
				  $data['card_name'] = $_POST['card_name'];
				  
				  $data['amount'] = $_POST['amount'];
				  
				  $data['transaction_fee'] = $_POST['transaction_fee'];
				  
				  if($data['user_id']==""||$data==""){
				      
				      header("Location: ".BASE_URL."AppUser/cards");
				      
				      exit();
				      
				  }
				  
				 $feedback = $this->model->processCreateCard($data);
				  
				  if($feedback['error']=="yes"){
				      
				      header("Location: ".BASE_URL."AppUser/cards?error=yes&message=".$feedback['message']);
				      
				      exit();
				      
				  }else {
				      
				      header("Location: ".BASE_URL."AppUser/cards?error=no&message=".$feedback['message']);
				      
				      exit();
				      
				  }
				
				}

  public function index() {

		$this->view->title = SITE_TITLE;
		
		$this->view->model = $this->model;

		return $this->view->render('themes/view3/index');

	}
	
	public function sendPasswordResetCode(){
	
	$user_data = $this->model->getUser($_SESSION['UserID']);

foreach($user_data as $keyD => $valueD){

  $email = $valueD['email'];

}
 
  if($email!=""){
  
    $email = $email;
  
  }else {
  
    header("Location: ".BASE_URL."AppUser/settings");

	exit;
	
  }

  $feedback = $this->model->sendPasswordResetCode($email);

	header("Location: ".BASE_URL."AppUser/update_password?response=".$feedback['response'].'&reason='.$feedback['reason']);
	exit;


}


 public function processResetPassword(){
 
  if(isset($_POST['user_password'])){
  
    $password = $_POST['user_password'];
	
	$reset_code = $_POST['reset_code'];
  
  }else {
  
    header("Location: ".BASE_URL."AppUser/update_password_code");

	exit;
	
  }

  $feedback = $this->model->processResetPassword($password,$reset_code);
  
  session_unset();
session_destroy();

	header("Location: ".BASE_URL."login?msg=".$feedback['response']);
	exit;


}

	
	 public function transactions() {

		$this->view->title = SITE_TITLE;
		
		$this->view->model = $this->model;

		return $this->view->render('themes/view3/transactions');

	}

	 public function cards() {

		$this->view->title = SITE_TITLE;
		
		$this->view->model = $this->model;
		
		$this->view->user_id = $_SESSION['UserID'];

		return $this->view->render('themes/view3/cards');

	}
	
	 public function sendmoney() {

		$this->view->title = SITE_TITLE;
		
		$this->view->model = $this->model;

		return $this->view->render('themes/view3/sendmoney');

	}
	
	
		 public function update_password_code() {

		$this->view->title = SITE_TITLE;
		
		$this->view->model = $this->model;

		return $this->view->render('themes/view3/update_password_code');

	}
	
		 public function settings() {

		$this->view->title = SITE_TITLE;
		
		$this->view->model = $this->model;

		return $this->view->render('themes/view3/settings');

	}

  public function wallets() {

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;
	
	$this->view->user_id = $this->user_id;

    return $this->view->render('themes/view3/wallets');

  }
  
    public function update_password() {

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;
	
	$this->view->user_id = $this->user_id;

    return $this->view->render('themes/view3/update_password');

  }
  
    public function withdraw() {

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;
	
	$this->view->user_id = $this->user_id;

    return $this->view->render('themes/view3/withdraw');

  }
  
   public function tokens($wallet_id="") {
   
    if($wallet_id == ""){
	 
	  header("Location: ".BASE_URL."AppUser/wallets");
	  
	  exit();
	
	}

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;
	
	$this->view->user_id = $this->user_id;
	
	$this->view->wallet_id = $wallet_id;

    return $this->view->render('themes/view3/tokens');

  }
  
   public function card($card_id="") {
  
    if($card_id==""){
	
	  header("location: ".BASE_URL.'AppUser/cards');
	  
	  exit();
	  
	  }

    $user_id = $_SESSION['userid'];

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA("main");

    $this->view->userprofile = $this->view->main_model->view_user($user_id);
	
	$this->view->card_id = $card_id;
	
	$this->view->user_id = $_SESSION['UserID'];
	
	$cardData = $this->model->viewCard($card_id);
	
	$this->view->cardData = $cardData;

	if($cardData == NULL){
	
	  header("location: ".BASE_URL.'AppUser/cards');
	  
	  exit();
	  
	}

    return $this->view->render('themes/view3/card');

  }

  public function wallet($wallet="") {
  
    if($wallet==""){
	
	  header("location: ".BASE_URL.'AppUser/wallets');
	  
	  exit();
	  
	  }

    $user_id = $_SESSION['userid'];

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA("main");

    $this->view->userprofile = $this->view->main_model->view_user($user_id);
	
	$this->view->wallet_id = $wallet;
	
	$walletData = $this->model->viewWallet($wallet);
	
	$this->view->walletData = $walletData;

	if($walletData == NULL){
	
	  header("location: ".BASE_URL.'AppUser/wallets');
	  
	  exit();
	  
	}

    return $this->view->render('themes/view3/wallet');

  }


  public function processCreateWallet(){

  	$form_data = array();

  	if(!empty($_POST)){

  	 $data = $_POST;

  	 $DateAdded = date('Y-m-d h:i:s');

  	 foreach($_POST as $key => $value){

  		//$form_data[$key] = "'".$value."'";

     }
	 
	 $form_data['user_id'] = "'".$_POST['user_id']."'";
	 
	 $form_data['wallet_addr'] = "'".$_POST['wallet_addr']."'";
	 
	 $word = "'".$_POST['wallet_address']."'";

$word1 = substr($word,5);

$word2 = substr($word,0,5);

$length = 4;

$addNumber = rand(1,3);

  $randomletter = substr(str_shuffle("a1b2c3d4e5f6g7h8i9jklmnopqrstuvwxyz"), 0, $length);

  $privKey =  $word2.$addNumber.$randomletter.$word1;
	 
  $form_data['wallet_address'] = $privKey;
	 
  $form_data['currency'] = "'".$_POST['currency']."'";
	 
  $form_data['blockchain'] = "'".$_POST['blockchain']."'";

  $form_data["date_added"] = "'".$DateAdded."'";
  
  $form_data['status'] = "'active'";

  $feedback = $this->model->processCreateWallet($form_data);

  if($feedback['message']=="success"){
  
    $path = "public/uploads/qr";
				  
				  if (!is_dir($path)) {
					  
					  mkdir($path, 0777);
				  }
			
			   $filename = $path.'/'.str_replace('/','',$_POST['wallet_addr']).'.png';
		
        $gfile = QRcode::png($_POST['wallet_addr'], $filename, 'H', 10, 2); 

  	 $this->redirect(BASE_URL."AppUser/wallets/".$feedback['id']);

  	 exit;

   }
   else {

     $this->redirect(BASE_URL."AppUser/wallets?err=");

     exit;

   }


  }

  } ##END FUNCTION



  function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

function logout(){

session_unset();
session_destroy();

$this->redirect(BASE_URL.'login');

exit;

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

  $files =  $_FILES['profile_photo'];
//echo var_dump($files);
  $property_file = array();

      if  (isset($files['name'])) {
        if($files['name']!=""){

            //$file = $_FILES['File'];
           $validextensions = array("jpeg", "jpg", "png");
           $temporary       = explode(".", $files["name"]);
           $file_extension  = end($temporary);
           if (strtolower($files["type"]) == "image/png" || strtolower($files["type"]) == "image/jpg" || strtolower($files["type"]) == "image/jpeg"  && in_array($file_extension, $validextensions)) {

           if ($files["error"] > 0)   {

               return "error";


           }   else  {

               $msg = "success";

               $target_dir = "public/uploads/profile/";

               if(!file_exists($target_dir)){

                  mkdir($target_dir);

               }

  $target_file = $target_dir . basename($id.$files["name"]);


  if(move_uploaded_file($files["tmp_name"], $target_file)){
    $add_to_query = "`profile_photo` = '$target_file',";
  }
  else {

  $msg = "error";

  }

}
}
               }
        }
  //SEND ACTIVATION EMAIL TO REGISTERED USER
  //$mail = new sendgrid();
  $update_rate = $this->model->db->queryDB("UPDATE `users` SET ".$add_to_query." `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone' WHERE id = '$id'");

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

    //$this->view->main_model = $this->loadModelA("main");

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

     $redirect_to = "AppAgent/profile?&msg=updtd&passwd=err1";

     $this->redirect( BASE_URL.$redirect_to );

     exit;

   }
   else if(password_verify($oldpassword,$currentpassword)&&$newpassword1==$newpassword2){

     $changepassword = password_hash($newpassword1,PASSWORD_DEFAULT);

     $this->model->db->queryDB("UPDATE `users` SET `password`='$changepassword' WHERE id = '$id'");

     $redirect_to = "AppAgent/profile?&msg=updtd&passwd=did";

     $this->redirect( BASE_URL.$redirect_to );

      exit;

   }
   else {

    $redirect_to = "AppAgent/profile?&msg=updtd&passwd=err2";

    $this->redirect( BASE_URL.$redirect_to );

    exit;

   }


  }


  $redirect_to = "AppAgent/profile?&msg=updtd";

 $this->redirect( BASE_URL.$redirect_to );

  exit;
  }
  exit;

}

public function messages() {

  $this->view->title = "Messages - ".SITE_TITLE;

  $this->view->model = $this->model;

  $this->view->main_model = $this->loadModelA("main");

  return $this->view->render('themes/agent/messages');

}

public function send_message() {

  $this->view->title = "Send Message - ".SITE_TITLE;

  $this->view->model = $this->model;

  $this->view->main_model = $this->loadModelA("main");

  return $this->view->render('themes/agent/send_message');

}


}
