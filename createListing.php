<?php
require_once 'Model/DB.php';
$user = isset($_GET['ISBN']);
$book = isset($_GET['author']);
$publisher = isset($_GET ['publisherID']);
$price = isset($_GET['price']);
$description = isset($_GET['description']);

if(isLoggedIn($user))
{
	
	
	//check if both in db if not insert it

	if(!getBookByISBN($ISBN))
	{
		
	//if we can't get book, have to look for publisher
	getPublisherIDByName($publisherName);
	
		if(!getPublisherIDByName($publisherName)){
				
			insertPublisher($publisherName);
			
			getPublisherIDByName($publisherName);
		
		}//end of if for !getPublisherIDByName($publisherName)
		
		}// if doesn't get ISBN

	if(!getPublisherNameByName($publisherName))
	
	{
		//
		if(!insertPublisher($publisherName))
		
		{
			
		echo "error, could not create listing";	
			
	
		}	
	}
	
	
	if(!createBook($book))
	{
		echo "error could not create listing";
		
		
	}
	else 
	{
		echo"error could not create listing ";
	}
	else
	{
		echo'error please fill out the form';
	}
	else
		{
			echo "please log in";
		}
			
?>
