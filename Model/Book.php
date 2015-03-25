<?php

//Bill did this since Zach's motherfucking ass ddn't show up to class.
class Book{
	
	
	private $ISBN;
	private $publisherID;
	private $title;
	private $author;
	private $subject;
	
	
	function __construct(){
		
	}
	
	function getISBN(){
		
		return $this->ISBN;
		
	}
	
	function getPublisherID(){
		
		return $this->publisherID;
		
	}
	
	function getTitle(){
		
		return $this->title;
		
	}
	
	function getAuthor(){
		
		return $this->author;
		
	}
	
	function getSubject(){
	
		return $this->subject;
		
	}
	
	function setISBN($newISBN){
		
		$this->ISBN = $newISBN;
		
	}
	
	function setPublisherID($newPublisherID){
		
		$this->publisherID = $newPublisherID;
		
	}
	
	function setTitle($newTitle){
		
		$this->title = $newTitle;
		
	}
	
	function setAuthor($newAuthor){
		
		$this->author = $newAuthor;
		
	}
	
	function setSubject($newSubject){
		
		$this->subject = $newSubject;
		
	}
	
function isBookSet(){
		
		if(!isset($this->ISBN)){
			return FALSE;
		}
		
		if(!isset($this->publisherID)){
			return FALSE;
		}
		
		if(!isset($this->title)){
			return FALSE;
		}
				
		if(!isset($this->author)){
			return FALSE;
		}
		if(!isset($this->subject)){
			return FALSE;
		}
				
		return TRUE;
		
	}
	
	function printBook(){
		
		print_r($this);
		
	}

	
}//end class book


?>