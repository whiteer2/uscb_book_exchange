<?php

require_once 'Model/theModel.php';

//uncomment for live purposes!
$email = isset($_GET['email']);

//comment or delete for life purposes. This is for testing only
//$email = 'glesias@email.sc.edu';

if($email){
	
	$email = $_GET['email'];
	
	$newEmail = new Email();
	
	//is the email a valid email?
	if($newEmail->isValidUSCBEmail($email)){
		
		$dbh = new DB();
		
		//check to see if the email already exists in the database
		$isExistingEmail = $dbh->getEmailByEmailName($email);
		
		if(!$isExistingEmail){
			
			//try to send a registration email to the user
			if($newEmail->sendValidationEmail($email)){
				
				echo 'a registration email has been sent!';
				
			}
			else {
				
				echo 'an error has occured!';
				
			}
			
		}
		else{
			
			echo 'user account already exists!';
			
		}
	}
	else{
		
		echo 'invalid email!';
		
	}
}

?>