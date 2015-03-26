<?php
include_once 'Model/DB.php';
include_once 'Model/User.php';
include_once 'Model/Password.php';

//login/logout module for zach to code
$email = isset($_POST['email']);
$password = isset($_POST['password']);
$logoutSet = isset($_POST['logout']);
$logoutStatus = $_POST['logout'];


if($email && $password)
{
	
$email = $_POST['email'];
$password = $_POST['password'];
	
 $pwHash = Password::hashPassword($password);
 $user = $dbh->getUserByEmailID($emailID);
 if(!$user)
 {
 	echo 'incorrect email or password';
	
 }
 else {
 	
 		$user = new User();
	 
     if($user->getPasswordHash() = $pwHash)
	 {
	 	
	 	$user->login();
		//redirect to html page
		header("Location:http//www.uscbtextbookechange.com/Account");
		
	 }
	 else {
	 	
		 echo 'incorrect user name and password';
	 	}
	 
 }
}
else {
		echo 'please put in a value for both username and password';
}
//LOGOUT CONTROLLER SECTION
if($logoutSet && $logoutStatus )
{
	session_destroy();
	head('Location:http://www.uscbtextbookexchange.com/Home');
}

?>