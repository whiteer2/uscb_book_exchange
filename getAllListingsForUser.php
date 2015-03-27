<?php
require_once 'Model/DB.php';
$user = isset($_SESSION['user']);
$listing = isset($_GET['listing']);

if($user && $listing)
{

	$user = $_SESSION['user'];
	
	$result = getUserByUserID($userID);
	
	if(!result)
	
	{
	
		echo 'user has no listing or error';
		
	}// end of if statement
	
	else
	
	{
		
		echo 'json_eoncode(result)';
		
	}//end of else
	
}//end if statement

else 
{

	echo 'user needs to log in to view this information';

}
?>