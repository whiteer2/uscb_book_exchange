<?php
require_once 'Model/DB.php';
require_once 'Model/Listing.php';


$theUser = isset($_SESSION['user']);
$price =  isset($_POST['price']);
$isNegotiable = isset($_POST['isNegotiable']);
$description = isset($_POST['description']);
$listingID= isset($_POST['listingID']);


	if($theUser && $listingID)
	{
		$listingID= $_POST['listingID'];

		$listingToUpdate = getListingbyListingID($listingID);

		if(!$listingToUpdate){
		
			echo "listing doesn't exist";
	
		}//end if
	
		else
		{
			
			
	
			 if($price)
	 			{
	 		
				$listingToUpdate->setPrice($_POST['price']);
	 	
			 	}
		     if($isNegotiable)
				 {
		 	
				$listingToUpdate->setIsNegotiable($_POST['isNegotiable']);
		
	 			}
		    if($description)
	 			{
	 	
				$listingToUpdate->setIsNegotiable($_POST['description']);
		
	 			}
		 	  	 
	 		
	 		
	 		if(!$updateListing($listingToUpdate))
	 			{
	 	
	 			echo 'could not update listing';
	 
				 }
		
	 		else 
	 		{
	 	
			echo 'listing updated sucessfully';	
		
	 		}
	 
	}//end else
}// end else 

else 
{
	
	echo 'Please log into account to update Listing';
			
 }// end of else
	 	 

?>

