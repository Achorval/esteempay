<?php
class AppUser_Model extends Model {

    public function __construct() {

		parent::__construct();

	}
	
	 public function getUser($user_id){

     $query = $this->db->queryDB("SELECT * FROM users WHERE id = '".$user_id."'");

     if($query->num_rows>0){

      return $query;

     }

     return null;

  }

  public function getTransactions($user_id){

     $query = $this->db->queryDB("SELECT * FROM wallet_transactions WHERE user_id = '".$user_id."' ORDER by ID DESC");

     if($query->num_rows>0){

      return $query;

     }

     return null;

  }
  
    public function getTasks($user_id,$status){

     $query = $this->db->queryDB("SELECT * FROM tasks WHERE added_by = '".$user_id."' AND status = '".$status."' ORDER by ID DESC");

     if($query->num_rows>0){

      return $query;

     }

     return null;

  }
  
   public function getCardTransactions($user_id){

     $query = $this->db->queryDB("SELECT * FROM card_transactions WHERE card_id = '".$user_id."' ORDER by ID DESC");

     if($query->num_rows>0){

      return $query;

     }

     return null;

  }
  
    public function cards($user_id){

     $query = $this->db->queryDB("SELECT * FROM cards WHERE user_id = '".$user_id."' AND status = 'active' ORDER by ID DESC ");

     if($query->num_rows>0){

      return $query;

     }

     return null;

  }
  
    public function processCreateCard($data){
      
      $feedback = "";
      
      if($data==""||$data==NULL){
          
          $feedback = array("error"=>"yes","message"=>"empty data");
          
          return $feedback;
          
          exit();
          
      }
      
      $user_id = $data['user_id'];
      
      $card_name = $data['card_name'];
      
      $amount = $data['amount'];
      
      $transaction_fee = $data['transaction_fee'];
      
      $queryCheckBalance = $this->db->queryDB('SELECT wallets.id as wallet_id, tokens.token_symbol, tokens.id as token_id, tokens.balance, wallets.user_id FROM tokens INNER JOIN wallets ON wallets.id = tokens.wallet_id WHERE wallets.user_id = "'.$user_id.'" AND tokens.token_symbol = "USD"');
      
      if($queryCheckBalance->num_rows&&$queryCheckBalance->num_rows>0){
          
        //$queryCheckBalance = $this->db->queryDB('SELECT wallets.id as wallet_id, tokens.token_symbol, tokens.id, tokens.balance, wallets.user_id FROM tokens INNER JOIN wallets ON wallets.id = tokens.wallet_id WHERE wallets.user_id = "'.$user_id.'" AND tokens.token_symbol = "USD"');
        
        foreach($queryCheckBalance as $queryB => $valueB){
            
            $token_id = $valueB['token_id'];
            
            $wallet_id = $valueB['wallet_id'];
            
            $balance = $valueB['balance'];
            
            $old_balance = $valueB['balance'];
            
        }
        
        $remark = "Balance debit for card creation";
        
        $reference_no = rand(1000000000000, 9999999999999)+1;
        
        $new_balance = $balance - $amount;
        
        $date = date("Y-m-d H:s");
        
        if($balance>=$transaction_fee+$amount){
            
			//console.log("User balance is sufficient, proceeding with debit action...");
		
		$addTrans1 = $this->db->queryDB('INSERT INTO `wallet_transactions`(`user_id`, `type`, `amount`, `old_balance`, `balance`, `remark`, `reference_no`, `status`, `currency`, `wallet_id`, `wallet_name`,`date`) VALUES ("'.$user_id.'","debit","'.$amount.'","'.$old_balance.'","'.$new_balance.'","'.$remark.'","'.$reference_no.'","active","USD","'.$wallet_id.'","","'.$date.'")');
		
	    $addTrans2 = $this->db->queryDB('UPDATE tokens SET balance = "'.$new_balance.'" WHERE id = "'.$token_id.'"');
		
	    $reference_no1 = rand(1000000000000, 9999999999999)+1;
		
		$remark = "Transaction fee for transaction: ".$reference_no;
		
		$addTrans3 = $this->db->queryDB('INSERT INTO `wallet_transactions`(`user_id`, `type`, `amount`, `old_balance`, `balance`, `remark`, `reference_no`, `status`, `currency`, `wallet_id`, `wallet_name`,`date`) VALUES ("'.$user_id.'","debit","'.$transaction_fee.'",(SELECT balance FROM tokens WHERE id = "'.$token_id.'"),((SELECT balance FROM tokens WHERE id = "'.$token_id.'")-'.$transaction_fee.'),"'.$remark.'","'.$reference_no1.'","active","USD","'.$wallet_id.'","","'.$date.'")');
		
		$addTrans4 = $this->db->queryDB('UPDATE tokens SET balance = (balance-'.$transaction_fee.') WHERE id = "'.$token_id.'"');
		
		if(!$addTrans1||!$addTrans2||!$addTrans3||!$addTrans4){
		    
		     $feedback = array("error"=>"yes","message"=>"A transaction error occurred");
		     
		     	$this->db->queryDB("UPDATE wallet_transactions SET feedback = '".$feedback['message']."' WHERE reference_no = '".$reference_no."'");
          
          return $feedback;
          
          exit();   
		    
		}else {
		    
		    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/virtual-cards",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n    \"currency\": \"USD\",\n    \"amount\": $amount,\n    \"billing_name\": \"$card_name\",\n    \"billing_address\": \"121 S. Orange Str\",\n    \"billing_city\": \"Orlando \",\n    \"billing_state\": \"FL\",\n    \"billing_postal_code\": \"984105\",\n    \"billing_country\": \"US\",\n    \"callback_url\": \"https://pay.esteem.finance/card_callback.php/\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer FLWSECK_TEST-SANDBOXDEMOKEY-X"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$api_response = json_decode($response);

if($api_response->status=="success"){
    
   $card_data = $api_response->data;
  
  $account_id = $card_data->account_id;
  
  $name_on_card = $card_data->name_on_card;
  
  $amount = $card_data->amount;
  
  $card_id = $card_data->id;
  
  $card_pan = $card_data->card_pan;
  
  $masked_pan = $card_data->masked_pan;
  
  $cvv = $card_data->cvv;
  
  $billing_address = $card_data->address_1;
  
  $card_expiration = $card_data->expiration;
  
  $city = $card_data->city;
  
  $state = $card_data->state;
  
  $country = "USA";
  
  $zip_code = $card_data->zip_code;
  
  $card_type = $card_data->card_type;
  
   $reference_no2 = rand(1000000000000, 9999999999999)+1;
  
  $addCard = $this->db->queryDB('INSERT INTO `cards`( `external_id`, `account_id`,`user_id`, `currency`,`amount`,`name_on_card`,`card_number`, `masked_pan`, `card_expiration`, `card_security_code`, `billing_address`,`card_type`,`city` , `state`, `country`, `zip_code`, `status`) VALUES ("'.$card_id.'","'.$account_id.'","'.$user_id.'","USD","'.$amount.'","'.$name_on_card.'","'.$card_pan.'","'.$masked_pan.'","'.$card_expiration.'","'.$cvv.'","'.$billing_address.'","'.$card_type.'","'.$city.'","'.$state.'","'.$country.'","'.$zip_code.'","active")');
  
   $addCardTrans = $this->db->queryDB('INSERT INTO `card_transactions`( `user_id`, `type`, `amount`, `old_balance`, `balance`, `remark`, `reference_no`, `status`, `currency`, `card_id`, `wallet_name`) VALUES ("'.$user_id.'","credit","'.$amount.'","0","'.$amount.'","Card funding","'.$reference_no.'","active","USD",(SELECT id FROM cards WHERE external_id = "'.$card_id.'"),"")');
  
    //$this->db->queryDB('INSERT INTO `card_transactions`( `user_id`, `type`, `amount`, `old_balance`, `balance`, `remark`, `reference_no`, `status`, `currency`, `card_id`, `wallet_name`) VALUES ("'.$user_id.'","credit","'.$amount.'","0","'.$amount.'","Card funding","'.$reference_no.'","active","USD",(SELECT id FROM cards WHERE external_id = "'.$card_id.'"),"")');
    
    	if(!$addCard||!$addCardTrans){
		    
		     $feedback = array("error"=>"yes","message"=>"A transaction error occurred");
		     
		     	$this->db->queryDB("UPDATE wallet_transactions SET feedback = '".$feedback['message']."' WHERE reference_no = '".$reference_no."'");
          
          return $feedback;
          
          exit();   
		    
		}else {
		    
		      $feedback = array("error"=>"no","message"=>"successfull");
		      
		      	$this->db->queryDB("UPDATE wallet_transactions SET feedback = '".$feedback['message']."' WHERE reference_no = '".$reference_no."'");
          
          return $feedback;
          
          exit();   
		    
		    
		}
    
    
    
}
else {
    
      $feedback = array("error"=>"yes","message"=>"An error occurred".$api_response->message);
      
      	$this->db->queryDB("UPDATE wallet_transactions SET feedback = '".$feedback['message']."' WHERE reference_no = '".$reference_no."'");
          
          return $feedback;
          
          exit();    
    
}
		    
		}
		
            
        } else {
            
             $feedback = array("error"=>"yes","message"=>"Insufficient balance");
          
          return $feedback;
          
          exit();  
            
        }
        
      }else {
          
           $feedback = array("error"=>"yes","message"=>"balance check error");
          
          return $feedback;
          
          exit();
          
      }
      
      
  }

  function processCreateWallet($data){

   //INSERT DATA INTO DB
   $query = $this->insert($data,"wallets");
   
  if(isset($query['message'])){
   if($query['message']=="success"){
   
      if($query['message'] == "success"){
	  
	  $wallet_id = $query['id'];
	  
	    $bnb = array();
	  
	    $bnb['wallet_id'] = "'".$wallet_id."'"; $bnb['token_symbol'] = "'BNB'"; $bnb['token_name'] = "'Binance Coin'"; $bnb['token_decimal'] = "'18'";  $bnb['date_added'] = $data['date_added']; $bnb['status'] = "'active'"; 
	  
	    $query1 = $this->insert($bnb,"tokens");
		
		 $usdt = array();
	  
	    $usdt['wallet_id'] = "'".$wallet_id."'"; $usdt['token_symbol'] = "'USDT'"; $usdt['token_name'] = "'USD Tether'"; $usdt['token_decimal'] = "'18'"; $usdt['contract_address'] = "'0x64544969ed7ebf5f083679233325356ebe738930'"; $usdt['abi_array'] = '"'.$this->db->escapeString('[{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"constant":true,"inputs":[],"name":"_decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"_name","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"_symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"burn","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"getOwner","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"mint","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"renounceOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"}]').'"'; $usdt['date_added'] = $data['date_added']; $usdt['status'] = "'active'"; 
	  
	    $query2 = $this->insert($usdt,"tokens");
	  
	  }

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


 function viewWallet($token_id){

   $query = $this->db->queryDB("SELECT * FROM tokens WHERE id = '$token_id'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }
 
 function viewCard($card_id){

   $query = $this->db->queryDB("SELECT * FROM cards WHERE id = '$card_id' AND status = 'active'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }
  function viewBalance($token_id){
  
  $balance = 0;

   $query = $this->db->queryDB("SELECT * FROM tokens WHERE id = '$token_id'");

   if($query->num_rows>0){
   
     foreach($query as $key => $value){
	 
	  if($key=="balance"){
	  
	   $balance = $value['balance'];
	  
	  }
	 
	 }

   }

   return $balance;

 }
 
   function viewCardBalance($card_id){
  
  $balance = 0;

   $query = $this->db->queryDB("SELECT * FROM card_transactions WHERE card_id = '$card_id' ORDER BY id DESC LIMIT 1");

   if($query->num_rows>0){
   
     foreach($query as $key => $value){
	 
	  if($key=="balance"){
	  
	   $balance = $value['balance'];
	  
	  }
	 
	 }

   }

   return $balance;

 }

  function viewWalletAddress($wallet_id){
  
  $wallet_addr = "";

   $query = $this->db->queryDB("SELECT wallet_addr FROM wallets WHERE id = '$wallet_id'");

   if($query->num_rows>0){
   
     foreach($query as $key => $value){
	 
	  if($key=="wallet_addr"){
	  
	   $wallet_addr = $value['wallet_addr'];
	  
	  }
	 
	 }

   }

   return $wallet_addr;

 }
 
 
 
  public function viewBalanceOf($currency="",$user_id){
  
  $balance = 0;

   $query = $this->db->queryDB('SELECT wallets.id as wallet_id, tokens.token_symbol, tokens.id, tokens.balance, wallets.user_id FROM tokens INNER JOIN wallets ON wallets.id = tokens.wallet_id WHERE wallets.user_id = "'.$user_id.'" AND tokens.token_symbol = "'.$currency.'"');

   if($query->num_rows>0){
   
     foreach($query as $key => $value){
	 
	  if($key=="balance"){
	  
	   $balance = $value['balance'];
	  
	  }
	 
	 }

   }

   return $balance;

 }
 
  function viewPrivateKey($wallet_id){
  
  $wallet_addr = "";

   $query = $this->db->queryDB("SELECT wallet_address FROM wallets WHERE id = '$wallet_id'");

   if($query->num_rows>0){
   
     foreach($query as $key => $value){
	 
	  if($key=="wallet_address"){
	  
	   $wallet_addr = $value['wallet_address'];
	  
	  }
	 
	 }

   }

   return $wallet_addr;

 }

 function getWallets($user_id){

   $query = $this->db->queryDB("SELECT * FROM wallets WHERE user_id = '$user_id' AND status != 'Deleted'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

 }
 
  function getTokens($wallet_id){

   $query = $this->db->queryDB("SELECT * FROM tokens WHERE wallet_id = '$wallet_id' AND status != 'Deleted'");

   if($query->num_rows>0){

    return $query;

   }

   return null;

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



}
