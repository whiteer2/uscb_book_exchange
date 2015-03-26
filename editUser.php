<?php

 require_once "Model/DB.php";
 require_once "Model/User.php";
 
 
 $user = $_SESSION(['user']);
 $newSchedule = $_POST(['schedule']); 
 $dbh = new DB();
 $user = new User();
 if($user->isLoggedIn())
 {
 	
 	$user = new User();
	$result = $user->getSchedule();
	
	if($result)
	{
		
		$updateSchedule = $user->setSchedule($newSchedule);
		
	if($updateSchedule)
	{
		
		echo 'update sucessfully';
		
	}
	else
		{
			echo 'failed to update';
		}
 }
 else {
     echo'failed to get schedule';
 }
 echo 'schedule updated';
 }
 else {
     echo 'not logged in';
     }

//edit user module for Zach to code


?>