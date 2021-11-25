<?php

class AppAdmin_Model extends Model {

    public function __construct() {

		parent::__construct();

	}

  public function getStates(){

     $query = $this->db->queryDB("SELECT * FROM states");

     if($query->num_rows>0){

      return $query;

     }

     return null;

  }
  
  function process_add_user($data){

          $firstname = $this->db->escapeString(trim($data['firstname'],"'"));
		  
		   $lastname = $this->db->escapeString(trim($data['lastname'],"'"));

          $phone= $this->db->escapeString(trim($data['phone'],"'"));

          $username = $this->db->escapeString(trim($data['username'],"'"));

          $email = $this->db->escapeString(trim($data['email'],"'"));

          $password = $this->db->escapeString(trim($data['password'],"'"));
		  
		   $confirm_password = $this->db->escapeString(trim($data['password'],"'"));

          $password = password_hash($password,PASSWORD_DEFAULT);
		  
		  $user_type = $this->db->escapeString(trim($data['user_type'],"'"));

          $DateAdded = date('Y-m-d h:i:s');

          $DateModified = date('Y-m-d h:i:s');

          $queryusername  = $this->db->queryDB("SELECT * FROM users WHERE username = ".$data['username']);

          $queryemail  = $this->db->queryDB("SELECT * FROM users WHERE email = ".$data['email']);
		  
		  $feedback = array();

          if(mysqli_num_rows($queryusername)>0){
		  
		      $feedback['message'] = "usernameexists";
			  
			  $feedback['data'] = $data;

              return $feedback;
			  
          }

          if(mysqli_num_rows($queryemail)>0){

			   $feedback['message'] = "emailexists";
			  
			  $feedback['data'] = $data;

              return $feedback;

          }
		  
          if($data['password']!=$data['confirm_password']){

			   $feedback['message'] = "password_not_match";
			  
			  $feedback['data'] = $data;

              return $feedback;

          }

$queryInsertUser = "INSERT INTO `users`( `profile_photo`, `firstname`, `lastname`, `username`, `password`, `user_nicename`, `email`, `phone`, `user_registered`, `user_activation_key`, `user_type`, `status`, `user_status`) VALUES ('','$firstname','$lastname','$username','$password','','$email','$phone','$DateAdded','','$user_type','active','0')";

           $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		  
	   if(!$this->db->queryDB($queryInsertUser)){

		 $feedback['message'] = "db_error";
			  
			  $feedback['data'] = $data;

              return $feedback;

	   }
	   else {
/*
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
	  //mail("$Email","$subject","$message",$headers);*/
	  
		 $feedback['message'] = "Success";
			  
			  $feedback['data'] = "";

              return $feedback;

	   }


 }
 
   function process_edit_user($data){
   
    $firstname= $this->db->escapeString(trim($data['firstname'],"'"));
	
	 $lastname= $this->db->escapeString(trim($data['lastname'],"'"));

          $phone= $this->db->escapeString(trim($data['phone'],"'"));

          $password = $this->db->escapeString(trim($data['password'],"'"));
		  
		  $add_query = '';
		  
		  if($password!=""){

          $password = password_hash($password,PASSWORD_DEFAULT);
		  
		  $add_query = ",password = '$password'";
		  
		  }
		  
		  $user_type = $this->db->escapeString(trim($data['user_type'],"'"));
		  
		  $status = $this->db->escapeString(trim($data['status'],"'"));

          $DateAdded = date('Y-m-d h:i:s');

          $DateModified = date('Y-m-d h:i:s');
		  
		  $feedback = array();

$queryUpdateUser = "UPDATE `users` SET firstname = '$firstname', lastname = '$lastname', phone = '$phone', user_type = '$user_type', status = '$status'".$add_query;

           $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		  
	   if(!$this->db->queryDB($queryUpdateUser)){

		 $feedback['message'] = "db_error";
			  
			  $feedback['data'] = $data;

              return $feedback;

	   }
	   else {
/*
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
	  //mail("$Email","$subject","$message",$headers);*/
	  
		 $feedback['message'] = "Success";
			  
			  $feedback['data'] = "";

              return $feedback;

	   }


 }

  function process_add_property($data){

   //INSERT DATA INTO DB
   $query = $this->insert($data,"properties");
  if(isset($query['message'])){
   if($query['message']=="success"){

     return $query;

     exit;

   }
   else {

     return "error";

   }
 }
 else {

 return "error";

 }

 }

 function process_add_room($data){

  //INSERT DATA INTO DB
  $query = $this->insert($data,"rooms");

 if(isset($query['message'])){

  if($query['message']=="success"){

    return $query;

    exit;

  }
  else {

    return "error";

  }

}
else {

return "error";

}

}

function view_rooms($pid){

  $query = $this->db->queryDB("SELECT * FROM rooms WHERE property_id = '$pid' AND Status != 'Deleted'");

  if($query->num_rows>0){

   return $query;

  }

  return null;

}

 function process_update_property($data){

   $id = $data['id'];

   $form_data = array();
//echo var_dump($data);
   foreach($data as $key => $value){

     if($key=="id"){

      $id = $value;

     }

     if($key=="property_features"){

      $property_features = $value;
     continue;

     }
$form_data[$key] = $value;

   }

  //INSERT DATA INTO DB
  $query = $this->update($form_data,"properties","id",$id);

  if($query=="Success"){
if(isset($property_features)){
    $features = $this->view_features();

    foreach($features as $keyF => $valueF){

      $allV[] = $valueF['id'];

      for($i=0; $i<count($property_features); $i++){

if($property_features[$i]==$valueF['id']){

$allA[] = $property_features[$i];

$features_data['property_id'] = $id;

$features_data['feature_id'] = "'".$property_features[$i]."'";

$features_data['status']  = "'Active'";

$query1 =  $this->db->queryDB("SELECT id FROM property_features WHERE property_id = $id AND feature_id = '$property_features[$i]'");

if($query1->num_rows<1){

   $q_insert = $this->insert($features_data,'property_features');

}

}

      }

    }

    foreach($allV as $keyAllV => $valueAllV){

        if(!in_array($valueAllV,$allA)){

          //echo $valueAllV;

          $this->db->queryDB("DELETE FROM property_features WHERE property_id = $id AND feature_id = '$valueAllV'");

        }

    }
  }

    return $query;

    exit;

  }
  else {

    return "error";

  }


}


 function process_update_room($data){

   $id = $data['id'];

   $form_data = array();
//echo var_dump($data);
   foreach($data as $key => $value){

     if($key=="id"){

      $id = $value;

     }

     if($key=="File"){

     continue;

     }

  $form_data[$key] = $value;

   }

  //INSERT DATA INTO DB
  $query = $this->update($form_data,"rooms","id",$id);

if($query){

return "Success";

}
else {

return "Error";

}


}

function view_room($rid){

  $query = $this->db->queryDB("SELECT * FROM rooms WHERE id = '$rid'");

  if($query->num_rows>0){

   return $query;

  }

  return null;

}

function view_room_photos($room_id){

  $query = $this->db->queryDB("SELECT * FROM room_photos WHERE room_id = '$room_id' AND status != 'Deleted'");

  if($query->num_rows>0){

   return $query;

  }

  return null;

}


 function view_property($pid){

   $query = $this->db->queryDB("SELECT * FROM properties WHERE id = '$pid'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }

 function view_hotels(){

   $query = $this->db->queryDB("SELECT * FROM properties WHERE is_hotel = 'yes'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }
 
  function view_users(){

   $query = $this->db->queryDB("SELECT * FROM users");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }


  function view_user($id){

   $query = $this->db->queryDB("SELECT * FROM users WHERE id= '$id'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }


 function view_properties(){

   $query = $this->db->queryDB("SELECT * FROM properties WHERE status != 'PendingSubmission' AND is_hotel = 'no' ORDER BY id DESC");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }

 function view_property_photos($property_id){

   $query = $this->db->queryDB("SELECT * FROM property_photos WHERE property_id = '$property_id' AND status != 'Deleted'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }

 function view_property_photo($photo_id){

   $query = $this->db->queryDB("SELECT * FROM property_photos WHERE id = '$photo_id' AND status != 'Deleted'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }

 function view_categories(){

   $query = $this->db->queryDB("SELECT * FROM categories WHERE status != 'Deleted'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }

 function view_features(){

   $query = $this->db->queryDB("SELECT * FROM features WHERE status != 'Deleted'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }

 function view_sub_category($category_id){

   $query = $this->db->queryDB("SELECT * FROM sub_category WHERE category_id = '$category_id' AND status != 'Deleted'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }

 function getSubCatName($id){

   $name = '';

   $query = $this->db->queryDB("SELECT * FROM sub_category WHERE id = '$id'");

   if($query->num_rows>0){

     foreach($query as $key => $value){

       $name = $value['name'];

     }

   }
     return $name;

 }

 function getPropertyFeature($pid,$fid){

   $name = '';

   $query = $this->db->queryDB("SELECT * FROM property_features WHERE property_id = '$pid' AND feature_id = '$fid'");

   if($query->num_rows>0){

     foreach($query as $key => $value){

       $name = $value['feature_id'];

     }

   }
     return $name;

 }

 function getLocalAreaName($id){

   $name = '';

   $query = $this->db->queryDB("SELECT * FROM localities WHERE id = '$id'");

   if($query->num_rows>0){

     foreach($query as $key => $value){

       $name = $value['name'];

     }

   }
     return $name;

 }

 function getAreaName($id){

   $name = '';

   $query = $this->db->queryDB("SELECT * FROM area WHERE id = '$id'");

   if($query->num_rows>0){

     foreach($query as $key => $value){

       $name = $value['name'];

     }

   }
     return $name;

 }



}
