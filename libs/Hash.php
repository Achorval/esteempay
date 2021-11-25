<?php 

class Hash {
	
	public static function create($algo, $data, $salt) {
		
		/**
		*@param string $algo The algorithm (md5, sha1, etc)
		*@param string $data The data to encode
		*@param string $salt The salt
		**/
				
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);
		
		return hash_final($context);
		
	}
	
	public function CreateSaltKey(){

		$loggedInUser = Session::get('user_id');
		
		$devices = "";
		
		if(count($devices)>0){
			
			$this->redirect(BASE_URL.'site/signin');
			
		}
		
	}
	
	
}