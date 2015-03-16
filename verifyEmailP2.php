<?php

require_once 'Model/DB.php';
require_once 'Model/Email.php';

$email = $_GET['email'];
$emailHash = $_GET['code'];

//make sure the get fields are set!
if(isset($email) && isset($emailHash)){
	
	//hash the email	
	$emailHashCheck = Email::hashEmailOrPassword($email);
	
	//see if email hash matches the hash in the get request
	if($emailHashCheck == $emailHash){
		
		//create a new database handler and search the DB to see if the email exists in our DB. if it does,m the user already exists!
		$dbh = new DB();
		
		$emailExists = $dbh->getEmailByEmailName($email);
		
		if(!$emailExists){
			
			//send the user to the create account page
			//echo' create account page';
			//take the user to the create acct page in the view
			
		}
		else{
			echo ' This user already exists! Redirecting you to the homepage!';
			 header( "refresh:5; url=index.php" );
		}
		
	}
	else{
		echo ' an error has occured. redirecting to the home page!';
		header( "refresh:5; url=index.php" );
	}
	
		
}
else{
	header( "index.php" );
}
?>