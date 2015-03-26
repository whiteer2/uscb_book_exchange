<?php
require_once'Model/DB.php';
require_once'Model/User.php';


//delete user modulle for zach to code
  
  $deleteUser = isset($_POST['deleteUser']);
  $user = isset($_SESSION['user']);
  
  
  
  if($user && $deleteUser)
   {
	
	$deleteUser = $_POST['deleteUser'];
 	$user = $_SESSION['user'];
	$userID = $user->getUserID();
	   
	if($deleteUser)
	{
		$dbh = new DB();
		if($dbh->deleteUserByUserID($userID))
		{
			echo "deleted sucessfully";
		}
		else {
			echo 'error has occured';
		}
	}
	else {
		echo "error has occured ";
	}
   }
  else {
    echo 'please log in';
	 
  }
?>