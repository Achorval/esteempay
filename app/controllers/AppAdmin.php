<?php
class AppAdmin extends BaseController {

       public function __construct(){

                    parent::__construct();

                    Session::init();

                    if (Session::get('IsLoggedIn') != "true") {

                        $this->redirect(BASE_URL);

                        exit();

                    }

                    if (Session::get('UserType') != "Admin") {

                        $this->redirect(BASE_URL);

                        exit();

                    }

                }

  public function index() {

		$this->view->title = SITE_TITLE;

		return $this->view->render('themes/admin/index');

	}

  public function post_property() {

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;

    return $this->view->render('themes/admin/post_property');

  }

  public function add_room($property_id) {

    $this->view->title = SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->property_id = $property_id;

    $this->view->pid = $property_id;

    $this->view->AppAgent_Model = $this->loadModelA("AppAgent");

    return $this->view->render('themes/admin/add_room');

  }

  public function manage_properties() {

    $this->view->title = "Manage Properties - ".SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA("main");

    return $this->view->render('themes/admin/manage_properties');

  }

  public function manage_hotels() {

    $this->view->title = "Manage Hotels - ".SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA("main");

    return $this->view->render('themes/admin/manage_hotels');

  }
  
    public function manage_users() {

    $this->view->title = "Manage Users - ".SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA("main");

    return $this->view->render('themes/admin/manage_users');

  }
  
      public function add_user() {

    $this->view->title = "Add User - ".SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA("main");

    return $this->view->render('themes/admin/add_user');

  }

  public function view_property($property_id) {

    $this->view->title = "Manage Properties - ".SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->pid = $property_id;

    $this->view->AppAgent_Model = $this->loadModelA("AppAgent");

    $this->view->main_model = $this->loadModelA("main");

    return $this->view->render('themes/admin/view_property');

  }
  
    public function edit_user($user_id) {

    $this->view->title = "Edit User - ".SITE_TITLE;

    $this->view->model = $this->model;

    $this->view->uid = $user_id;

    //$this->view->AppAgent_Model = $this->loadModelA("AppAdmin");

    $this->view->main_model = $this->loadModelA("main");
	
	$this->view->user = $this->model->view_user($user_id);

    return $this->view->render('themes/admin/edit_user');

  }
  
    public function process_add_user(){

  	$form_data = array();

  	if(!empty($_POST)){

  	 $data = $_POST;

  	 $DateAdded = date('Y-m-d h:i:s');

  	 foreach($_POST as $key => $value){

  		//IF DATA EXISTS>REDIRECT BACK TO FORM
  		if(isset($_SESSION)){

  		 //$_SESSION[$key] = $value;

  		}

  		$form_data[$key] = "'".$value."'";

  }


  $form_data["date_added"] = "'".$DateAdded."'";

  $feedback = $this->model->process_add_user($form_data);
  
  $url_add =  http_build_query($feedback['data']);
  
  //var_dump($feedback['data']);
  
  //exit();

  if($feedback['message']=="Success"){

  	 $this->redirect(BASE_URL."AppAdmin/manage_users/?msg=added");

  	 exit;

   }
   else {

     $this->redirect(BASE_URL."AppAdmin/add_user?err=".$feedback['message']."&".$url_add);

     exit;

   }
  }

  } 
  
    public function process_edit_user(){

  	$form_data = array();

  	if(!empty($_POST)){

  	 $data = $_POST;

  	 $DateAdded = date('Y-m-d h:i:s');

  	 foreach($_POST as $key => $value){

  		//IF DATA EXISTS>REDIRECT BACK TO FORM
  		if(isset($_SESSION)){

  		 //$_SESSION[$key] = $value;

  		}

  		$form_data[$key] = "'".$value."'";

  }


  $form_data["date_added"] = "'".$DateAdded."'";

  $feedback = $this->model->process_edit_user($form_data);
  
  $url_add =  http_build_query($feedback['data']);
  
  //var_dump($feedback['data']);
  
  //exit();

  if($feedback['message']=="Success"){

  	 $this->redirect(BASE_URL."AppAdmin/manage_users/?msg=updated");

  	 exit;

   }
   else {
   
   echo BASE_URL."AppAdmin/edit_user/".$_POST['user_id']."?err=".$feedback['message']."&".$url_add;

     //$this->redirect(BASE_URL."AppAdmin/edit_user/".$_POST['user_id']."?err=".$feedback['message']."&".$url_add);

     exit;

   }
  }

  } 

  public function process_post_property(){

  	$form_data = array();

  	if(!empty($_POST)){

  	 $data = $_POST;

  	 $DateAdded = date('Y-m-d h:i:s');

  	 foreach($_POST as $key => $value){

  		//IF DATA EXISTS>REDIRECT BACK TO FORM
  		if(isset($_SESSION)){

  		 //$_SESSION[$key] = $value;

  		}

  		$form_data[$key] = "'".$value."'";

  }


  $form_data["date_added"] = "'".$DateAdded."'";

  $feedback = $this->model->process_add_property($form_data);

  if($feedback['message']=="success"){

  	 $this->redirect(BASE_URL."AppAdmin/update_property/".$feedback['id']);

  	 exit;

   }
   else {

     $this->redirect(BASE_URL."AppAdmin/post_property?err=");

     exit;

   }


  }

  } ##END FUNCTION

  public function process_add_room(){

  	$form_data = array();

  	if(!empty($_POST)){

  	 $data = $_POST;

  	 $DateAdded = date('Y-m-d h:i:s');

  	 foreach($_POST as $key => $value){

  		//IF DATA EXISTS>REDIRECT BACK TO FORM
  		if(isset($_SESSION)){

  		 //$_SESSION[$key] = $value;

  		}

      if($key=="property_id"){

        $property_id = $value;

      }

  		$form_data[$key] = "'".$value."'";

  }


  $form_data["date_added"] = "'".$DateAdded."'";

  $feedback = $this->model->process_add_room($form_data);

  if($feedback['message']=="success"){
//echo BASE_URL."AppAdmin/update_room/".$feedback['id']."?property_id=".$property_id;
  	 $this->redirect(BASE_URL."AppAdmin/update_room/".$feedback['id']."?property_id=".$property_id);

  	 exit;

   }
   else {

     $this->redirect(BASE_URL."AppAdmin/add_room/$property_id?err=");

     exit;

   }

  }

  } ##END FUNCTION

  public function update_room($rid="") {

    if(!isset($rid)){

      $this->redirect(BASE_URL."AppAdmin/manage_hotels");

      exit;

    }

    $this->view->title = "UPDATE ROOM ".SITE_TITLE;

    $this->view->rid = $rid;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA('main');

    return $this->view->render('themes/admin/update_room');

  }

  public function room_photos($rid="") {

    if(!isset($rid)){

      $this->redirect(BASE_URL."AppAdmin/manage_hotels");

      exit;

    }

    $this->view->title = "UPDATE ROOM ".SITE_TITLE;

    $this->view->rid = $rid;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA('main');

    return $this->view->render('themes/admin/room_photos');

  }

  public function update_property($pid="") {

    if(!isset($pid)){

      $this->redirect(BASE_URL."AppAdmin/post_property");

      exit;

    }

    $this->view->title = "UPDATE PROPERTY ".SITE_TITLE;

    $this->view->pid = $pid;

    $this->view->model = $this->model;

    $this->view->main_model = $this->loadModelA('main');

    return $this->view->render('themes/admin/update_property');

  }

  function process_update_property(){

    $form_data = array();

    if(!empty($_POST)){

     $data = $_POST;

     $DateModified = date('Y-m-d h:i:s');

     foreach($_POST as $key => $value){

      //IF DATA EXISTS>REDIRECT BACK TO FORM
      if(isset($_SESSION)){

       //$_SESSION[$key] = $value;

      }

      if($key=="id"){

$id=$value;

      }

//exit;
if($key=="property_features"){

foreach($value as $value1){

 $property_features[] = $value1;

}

 $form_data['property_features'] = $property_features;
 continue;

}
      $form_data[$key] = "'".$value."'";

  }


  $form_data["date_modified"] = "'".$DateModified."'";

  $feedback = $this->model->process_update_property($form_data);

//echo $feedback;
//exit;
  if($feedback=="Success"){

     $this->redirect(BASE_URL."AppAdmin/update_property/".$id."?msg=updated");

     exit;

   }
   else {

     $this->redirect(BASE_URL."AppAdmin/update_property/".$id."?err=");

     exit;

   }


  }

  }

  function process_upload_property_photos(){
$msg = '';

  $pid  = $_POST['property_id'];
    //echo var_dump($_FILES['File']).'<br />';
$file_ary = $this->reArrayFiles($_FILES['File']);

   foreach($file_ary as $key => $value){
$property_file = array();
//echo var_dump($value).'<br/>';

$files = $value;

    if  (isset($files['name'])) {
      if($files['name']=="")
      continue;
          //$file = $_FILES['File'];
         $validextensions = array("jpeg", "jpg", "png");
         $temporary       = explode(".", $files["name"]);
         $file_extension  = end($temporary);
         if (strtolower($files["type"]) == "image/png" || strtolower($files["type"]) == "image/jpg" || strtolower($files["type"]) == "image/jpeg"  && in_array($file_extension, $validextensions)) {

         if ($files["error"] > 0)   {

             return "error";


         }   else  {

             $msg = "success";

             //$data1 = file_get_contents($_FILES['File']['tmp_name']);
             //$data1 = $this->model->db->escapeString($data1);
             //$data1 = $_FILES['File']['name'];
             $target_dir = "public/uploads/".$pid."/";

             if(!file_exists($target_dir)){

                mkdir($target_dir);

             }

$target_file = $target_dir . basename($files["name"]);

if(move_uploaded_file($files["tmp_name"], $target_file)){

  $property_file['photo_url'] = "'".$target_file."'";

  $property_file['property_id'] = "'".$pid."'";

  $property_file['status'] = "'Active'";

  $check_exists = $this->model->db->queryDB("SELECT * FROM property_photos WHERE property_id = '$pid' AND photo_url = '$target_file'");

  if($check_exists->num_rows<1){

  $this->model->insert($property_file,"property_photos");

}

}
else {

$msg = "error";

}



             }
         }
      }

}

$this->redirect(BASE_URL."AppAdmin/update_property/".$pid."?msg=uploaded");

exit;

return $msg;


  }

  function process_delete_property_photo($photo_id){

    $property_id = $_GET['pid'];

    $property_photos = $this->model->view_property_photo($photo_id);

    foreach($property_photos as $key => $value){

     $photo_url = $value['photo_url'];

     //unlink($photo_url);

     $query = $this->model->db->queryDB("DELETE FROM property_photos WHERE id = '$photo_id'");

    }

    $this->redirect(BASE_URL."AppAdmin/update_property/".$property_id);

  }

  function process_default_property_photo($photo_id){

    $property_id = $_GET['pid'];

    $query = $this->model->db->queryDB("UPDATE property_photos SET is_default = 'no' WHERE property_id = '$property_id'");

    $query = $this->model->db->queryDB("UPDATE property_photos SET is_default = 'yes' WHERE id = '$photo_id'");

    $this->redirect(BASE_URL."AppAdmin/update_property/".$property_id);

  }




function change_status($property_id){

$status= $_GET['action'];

$main_photo = $this->model->db->queryDB("SELECT id FROM property_photos WHERE property_id ='$property_id' AND is_default ='yes'");

$property_photos = $this->model->view_property_photos($property_id);

if($property_photos->num_rows<1){

    $this->redirect(BASE_URL."AppAdmin/manage_properties/?msg=nophoto");

    exit;

}
else if($main_photo->num_rows<1){

$this->redirect(BASE_URL."AppAdmin/manage_properties/?msg=mainphoto");

exit;

}

if($status=="Publish"){


        $db = $this->model->db->queryDB("UPDATE properties SET status = 'Published' WHERE id = '$property_id'");

        #SEND MAIL AND NOTIFICATION TO ADMIN ABOUT PROPERTY SUBMISSION

$this->redirect(BASE_URL."AppAdmin/manage_properties/?msg=Published");


}
else if($status=="Reject"){

  $db = $this->model->db->queryDB("UPDATE properties SET status = 'Rejected' WHERE id = '$property_id'");

  #SEND MAIL AND NOTIFICATION TO USER ABOUT PROPERTY REJECTION

  $this->redirect(BASE_URL."AppAdmin/manage_properties/?msg=rejected");

}
else if($status=="Un-Publish"){

  $db = $this->model->db->queryDB("UPDATE properties SET status = 'Unpublished' WHERE id = '$property_id'");

  #SEND MAIL AND NOTIFICATION TO USER ABOUT PROPERTY REJECTION

  $this->redirect(BASE_URL."AppAdmin/manage_properties/?msg=unpublished");

}
else if($status=="Delete"){

  $db = $this->model->db->queryDB("UPDATE properties SET status = 'Deleted' WHERE id = '$property_id'");

  $this->redirect(BASE_URL."AppAdmin/manage_properties/?msg=deleted");

}

else if($status=="Featured"){

  $db = $this->model->db->queryDB("UPDATE properties SET is_featured = 'yes' WHERE id = '$property_id'");

  $this->redirect(BASE_URL."AppAdmin/manage_properties/?msg=featured");

}

else if($status=="Notfeatured"){

  $db = $this->model->db->queryDB("UPDATE properties SET is_featured = 'no' WHERE id = '$property_id'");

  $this->redirect(BASE_URL."AppAdmin/manage_properties/?msg=notfeatured");

}

}

function logout(){

//session_unset();
session_destroy();

$this->redirect(BASE_URL);

exit;

}

public function messages() {

  $this->view->title = "Messages - ".SITE_TITLE;

  $this->view->model = $this->model;

  $this->view->main_model = $this->loadModelA("main");

  return $this->view->render('themes/admin/messages');

}

public function send_message() {

  $this->view->title = "Send Message - ".SITE_TITLE;

  $this->view->model = $this->model;

  $this->view->main_model = $this->loadModelA("main");

  return $this->view->render('themes/admin/send_message');

}

public function process_update_room(){

  $form_data = array();

  if(!empty($_POST)){

   $data = $_POST;

   $DateModified = date('Y-m-d h:i:s');

   foreach($_POST as $key => $value){

    //IF DATA EXISTS>REDIRECT BACK TO FORM
    if(isset($_SESSION)){

     //$_SESSION[$key] = $value;

    }

    if($key=="id"){

     $rid=$value;

    }

    if($key=="property_id"){

     $property_id=$value;

    }

//exit;
if($key=="File"){

continue;

}
    $form_data[$key] = "'".$value."'";

}

}
else {

$this->redirect(BASE_URL."AppAdmin/manage_hotels");

exit;

}


if(isset($_FILES)){

  $file_ary = $this->reArrayFiles($_FILES['File']);

 foreach($file_ary as $key => $value){

  $property_file = array();
  //echo var_dump($value).'<br/>';
  $files = $value;

  if(isset($files['name'])) {
        if($files['name']=="")
        continue;
            //$file = $_FILES['File'];
           $validextensions = array("jpeg", "jpg", "png");
           $temporary       = explode(".", $files["name"]);
           $file_extension  = end($temporary);
           if (strtolower($files["type"]) == "image/png" || strtolower($files["type"]) == "image/jpg" || strtolower($files["type"]) == "image/jpeg"  && in_array($file_extension, $validextensions)) {

           if ($files["error"] > 0)   {

               return "error";


           }   else  {

               $msg = "success";

               //$data1 = file_get_contents($_FILES['File']['tmp_name']);
               //$data1 = $this->model->db->escapeString($data1);
               //$data1 = $_FILES['File']['name'];
               $target_dir = "public/uploads/rooms/".$rid."/";

               if(!file_exists($target_dir)){

                  mkdir($target_dir);

               }

  $target_file = $target_dir . basename($files["name"]);

  if(move_uploaded_file($files["tmp_name"], $target_file)){

    $property_file['photo_url'] = "'".$target_file."'";

    $property_file['room_id'] = "'".$rid."'";

    $property_file['status'] = "'Active'";

    $check_exists = $this->model->db->queryDB("SELECT * FROM room_photos WHERE room_id = '$rid' AND photo_url = '$target_file'");

    if($check_exists->num_rows<1){

    $this->model->insert($property_file,"room_photos");

  }

  }
  else {

  $msg = "error";

  }



               }
           }
        }

  }

}

$feedback = $this->model->process_update_room($form_data);

//echo $feedback;
//exit;

if($feedback=="Success"){

   $this->redirect(BASE_URL."AppAdmin/update_room/".$rid."?property_id=".$property_id."&msg=updated");

   exit;

 }
 else {

   $this->redirect(BASE_URL."AppAdmin/update_room/".$rid."?property_id=".$property_id."&err=");

   exit;

 }


}

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


function process_delete_room_photo($photo_id){

  $room_id = $_GET['rid'];

  $property_id = $_GET['property_id'];

  $room_photos = $this->model->view_room_photos($room_id);

  foreach($room_photos as $key => $value){

   $photo_url = $value['photo_url'];

   //unlink($photo_url);

   $query = $this->model->db->queryDB("DELETE FROM room_photos WHERE id = '$photo_id'");

  }

  $this->redirect(BASE_URL."AppAdmin/update_room/".$room_id.'?property_id='.$property_id);

}

function process_default_room_photo($photo_id){

  $room_id = $_GET['rid'];

  $property_id = $_GET['property_id'];

  $query = $this->model->db->queryDB("UPDATE room_photos SET is_default = 'no' WHERE room_id = '$room_id'");

  $query = $this->model->db->queryDB("UPDATE room_photos SET is_default = 'yes' WHERE id = '$photo_id'");

  $this->redirect(BASE_URL."AppAdmin/update_room/".$room_id.'?property_id='.$property_id);

}

public function delete_room($room_id){

  $property_id = $_GET['property_id'];

  $db = $this->model->db->queryDB("UPDATE rooms SET status = 'Deleted' WHERE id = '$room_id'");

  $this->redirect(BASE_URL."AppAdmin/update_property/".$property_id."?property_id=".$property_id."&msg=deleted");

}


}
