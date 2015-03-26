<?php
require_once 'Model/DB.php';

$ISBN = isset($_GET['ISBN']);
$title = isset($_GET['bookTitle']);
$subject = isset($_GET['bookSubject']);
$author = isset($_GET['BookAuthor']);
$publisher = isset($_GET['publisher']);
$price = isset($_GET['price']);
$isNegotiable = isset($_GET['isNegotiable']);
$description = isset($_GET['description']);

$theUser = isset($_SESSION['user']);

if ($ISBN && $title && $subject && $author && $publisher && $price && $isNegotiable && $theUser) {

	$ISBN = $_GET['ISBN'];
	$title = $_GET['bookTitle'];
	$subject = $_GET['bookSubject'];
	$author = $_GET['BookAuthor'];
	$publisher = $_GET['publisher'];
	$price = $_GET['price'];
	$isNegotiable = $_GET['isNegotiable'];

	if ($description) {

		$description = $_GET['description'];

	} else {

		$description = NULL;

	}

	$theUser = $_SESSION['user'];

	$userID = $theUser -> getUserID();

	$dbh = new DB();

	$bookToListing = $dbh -> getBookByISBN($ISBN);

	//book is not in the DB
	if (!$bookToListing) {

		$publisherID = $dbh -> getPublisherIDByName($publisher);

		//publisher is not the DB
		if (!$publisherID) {

			if ($dbh -> insertPublisher($publisher)) {

				//publisher inserted successfully!

				$publisherID = $dbh -> getPublisherIDByName($publisher);

				if (!$publisherID) {

					echo 'Could not create listing! An error occured!';

				} else {

					$bookToListing = new Book();

					$bookToListing -> setISBN($ISBN);

					$bookToListing -> setPublisherID($publisherID);

					$bookToListing -> setTitle($title);

					$bookToListing -> setSubject($subject);

					$bookToListing -> setAuthor($author);

					if ($dbh -> insertBook($bookToListing)) {

						//book inserted successfully. now create the listing

						$listingToCreate = new Listing();

						$listingToCreate -> setISBN($ISBN);

						$listingToCreate -> setUserID($userID);

						$listingToCreate -> setPrice($price);

						$listingToCreate -> setIsNegotiable($isNegotiable);

						$listingToCreate -> setDescription($description);

						if ($dbh -> insertListing($listingToCreate)) {

							echo ' Listing created successfully!';

						} else {

							echo 'Could not create listing! An error occured!';

						}

					} else {

						echo 'Could not create listing! An error occured!';

					}

				}
			} else {

				echo 'Could not create listing! An error occured!';

			}

		}
		//publisher is in the DB
		else {

			$bookToListing = new Book();

			$bookToListing -> setISBN($ISBN);

			$bookToListing -> setPublisherID($publisherID);

			$bookToListing -> setTitle($title);

			$bookToListing -> setSubject($subject);

			$bookToListing -> setAuthor($author);

			if ($dbh -> insertBook($bookToListing)) {

				//book inserted successfully. now create the listing

				$listingToCreate = new Listing();

				$listingToCreate -> setISBN($ISBN);

				$listingToCreate -> setUserID($userID);

				$listingToCreate -> setPrice($price);

				$listingToCreate -> setIsNegotiable($isNegotiable);

				$listingToCreate -> setDescription($description);

				if ($dbh -> insertListing($listingToCreate)) {

					echo ' Listing created successfully!';

				} else {

					echo 'Could not create listing! An error occured!';

				}

			} else {

				echo 'Could not create listing! An error occured!';

			}

		}
		//book is in the DB
	} else {

		$listingToCreate = new Listing();

		$listingToCreate -> setISBN($ISBN);

		$listingToCreate -> setUserID($userID);

		$listingToCreate -> setPrice($price);

		$listingToCreate -> setIsNegotiable($isNegotiable);

		$listingToCreate -> setDescription($description);

		if ($dbh -> insertListing($listingToCreate)) {

			echo ' Listing created successfully!';

		} else {

			echo 'Could not create listing! An error occured!';

		}

	}

} elseif (!$theUser) {

	echo 'Please log in to create a listing!';

} else {

	echo 'Please complete all fields!';
}
?>