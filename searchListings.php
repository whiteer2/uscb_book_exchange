<?php
require_once 'Model/theModel.php';
$query = isset($_GET['query']);
if($query){
	
	$query = $_GET['query'];
	
	$dbh = new DB();
	
	$result = $dbh->searchListings($query);
	
	if(!$result){
		
		echo 'No results found!';
		
	}
	else{
		
		echo json_encode($result);
		
	}
	
	
}
else{
	
}
?>