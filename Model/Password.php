<?php

class Password{
		
	public static function comparePassword($password, $comparedPassword){
		if(strcmp($password, $comparedPassword) == 0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public static function isGoodPassword($password){
		
			$length = strlen($password);
			
			if(($length > 12) || ($length < 7)){
				return FALSE;
			}
			
			if(!preg_match('/[A-Z]/', $password)){
				return FALSE;
			}
			
			if(!preg_match('/[0-9]/', $password)){
				return FALSE;
			}
			
			return TRUE;
			
	}

	public static function hashPassword($password){
	
		$hashedPassword = hash('sha256',$password);
	
		return $hashedPassword;
	
	}
	
}


?>