<?php
//search listing module controller
// Tremaine Farris
// 3/21/2015

$query = $_GET['query'];

if ( isset($query) )
{
	$results = searchListings($query);


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