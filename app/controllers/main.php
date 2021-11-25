<?php
class main extends BaseController {

	public function index() {

		$this->view->title = "Esteem Finance - Cash and Crypto Network";

		$this->view->model = $this->loadModelA("main");

		return $this->view->render('themes/site/index');

	}

	public function register() {

		$this->view->title = "Register - Esteem Finance";

         return $this->view->render('themes/view3/register');

		exit;

	}

	public function login() {

		$this->view->title = SITE_TITLE;

		return $this->view->render('themes/view3/login');

	}
	
		public function reset_password() {

		$this->view->title = SITE_TITLE;

		return $this->view->render('themes/view3/reset_password');

	}
	
		public function send_reset_code() {

		$this->view->title = SITE_TITLE;

		return $this->view->render('themes/view3/send_reset_code');

	}

	public function view_item($property_id) {

		$this->view->property = $this->model->view_property($property_id);

		$this->view->model = $this->model;

		$this->view->property_id = $property_id;

		$this->view->AppAgent_model = $this->loadModelA("AppAgent");
		
		$property = $this->model->view_property($property_id);
		
		$this->view->title = $property['title'].' - Pogastay.com';

		return $this->view->render('themes/site/view_item');

	}

	


	public function load_local_area() {

	  if(isset($_GET['state_id'])){

      return $this->model->loadLocalArea();

		}

		exit;

	}

	public function process_registration(){

		$form_data = array();

		$date_registered = date("Y-m-d h:i:s");

		if(!empty($_POST)){

		 $data = $_POST;

		 $DateAdded = date('Y-m-d h:i:s');

		$verification_code = rand(0,10).rand(0,10).rand(0,10).rand(0,10).rand(0,10).rand(0,10);

		foreach($_POST as $key => $value){

			//IF DATA EXISTS>REDIRECT BACK TO FORM
			if(isset($_SESSION)){

			 $_SESSION[$key] = $value;

		  }

			if($key=="password2"){

				 $rpassword = $value;

				 continue;

			 }
			 
			 if($key=="password2"){

			 $rpassword = $value;

				continue;

			}

			$form_data[$key] = "'".$value."'";

			if($key=="password1"){

			$form_data["password"] = $value;

		  $password = $value;

		}

	}


$form_data["user_registered"] = "'".$date_registered."'";

		if($rpassword!=$password){

		 header("Location: ".BASE_URL."register?err=p");

		 exit;

 }

 	 $feedback = $this->model->process_registration($form_data);

	 if($feedback=="exists"){

     $this->redirect(BASE_URL."register?err=e");

		 exit;

	 }
	 else if($feedback=="success"){

		 $this->redirect(BASE_URL."login?msg=s");

		 exit;

	 }


 }

 } ##END FUNCTION

 function loadLocalArea($state_id){

	  if($state_id!=""){

   $localities = $this->model->loadLocalArea($state_id);
//echo var_dump($localities);
if($localities==NULL){

echo "<option>No local area found</option>";
exit;

}
//echo count($localities);
$i=0;
echo "<option value=''>Select a local area</option>";
foreach($localities as $key => $value){
	$i++;
	$id = $value['id'];
	//echo var_dump($value);
	 echo "<option value='$id'>".$value['name']."</option>";

	}

 }

 }

 function loadArea($locality){

	 if($locality!=""){

	 $localities = $this->model->loadArea($locality);
//echo var_dump($localities);
if($localities==NULL){

echo "<option value=''>Select an option</option>";
exit;

}
//echo count($localities);
$i=0;
echo "<option value=''>Select a local area</option>";
foreach($localities as $key => $value){
 $i++;

 $id = $value['id'];
 //echo var_dump($value);
  echo "<option value='$id'>".$value['name']."</option>";

 }

 }

 }

function process_login(){

  $feedback = $this->model->process_login();

 if($feedback=="notfound"){
 
	header("Location: ".BASE_URL."login?err=d");

	exit;
}
else if($feedback=="invaliddetails"){

	header("Location: ".BASE_URL."login?err=p");
	exit;

}
else {

	header("Location: ".BASE_URL."login?err=p");
	exit;

}

}


 public function sendPasswordResetCode(){
 
  if(isset($_POST['email'])){
  
    $email = $_POST['email'];
  
  }else {
  
    header("Location: ".BASE_URL."send_reset_code");

	exit;
	
  }

  $feedback = $this->model->sendPasswordResetCode($email);

	header("Location: ".BASE_URL."reset_password?response=".$feedback['response'].'&reason='.$feedback['reason']);
	exit;


}

 public function processResetPassword(){
 
  if(isset($_POST['user_password'])){
  
    $password = $_POST['user_password'];
	
	$reset_code = $_POST['reset_code'];
  
  }else {
  
    header("Location: ".BASE_URL."send_reset_code");

	exit;
	
  }

  $feedback = $this->model->processResetPassword($password,$reset_code);

	header("Location: ".BASE_URL."login?msg=".$feedback['response']);
	exit;


}




}
