<!DOCTYPE html>
<html>
<body>
<?php
// Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

// Select the database.
mysqli_select_db($link, "fkedu") or die(mysqli_error($link));

// Check if the user is logged in and retrieve the user ID.
// Replace this with your authentication code to get the logged-in user's ID.
$loggedInUserID = 'CB22222'; // Replace with the actual code to get the user ID.

// Check if the status is selected in the URL query string.
if (isset($_GET['status'])) {
    $selectedStatus = $_GET['status'];
} else {
    // Default status option.
    $selectedStatus = "inProgress"; // Change to your desired default status.
}

// SQL query with user ID and status condition.
$query = "SELECT * FROM complaint WHERE userID = '$loggedInUserID' AND complaint_status = '$selectedStatus'"
    or die(mysqli_connect_error());

// Execute the query (the recordset $rs contains the result).
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row.
    echo "<table>";
    echo "<tr><th>Complaint ID</th><th>Post ID</th><th>User ID</th><th>Complaint type</th><th>Complaint Date</th><th>Complaint Description</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $cID = $row["complaintID"];
        $pID = $row["postID"];
        $uID = $row["userID"];
        $Cdate = $row["complaint_date"];
        $Ctype = $row["complaint_type"];
        $Udesc = $row["complaint_desc"];

        echo "<tr>";
        echo "<td>".$cID."</td>";
        echo "<td>".$pID."</td>";
        echo "<td>".$uID."</td>";
        echo "<td>".$Ctype."</td>";
        echo "<td>".$Cdate."</td>";
        echo "<td>".$Udesc."</td>";
        echo "<td>";
        echo "<a href='StudentUpdateComplaintPage1.php?id=".$cID."'>Ubah</a> ||";
        echo "<a href='StudentDeleteComplaint.php?id=".$cID."'>Padam</a> ||";
        echo "<a href='StudentViewComplaintDetails.php?id=".$cID."'>Lihat</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found for the selected status.";
}
?>
<br><br>
<div align="center">
    <form method="GET" action="StudentComplaintMainPage.php">
        <label for="status">Select Status:</label>
        <select name="status" id="status">
            <option value="inProgress" <?php if ($selectedStatus === 'inProgress') echo 'selected'; ?>>In Progress</option>
            <option value="Approved" <?php if ($selectedStatus === 'Approved') echo 'selected'; ?>>Approved</option>
            <option value="Denied" <?php if ($selectedStatus === 'Denied') echo 'selected'; ?>>Denied</option>
        </select>
        <input type="submit" value="View">
    </form>
</div>

<a href="StudentViewComplaintForm.php">Add Complaint</a>
<a href='ComplaintMainPage.php'>Kembali</a>
</body>
</html>
