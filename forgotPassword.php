<?php

require_once 'Model/DB.php';
require_once 'Model/Email.php';
require_once 'Model/Password.php';


$email = isset($_POST['email']);
$password = isset($_POST['newPass']);
$confirmPassword = isset($_POST['confirmPass']);


$emailCheck = isset($_GET['email']);
$emailHash = isset($_GET['code1']);
$passwordHash = isset($_GET['code2']);




//comment out or delete for live version! FOr test purposes only!
// $email = 'glesias@email.sc.edu';
// $password = '12345555B';
// $confirmPassword = '12345555B';

//handle the forgot password information sent from out website
if($email && $password && $confirmPassword){
	
	$email = $_POST['email'];
	$password = $_POST['newPass'];
	$confirmPassword = $_POST['confirmPass'];
	
	//make sure the passwords entered match each other
	if(Password::comparePassword($password, $confirmPassword)){
		
		//if the password fits the 7-12 characters, one capital letter, and one number
		if(Password::isGoodPassword($password)){
			
			//create a new DBH and see if we can find the email in our DB
			$dbh = new DB();
			
			$existingEmail = $dbh->getEmailByEmailName($email);
			
			if(!$existingEmail){
				
				echo ' User does not exist!';
				
			}
			else{
					
				//we found the email/user, so now we will attempt to send a reset password request to their email		
				$sendEmailRequest = new Email();
				
				if($sendEmailRequest->sendPasswordResetRequest($email, $password)){
					
					echo 'an email has been sent to your account!';
					
				}
				else{
					
					echo 'we could not send oyu an email at this time. Please try again later.';
					
				}
				
			}
			
		}
		else{
			
			echo ' Password does not match requirements!';
			
		}
		
	}
	else{
		
		echo ' Passwords do not match!';
		
	}
	
}
//handle the forgot password information after the user clicks the get request from their email 
else if($emailCheck && $emailHash && $passwordHash){
	
	$emailCheck = $_GET['email'];
	$emailHash = $_GET['code1'];
	$passwordHash = $_GET['code2'];
	
	//make sure the email matches the email hash
	$hashEmailCheck = Email::hashEmailOrPassword($emailCheck);
	
	
	if($hashEmailCheck == $emailHash){
		
		//create a new DBH and check the database to see if the email exists in the DB
		$dbh = new DB();
		
		$emailID = $dbh->getEmailIDByEmailName($emailCheck);
		
		if(!$emailID){
			
			echo 'An error has occured! Taking you to the homepage.';
			
			header( "refresh:5; url=index.php" );
			
		}
		else{
			
			//email exists, so now we need to see if we can link a user to that email
			$user = $dbh->getUserByEmailID($emailID);
			
			if(!$user){
				
				echo 'An error has occured! Taking you to the homepage.';
			
				header( "refresh:5; url=index.php" );
				
			}
			else{
				
				//we found a user that matches that email. now we attempt to update the password hash!
				
				$updateSuccessfull = $dbh->updateUserPWHashByEmailID($emailID, $passwordHash);
				
				if(!$updateSuccessfull){
					
					echo 'An error has occured! Taking you to the homepage.';
			
					header( "refresh:5; url=index.php" );
					
				}
				else {
					
					echo ' password Reset Successfully! Taking you to the homepage to login!';
					
					header( "refresh:5; url=index.php" );
					
				}
				
			}
			
		}		
		
	}
	else{
		echo "Don't be messing with my requests, maine!";
		header( "refresh:5; url=index.php" );
	}
}
else{
	header( "index.php" );
}


?>