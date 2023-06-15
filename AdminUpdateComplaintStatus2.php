<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "fkedusearch") or die(mysqli_error($link));

function updateComplaintStatus($complaintID, $newStatus, $link)
{
    // Update the status of the complaint in the database
    $updateQuery = "UPDATE complaint SET complaint_status = '$newStatus' WHERE complaintID = '$complaintID'";
    $updateResult = mysqli_query($link, $updateQuery);

    if ($updateResult) {
        return true;
    } else {
        return false;
    }
}

// Check if the complaint ID is provided in the URL query string
if (isset($_GET['id'])) {
    $complaintID = $_GET['id'];
} else {
    echo "Complaint ID not provided.";
    exit;
}

// Check if the new status is provided in the URL query string
if (isset($_POST['status'])) {
    $newStatus = $_POST['status'];
} else {
    echo "New status not provided.";
    exit;
}

// Update the complaint status
$statusUpdated = updateComplaintStatus($complaintID, $newStatus, $link);

if ($statusUpdated) {
    echo "Complaint status updated successfully.";
} else {
    echo "Failed to update complaint status.";
}

?>

<br><br>
<a href="AdminViewComplaintList.php">Go back to main page</a>
