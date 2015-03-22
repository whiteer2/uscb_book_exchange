<?php


require_once 'Model/DB.php';

$listingID = isset($_POST['listingID']);
$userID = isset($_POST['userID']);

if($listingID && $useriD){
	
	$listingID = $_POST['listingID'];
	$userID = $_POST['userID'];
	
	$dbh = new DB();
	
	if($dbh->deleteListingByListingIDAndUserID($listingID, $userID)){
		
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