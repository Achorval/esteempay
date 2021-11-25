<?php

class Main_Model extends Model {


    	public function __construct() {

		parent::__construct();

	}



      public function ProcessRegistration($data){

          $fullname = $this->db->escapeString($data['fullname']);

          $gender = $this->db->escapeString($data['gender']);

          $resident_state = $this->db->escapeString($data['res_state']);

          $bank_name = $this->db->escapeString($data['bank_name']);

          $account_name = $this->db->escapeString($data['account_name']);

          $account_number = $this->db->escapeString($data['account_number']);

          $phone_number = $this->db->escapeString($data['phone_number']);

          $username = $this->db->escapeString($data['username']);

          $email = $this->db->escapeString($data['email']);

          $upline = '';

          $password = $this->db->escapeString($data['password1']);

          $password = password_hash($password,PASSWORD_DEFAULT);

          $DateAdded = date('Y-m-d h:i:s');

          $DateModified = date('Y-m-d h:i:s');

          $query  = $this->db->queryDB("SELECT * FROM mlm_users WHERE UserName = '$username'");

          $queryEmail  = $this->db->queryDB("SELECT * FROM mlm_users WHERE UserEmail = '$email'");


          //get referral id
  /*if(filter_var($referer,FILTER_VALIDATE_EMAIL)){
$upline = $user->getIdBy("UserEmail",$referer);
  }else{
$upline = $user->getIdBy("UserName",$referer);
  }*/

          if(mysqli_num_rows($query)>0){

              return "usernameexists";

          }

          if(mysqli_num_rows($queryEmail)>0){

              return "emailexists";

          }


          if($data['password1']!=$data['password2']){

              return "Password2";

          }



          if(strlen($data['password1'])<6){

          return "Password1";

          }


			 $queryInsertUser = "INSERT INTO `mlm_users` SET `UserName` = '$username',`UserEmail` = '$email',`UserRegTime` = '".time()."', `UserPhone` = '$phone_number',`UserFullName` = '$fullname',`UserGender` = '$gender',`UserResState` = '$resident_state',`UserPassword` = '$password',`UserUplinerId` = '$upline',`UserCurrentLevel` = '0',`UserBlocked` = '0',`UserPaid` = '0'";

           $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


	   if(!$this->db->queryDB($queryInsertUser)){

		return "Error";

	   }
	   else {

$code = "123456";
		 $message = $this->getOption("welcome_message");

          $site_title = $this->getOption("site_name");

          $sender_email = $this->getOption("site_email");

         $subject = 'Welcome to'.' '.$site_title;
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: '.$site_title.'<'.$sender_email.'>' . "\r\n";
	  //mail("$Email","$subject","$message",$headers);
		   return "Success";

	   }



  }



     public function process_user_login() {

		if ($_REQUEST['username'] != '' && $_REQUEST['password'] != '') {

			$username = $this->db->escapeString($_REQUEST['username']);

			$password = $this->db->escapeString($_REQUEST['password']);

			//$password = password_verify($password,PASSWORD_DEFAULT);

			//return password_hash($password,PASSWORD_DEFAULT);

			$query  = $this->db->queryDB("SELECT * FROM user WHERE username = '".$username."'");

            if (mysqli_num_rows($query) > 0)  {

				while($row = mysqli_fetch_array($query)) {

				    $user_type = $row['user_type'];
					$user_id = $row['UserID'];
				    $username  = $row['username'];
					$hashedPassword  = $row['password'];


			    }

				if (password_verify($password, $hashedPassword)) {

                Session::init();

				Session::set('IsLoggedIn', "true");

				Session::set('UserType', $user_type);

				Session::set('Username', $username);

				Session::set('UserID', $user_id);

				//Session::set('school_id',$school_id);

				$feedback = array(0=>"true",1=>"loggin successful",2=>$user_type);

				return $feedback;


				}

				else {


				 $feedback = array(0=>"false",1=>"Invalid password",3=>"msg=error1");

				return $feedback;


				 }

				  }
				  else {

				    $feedback = array(0=>"false",1=>"Invalid password",3=>"msg=error2");

				return $feedback;

				    }

					}

		}

   function process_registration($data){
	 
	 $password = $data['password'];

     $email = $data['email'];
	 
	 $date_added = date("Y-m-d H:s");

     $date_modified = date("0000-01-01");

     $added_by = '';

    $user = $this->db->queryDB("SELECT * FROM users WHERE email = $email");

    if($user->num_rows>0){

     return "exists";
     exit;

    }

    foreach($user as $key => $value){

         $user_id = $value['id'];

    }

    //INSERT DATA INTO DB
   // $query = $this->insert($data,"users");
   
   $password = password_hash($password,PASSWORD_DEFAULT);

$query = $this->db->queryDB("INSERT INTO `users`(`firstname`, `middlename`, `lastname`, `email`, `phonenumber`, `dob`, `gender`, `address`, `city`, `state`, `country`, `username`, `password`, `date_registered`, `status`, `type`, `verification_code`, `verified`, `payment_method`, `paypal_email`, `email_notifications`, `sms_notifications`, `referrer`, `referrer_paid`, `membership_type`, `access`, `phone_verification_code`, `phone_verified`, `code`, `max_balance`, `daily_transaction_limit`, `kyc`) VALUES ('','','',$email,'','','','','','','','','$password','$date_added','active','public','','pending','','','','','','','','','','','','1000','1000','')");

$code = rand(100,1000).rand(100,1000).rand(100,1000).rand(100,1000);

$accountNumber = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

    if($query){
	
	     $checkUser= $this->db->queryDB("SELECT id FROM users WHERE email =$email");

     if($checkUser->num_rows>0){
	 
	 foreach($checkUser as $keyC => $valueC){
	 
	  $userID = $valueC['id'];
	 
	 }
	
	$queryAB = $this->db->queryDB("INSERT INTO `wallets`(`user_id`, `wallet_addr`, `wallet_address`, `blockchain`, `currency`, `date_added`, `status`) VALUES ('$userID','$accountNumber','$accountNumber','USD','USD','$date_added','active')");
	
	    $checkWallet= $this->db->queryDB("SELECT id FROM wallets WHERE wallet_addr ='$accountNumber'");

     if($checkWallet->num_rows>0){
	 
	 foreach($checkWallet as $keyW => $valueW){
	 
	  $walletID = $valueW['id'];
	 
	 }
	
	$queryAC = $this->db->queryDB("INSERT INTO `tokens`( `wallet_id`, `token_symbol`, `token_name`, `token_decimal`, `balance`, `contract_address`, `abi_array`, `date_added`, `status`) VALUES ('$walletID','USD','USD','0','0','','','$date_added','active')");
	
	}
	
	}
	 $to = $email;

  $email_type = "registration_email";

  $query = $this->db->queryDB('INSERT INTO `email_verification`(`email`, `code`, `date_added`, `status`) VALUES (?,?,?,?)',$email,$code,$date_added,"pending");

  include("email_sender.php");

  //return array("message"=>"success","reason"=>"success!");

      session_unset();
	  
      session_destroy();

      return "success";

    }


   }

   function process_login(){

     if(!empty($_POST)){

        $data = $_POST;
		
		foreach($data as $value){

        $username = $this->db->escapeString($_POST['username']);

        $formpassword = trim($_POST['password']);

     }

     $checkuser = $this->db->queryDB("SELECT * FROM users WHERE email = '$username'");
	 
     if($checkuser->num_rows==0){

       return "notfound";

     }
     else {

       $user = $this->db->queryDB("SELECT * FROM users WHERE email = '$username'");
	   
       foreach($user as $key => $value){

           $password = $value['password'];

           $user_type = $value['type'];
            //$verified = $value['verified'];
           $status = $value['status'];

       }
	   
       /*if($verified==""||$verified=="no"){

         header("location: login.php?err=v");
         exit;

       }

       if($status=="pending"){

         header("location: login.php?err=a");
         exit;

       }*/
	
       if(password_verify($formpassword,$password)){

          $_SESSION['userid'] = $value['id'];

          $_SESSION['userdata'] = $value;

          //SEND ACTIVATION EMAIL TO REGISTERED USER
          //$mail = new sendgrid();

          //$mail->sendmail($email,"Zutaboss: Login Alert",$html);

          //SEND REGISTRATION NOTIFICATION EMAIL TO ADMINISTRATOR
           // $mail->sendmail("info@zuta.ng","Zutaboss Registration",$html1);
                Session::init();

				Session::set('IsLoggedIn', "true");

				Session::set('UserType', $value['type']);

				Session::set('UserID', $value['id']);
				
          if($user_type=="public"){
            header("Location: ".BASE_URL."AppUser");
            exit;
          }

       }
       else {

           return "invaliddetails";

       }
	   
     }

     }


   }

   function get_time_ago( $time )
   {
       $time_difference = time() - $time;

       if( $time_difference < 1 ) { return 'less than 1 second ago'; }
       $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                   30 * 24 * 60 * 60       =>  'month',
                   24 * 60 * 60            =>  'day',
                   60 * 60                 =>  'hour',
                   60                      =>  'minute',
                   1                       =>  'second'
       );

       foreach( $condition as $secs => $str )
       {
           $d = $time_difference / $secs;

           if( $d >= 1 )
           {
               $t = round( $d );
               return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
           }
       }
   }

   function  add_update_meta($user_id,$meta_key,$meta_value){

     $check_meta = $this->db->queryDB("SELECT id FROM usermeta WHERE meta_key = $meta_key AND  user_id = '$user_id'");

     if($check_meta->num_rows<1){

        $query = $this->db->queryDB("INSERT into usermeta(`user_id`,`meta_key`,`meta_value`) VALUES('$user_id',$meta_key,$meta_value)");

     }else {

   $query = $this->db->queryDB("UPDATE wa_agentmeta SET meta_value = '$meta_value' WHERE meta_key = '$meta_key' AND user_id = '$user_id'");

     }

     return $query;

   }

  function get_user_meta($user_id,$meta_key){

     $get_meta = $this->db->queryDB("SELECT * FROM usermeta WHERE meta_key = '$meta_key' AND  user_id = '$user_id'");
//echo $get_meta->num_rows;
     if($get_meta->num_rows>1){

         return $get_meta;

       }
       else if($get_meta->num_rows>0){

       foreach($get_meta as $key=>$value){

         $meta = $value['meta_value'];

       }

        return $meta;

     }

     return "";

  }

  function getUserMessages($username, $user_type){

    global $wpdb;

    $query = $this->db->queryDB("SELECT * FROM messages WHERE from_username = '$username' OR to_username = '$username'");

    return $query;

  }

  function getThread($message_id){

    global $wpdb;

    $query = $query = $this->db->queryDB("SELECT * FROM messaging WHERE thread_id = '$message_id' ORDER BY id DESC ");

    return $query;

  }

  function getLastThread($message_id){

    global $wpdb;

    $query =$query = $this->db->queryDB("SELECT * FROM messaging WHERE thread_id = '$message_id' ORDER BY id DESC LIMIT 1");

    return $query;

  }

  function getSuperAdmin(){

    global $wpdb;

    $query = $query = $this->db->queryDB("SELECT * FROM users as a INNER JOIN super_admin as b ON a.username = b.username");

    return $query;

  }



 public function show_user($user_id){

 	$user = $this->view_user($user_id);

 	if($this->get_user_meta($user_id,"is_registered_business")=="yes") {

 	 echo $this->get_user_meta($user_id,"business_name");

 	}
 	else {

 	echo $user['firstname'].' '.$user['lastname'];

 	}

 }
 
 
  public function sendPasswordResetCode($email){

  $checkEmail = $this->db->queryDB('SELECT * FROM users WHERE email = "'.$email.'"');
  
  if($checkEmail->num_rows<1){

  return array("response"=>"invalid_email","reason"=>"No record found for this email","data"=>"");

  exit();

}

  $date_added = date("Y-m-d H:s");

  $to = $email;

  $email_type = "password_reset_code";

  $code = rand(1,9).rand(1,9).rand(1,9).rand(1,9);

  $ip = $this->getIPAddress();

  $useragent=$_SERVER['HTTP_USER_AGENT'];
  
  $query = $this->db->queryDB('DELETE FROM password_reset_request WHERE email = "'.$email.'" AND status = "pending_use"');

  $query = $this->db->queryDB('INSERT INTO `password_reset_request`(`email`, `code`,`ip`,`device`,`date_added`, `status`) VALUES ("'.$email.'","'.$code.'","'.$ip.'","'.$useragent.'","'.$date_added.'","pending_use")');
 
  include("email_sender.php");

  return array("response"=>"success","reason"=>"success!","data"=>"code=".$code);

  exit();

}

  public function processResetPassword($password,$reset_code){

  $checkCode = $this->db->queryDB('SELECT * FROM password_reset_request WHERE code = "'.$reset_code.'" AND status = "pending_use"');
  
  if($checkCode->num_rows<1){

  return array("response"=>"invalid_code","reason"=>"Invalid password reset code","data"=>"");

  exit();

}

foreach($checkCode as $keyC => $valueC){

$email = $valueC['email'];

}

    $password = $this->db->escapeString($password);

     $password = password_hash($password,PASSWORD_DEFAULT);

  $date_added = date("Y-m-d H:s");

  $to = $email;

  $email_type = "password_resetted";

  $ip = $this->getIPAddress();
  
   $query = $this->db->queryDB('UPDATE users SET password = "'.$password.'" WHERE email = "'.$email.'"');
  
  $query = $this->db->queryDB('UPDATE password_reset_request SET status = "used" WHERE code = "'.$reset_code.'"');
 
  include("email_sender.php");

  return array("response"=>"password_changed","reason"=>"success!");

  exit();

}


 public function getIPAddress() {
    //whether ip is from the share internet
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    //whether ip is from the proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
     }
//whether ip is from the remote address
    else{
             $ip = $_SERVER['REMOTE_ADDR'];
     }
     return $ip;
}


   function view_user($user_id){

     $query = $this->db->queryDB("SELECT * FROM users WHERE id = '$user_id'");

     if($query->num_rows>0){

       foreach($query as $key=>$value){

         return $value;

       }

    }

     return null;

   }


}
