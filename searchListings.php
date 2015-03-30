<?php
//search listing module controller
// Tremaine Farris
// 3/21/2015

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

>>>>>>> 1a1b1844b11029778e28ed1c8bb60f902b0a3189


	if ($results)
	{
		echo json_encode(results);
	} // end if
	
	else 
	{
		echo "We could not find what what you were looking for";
	} // end if/else block
} // end outer if	
else 
{
		echo "Please enter something into the search box!";
} // end if/else block
?>