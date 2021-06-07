<?php 
include "config.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// write delete query
	$sql = "DELETE FROM `user_corona` WHERE `id`='$id'";

	// Execute the query

	$result = $db->query($sql);

	if ($result == TRUE) {
		echo "Record deleted successfully.";
	}else{
		echo "Error:" . $sql . "<br>" . $db->error;
	}
}
 else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}
?>