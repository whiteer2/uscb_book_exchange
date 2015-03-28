<?php
require_once 'Model/theModel.php';

//delete user modulle for zach to code

$deleteUser = isset($_POST['deleteUser']);
$user = isset($_SESSION['user']);

if ($user && $deleteUser) {

	$deleteUser = $_POST['deleteUser'];
	$user = $_SESSION['user'];
	$userID = $user -> getUserID();
	$emailID = $user -> getEmailID();

	if ($deleteUser) {

		$dbh = new DB();

		if ($dbh -> deleteUserByUserID($userID) && $dbh -> deleteEmailByEmailID($emailID)) {

			$user -> logout();

			echo "deleted sucessfully";

			//redirect the user

		} else {

			echo 'error has occured';

		}
	} else {

		echo "error has occured ";

	}
} else {

	echo 'please log in';

}
?>