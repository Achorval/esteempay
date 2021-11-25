<?php

class Database	{

    // Class constructor override
    public function __construct() {
		
        $this->mysqli = @new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if ($this->mysqli->connect_errno) {
            echo "<h5>Notice: Database connection failed</h5>";
            //exit();
        } 
            // $this->mysqli->set_charset("utf8"); 
    }
	
	public function queryDB($sql) {
		return mysqli_query($this->mysqli, $sql); 
	}
    
    public function mysqli_object(){
        
        return $this->mysqli;
    }
	
	 public function insert_id(){
        
        return mysqli_insert_id($this->mysqli);
    }

    // select database to use
    public function selectDB($dbname) {
        $selectedDB = $this->mysqli->select_db($dbname);
		return $selectedDB;
    }
	
	public function setQuery($query) {
		//$this->Query = $query; 
		if($query) {
			$this->Query = mysqli_query($this->mysqli, $query);
			if($this->Query){
				//echo 'query good';
				return true;	
			}
			return false;
		}	
	}
	
	public function GetRow() {
		
		if($this->mysqli) {
			$this->Row = mysqli_fetch_object($this->mysqli);
			if(is_object($this->Row)) {
				return $this->Row;	
			}
			return false; 	
		}
	}
	
	public function NumRow() {
		if($this->mysqli) {
			return mysqli_num_rows($this->mysqli);	
		}
	}





	public function queryNow( $str , $assoc_type = 'assoc' ){
		//$this->connect();
		if( strpos(strtolower($str), 'select') === 0 ){
		
		$this->mysqli_result = mysqli_query( $this->mysqli, $str );
		
			if ( $this->mysqli_result && mysqli_connect_errno() == '' ){
					switch ( $assoc_type )
					{
						case 'assoc':
							while( $row = mysqli_fetch_assoc( $this->mysqli_result ) ) {
								$result[] =  $row;
							}
						break;
						
						case 'fetch_row':
							$result = mysqli_fetch_row( $this->mysqli_result );
						break;
					}
			}else{
				return mysqli_connect_errno();
			}
		}else{
			mysqli_query( $this->mysqli, $str );
		}
		if ( isset($result) ) return $result;
		
	}


	public function fetch_all_rows( $sql, $assoc_type = 'assoc' ){
		return $this->queryNow($sql, $assoc_type);
	}
    
    public function escapeString($value){
        
        return mysqli_real_escape_string($this->mysqli,$value);
        
    }


    
function validate_registration($action){
    
    $tools = new tools();
   
//get personal details
$full_name = $tools->cleanInput($_REQUEST['full_name']);
$gender = $tools->cleanInput($_REQUEST['gender']);
$res_state = $tools->cleanInput($_REQUEST['res_state']);
//get bank details
$bank_name = $tools->cleanInput($_REQUEST['bank_name']);
$account_number = $tools->cleanInput($_REQUEST['account_number']);
$account_name = $tools->cleanInput($_REQUEST['account_name']);
//get account details
$email = $tools->cleanInput($_REQUEST['email']);
$phone = $tools->cleanInput($_REQUEST['phone']);
$referer = $tools->cleanInput($_REQUEST['referer']);
$password = sha1(md5(md5($_REQUEST['password'])));
$username = $tools->cleanInput($_REQUEST['username']);

//start account details validation
if($action == "check_acc"){
$query1 = $con->query("SELECT * FROM `mlm_users` WHERE `UserName` = '$username'");
echo "{";
if($query1->num_rows > 0){
  echo '"userExists": true,';
}else{
  echo '"userExists": false,';
}
$query2 = $con->query("SELECT * FROM `mlm_users` WHERE `UserEmail` = '$email'");
if($query2->num_rows > 0){
  echo '"emailExists": true,';
}else{
  echo '"emailExists": false,';
}
$query3 = $con->query("SELECT * FROM `mlm_users` WHERE `UserPhone` = '$phone'");
if($query3->num_rows > 0){
  echo '"phoneExists": true';
}else{
  echo '"phoneExists": false';
}
echo "}";
}
if($action == "insert_data"){
  //get referral id 
  if(filter_var($referer,FILTER_VALIDATE_EMAIL)){
$upline = $user->getIdBy("UserEmail",$referer);
  }else{
$upline = $user->getIdBy("UserName",$referer);
  }

$query = $con->query("
INSERT INTO `mlm_users` SET `UserName` = '$username',`UserEmail` = '$email',`UserRegTime` = '".time()."', `UserPhone` = '$phone',`UserFullName` = '$full_name',`UserGender` = '$gender',`UserResState` = '$res_state',`UserPassword` = '$password',`UserUplinerId` = '$upline',`UserCurrentLevel` = '0',`UserBlocked` = '0',`UserPaid` = '0'
  ");
echo $con->error;
if(!$query){
echo "unable to insert new user";
}
$_SESSION['user'] = $con->insert_id;
$id = $_SESSION['user'];
$query2 = $con->query("INSERT INTO `mlm_bank_details` SET `BankName` = '$bank_name',`AccountName` = '$account_name',`AccountNo` = '$account_number',`AccountUserId` = '$id'");
//SEND NOTIFICATION TO THE USER
$user = new user($id);
$notify = new notificationSystem($user->get("UserEmail"),$user->get("UserPhone"));
$notify->sendMail("Lilyinvestments.com Notification","Dear participant,<br>You have a new Payment Order, kindly log in to your dashboard and Pay Up Your Order,<br><br>Best Regards From: Lilyinvestments.com");
$notify->sendSMS("Dear Participant, You have a new Payment Order, check Your Dashboard and Pay up.");

//SET $_SESSION FOR NEW REGISTRATION
  
echo $con->error;
if($query){
  echo '{"error": false}';
}else{
  echo '{"error": true}';
  echo $con->error;
}

}

echo $action;
        
        
    }
    


	
}









