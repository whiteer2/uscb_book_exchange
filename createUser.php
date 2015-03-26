<?php

require_once 'Model/DB.php';
require_once 'Model/User.php';
require_once 'Model/Password.php';


$email = isset($_POST['email']);
$password = isset($_POST['pw']);
$passwordConfirm = isset($_POST['pwc']);
$theFirstName = isset($_POST['fName']);
$theLastName = isset($_POST['lName']);
$theSchedule = isset($_POST['schedule']);


if($email && $password && $passwordConfirm && $theFirstName && $theLastName)
{
	$email = $_POST['emailID'];
	$password = $_POST['pw'];
	$passwordConfirm =  $_POST['pwc'];
	$theFirstName = $_POST['fName'];
	$theLastName =  $_POST['lName'];
		if($theSchedule)
		{
			$theSchedule =  $_POST['schedule'];
		}
	else 
	{
		$theSchedule = NULL;
	}
	
		$dbh = new DB();
	
		if(Password::comparePassword($password, $passwordConfirm))
		{
			if(Password::isGoodPassword($password))
			{
			 	$newUser = new User();
			 	$correctEmailID = $newUser->setEmailID($email);
			 	
			 	if(!$correctEmailID)
			 	{
			 		echo 'not a USCB email.';
			 	}
				
			 $currentPasswordHash = $newUser->setPasswordHash($password);
			 
			 if(!$currentPasswordHash)
				{
					echo 'couldnt generate password hash';	
				}
			
			$currentFirstName = $newUser->setFirstName($theFirstName);
			
			if(!$theFirstName)
			{
				echo'could not add first name';
			}
			
			$currentLastName = $newUser->setLastName($theLastName);
			
			if(!$theLastName)
			{
				echo'could not add last name';
		
			}
			
			$currentSchedule = $newUser->setSchedule($theSchedule);
			
			if(!$currentSchedule)
			{
				echo 'could not create schedule';
			
			}
				if($IDofEmail)
				{
					$newUser->setEmailID($_POST['emailID']);
		
				}
				if($password)
				{
					$newUser->setPasswordHash($_POST['pw']);
				}
				
				if($theFirstName)
				{
					$newUser->setFirstName($_POST['fName']);
				}
				
				if($theLastName)
				{
					$newUser->setLastName($_POST['lName']);
				}
				
				if($theSchedule)
				{
					$newUser->setSchedule($_POST['schedule']);
				}
			}
			echo"passwords did not match";
		}
}
//create user module for Zach to code
//NEW COMMENT FOR MERGE!
?>
