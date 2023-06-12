<!DOCTYPE html>
<html>
<body>
<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "WE_project") or die(mysqli_error($link));

// Check if the complaint ID is provided in the URL query string
if (isset($_GET['id'])) {
    $complaintID = $_GET['id'];
} else {
    echo "Complaint ID not provided.";
    exit;
}

// Retrieve the current status of the complaint
$statusQuery = "SELECT complaint_status FROM complaint WHERE complaintID = '$complaintID'";
$statusResult = mysqli_query($link, $statusQuery);
$row = mysqli_fetch_assoc($statusResult);
$currentStatus = $row['complaint_status'];

?>

<br><br>
<form method="POST" action="AdminUpdateComplaintStatus2.php?id=<?php echo $complaintID; ?>">
    <label for="status">Select New Status:</label>
    <select name="status" id="status">
        <option value="inProgress" <?php if ($currentStatus === 'inProgress') echo 'selected'; ?>>In Progress</option>
        <option value="Approved" <?php if ($currentStatus === 'Approved') echo 'selected'; ?>>Approved</option>
        <option value="Denied" <?php if ($currentStatus === 'Denied') echo 'selected'; ?>>Denied</option>
    </select>
    <input type="submit" value="Update">
</form>
<br><br>
<a href="AdminViewComplaintList.php">Go back to main page</a>
</body>
</html>