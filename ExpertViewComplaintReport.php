<!DOCTYPE html>
<html>
<body>
<?php
// Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

// Select the database.
mysqli_select_db($link, "WE_project") or die(mysqli_error($link));

// Define the specific post ID.
$postID = $_POST['postID']; // Replace with your desired post ID.

// SQL query with post ID and status condition.
$query = "SELECT COUNT(*) AS complaintCount FROM complaint WHERE postID = $postID AND complaint_status = 'Approved'"
	or die(mysqli_connect_error());
	
// Execute the query (the recordset $result contains the result).
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$complaintCount = $row['complaintCount'];

	echo "Total number of complaints for post ID $postID $complaintCount";
} else {
	echo "No results found for the specified post ID and status.";
}

// Close the database connection.
mysqli_close($link);
?>

<a href='ExpertViewComplaintList.php?id=".$cID."'>Kembali</a>
</body>
</html>
