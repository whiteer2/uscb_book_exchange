<?php

class User{
	
	private $userID;
	private $emailID;
	private $fName;
	private $lName;
	private $schedule;
	private $passwordHash;
	private $isBanned;
	private $isLoggedIn;
	
	public function __construct(){
		$this->isBanned = 0;
		$this->isLoggedIn = 0;
	}
	
	function getUserID(){
		return $this->userID;
	}
	
	function getEmailID(){
		return $this->emailID;
	}
	
	function getFirstName(){
		return $this->fName;
	}
	
	function getLastName(){
		return $this->lName;
	}
	
	function getSchedule(){
		return $this->schedule;
	}
	
	function getPasswordHash(){
		return $this->passwordHash;
	}
	
	function isBanned(){
		return $this->isBanned;
	}
	
	function isLoggedIn(){
		return $this->isBanned;
	}
	
	function setUserID($newUserID){
		$this->userID = $newUserID;
	}
	
	function setEmailID($newEmailID){
		$this->emailID = $newEmailID;
	}
	
	function setFirstName($newFirstName){
		$this->fName = $newFirstName;
	}
	
	function setLastName($newLastName){
		$this->lName = $newLastName;
	}
	
	function setSchedule($newSchedule){
		$this->schedule = $newSchedule;
	}
	
	function setPasswordHash($newPasswordHash){
		$this->passwordHash = $newPasswordHash;
	}
	
	function ban(){
		$this->isBanned = 1;
	}
	
	function unban(){
		$this->isBanned = 0;
	}
	
	function login(){
				
		$this->isLoggedIn = 1;
		$_SESSION['user'] = $this;
		return TRUE;		
	}
	
	function logout(){
		session_destroy();
		$this->isLoggedIn = 0;
		return TRUE;
	}
	
	function isUserSet(){
				
		if(!isset($this->emailID)){
			return FALSE;
		}
		
		if(!isset($this->fName)){
			return FALSE;
		}
		
		if(!isset($this->lName)){
			return FALSE;
		}
				
		if(!isset($this->passwordHash)){
			return FALSE;
		}
				
		return TRUE;
	}
	
	function printUser(){
		print_r($this);
	}
}



?>