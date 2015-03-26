<?php

require_once "Model/DB.php";
require_once "Model/User.php";

$user = isset($_SESSION(['user']));
$newSchedule = isset($_POST(['schedule']));

if ($user && $newSchedule) {

	$user = $_SESSION['user'];

	$newSchedule = $_POST['schedule'];

	$userID = $user -> getUserID();

	$dbh = new DB();

	//attempt to find the current user logged into the system in the DB
	$userToEdit = $dbh -> getUserByUserID($userID);

	if (!$userToEdit) {
		echo 'An error has occured!';
	} else {

		//we found the user in the db and returned the user

		//set the schedule on the object
		$userToEdit -> setSchedule($newSchedule);

		//attempt to update the user in the DB
		if ($dbh -> updateUser($userToEdit)) {

			echo ' User updated successfully!';

		} else {

			echo 'An error has occured!';

		}
	}//end else

}//end if
else {
	echo 'Please log in!';
}

//edit user module for Zach to code
?>