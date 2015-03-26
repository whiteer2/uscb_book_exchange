<?php


require_once 'Model/DB.php';
//require_once 'Model/User.php'; not needed
//$listingID = isset($_POST['listingID']);
//$userID = isset($_POST['userID']);

$listingID = 1;
$userID = 1;
if($listingID && $userID){
	
	$listingID = 2;
	;
	
	$userID =9;
	;
	
	$dbh = new DB();
	
	if($dbh -> deleteListingByListingIDAndUserID($listingID, $userID)){
		
		echo 'listing deleted successfully';
		
	}
	else{
		
		echo 'an error has occured';
	}
	
}
else
	 {
	
	//do nothing
	echo 'do nothing make sure it works';
   }



?>