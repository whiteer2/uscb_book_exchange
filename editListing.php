<?php
require_once 'Model/DB.php';

$theUser = isset($_SESSION['user']);
$price =  isset($_POST['price']);
$isNegotiable = isset($_POST['isNegotiable']);
$description = isset($_POST['description']);
$listing = isset($_POST['listing']);


	if($theUser)
	{

	$listingToUpdate = getListingbyListingID($listingID);

	if(!$listingToUpdate){
		
	echo "listing doesn't exist";
	
	}
	
	else
	{
	
		 if($price)
	 	{
	 		
			$price = $_POST['price'];
	 	
	 	}
		 else{
		 	
			$price = 0;
			
		 }
		 
	 
		 if($isNegotiable)
		 {
		 	
			$isNegotiable = $_POST['isNegotiable'];
		
	 	}
		 else{
		 	
			$isNegotiable = 0;
			
		 }
		 
	 
		 if($description)
	 	{
	 	
		$description = $_POST['description'];
		
	 	}
		 else{
		 	
		 	$description = "";
			
		 }
	 
	  if($listing)
	 	{
	 	
		$listing = $_POST['listing'];
		
	 	}
		 else{
		 	
		 	$listing = 0;
			
		 }
	 
	 	if(!$updateListing($listingToUpdate))
	 	{
	 	
	 	echo 'could not update listing';
	 
		 }
		
	 	else 
	 	{
	 	
		echo 'listing updated sucessfully';	
		
	 	}
	 
	}
}// end of 
	 else 
		 {
		 	echo 'lsisting updated sucessfully';
		 }// end of else
	 
	 
	 
