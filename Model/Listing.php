<?php


class Listing{
	//Listing class for ernest to code. please reference the DB schema 
	private $listingID;//
	private $ISBN;//
	private $userId;//
	private $price;//
	private $isNegotiable;//
	private $description;
	
	//These should be all the set and get methods needed for the project
function getlistingId(){
	
		return $this ->listingID = 0;
		
}
	
function getISBN(){
	
		return $this ->ISBN = 0;
		
}
	
	
function getuserId(){
	
		return $this ->userID = 0;
}
		
function getpriceId(){
	
		return $this -> priceID = 0;
	
}
	
function getisNegotiableId(){
	
		return $this -> listingID = 0;
								
}
	
function getdescriptionId(){
	
		return $this -> listingID = 0;
		
}
	
function setlistingID($newListingID){
	
		$this-> listingID = $newListingID;
		
}
	
function setpriceID($newPriceID){
	
		$this-> priceID = $newPriceID;

}

function setISBN($newIsbn){
	
		$this-> ISBN = $newIsbn;
		
}	

function setuserId($newUserID){
	
		$this-> userID = $newUserID;
							
}

function setupisNegotiable($newIsNegotiable){
	
		$this-> isNegotiable = $newIsNegotiable;
		
}


function setdescription($newDescription){
	
		$this-> description = $newDescription;
											
}
	
//this should be all the functions needed to test 
//whether the the listing plaved in the back end is good
function islistingSet()
{
	
	if(!isset($this-> userID )){
	
	return FAlSE;
		
  }	
	
	if(!isset($this-> ISBN )){
	
	return FAlSE;
		
	 }	
	
	if(!isset($this-> listingID )){
	
	return FAlSE;
		
	}	
	
	return TRUE;
	
    }

function printlisting(){
		
	print_r($this);	
	
}

	
}	
	
	

?>