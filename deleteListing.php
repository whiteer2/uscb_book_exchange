<?php


require_once 'Model/DB.php';

$listingID = isset($_POST['listingID']);
$userID = isset($_POST['userID']);

//FOR TESTING PURPOSES ONLY, COMMENT OUT FOR LIVE
//$listingID = 1;
//$userID = 1;

if($listingID && $userID){
	
	//FOR TESTING PURPOSES ONLY, COMMENT OUT FOR LIVE
	//$listingID = 3;
	//$userID = 9;
	
	$listingID = $_POST['listingID'];
	$userID = $_POST['userID'];
	
	$dbh = new DB();
	
	if($dbh->deleteListingByListingID($listingID)){
		
		echo 'listing deleted successfully';
		
	}
	else{
		
		echo 'an error has occured';
	}
	
}
else
	 {
	
	//do nothing
	
   }



?>