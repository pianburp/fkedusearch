<?php
// view_data.php

// Retrieve the selected primary key value
$idURL = $_GET['id'];
//Connect to database
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
//Select the database.
mysqli_select_db($link, "WE_project") or die(mysqli_error($link));
// Construct the query using the primary key
$query = "SELECT * FROM complaint WHERE complaintID = $idURL";

// Execute the query
$result = mysqli_query($link, $query); // or use PDO if you prefer

// Process the query result
if ($result) {
    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr><th>Complaint ID</th><th>Post ID</th><th>User ID</th><th>Complaint type</th><th>Complaint Date</th><th>Complaint Description</th></tr>"; 
  
      // Loop through the result and display the data
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['complaintID'] . "</td>"; 
        echo "<td>" . $row['postID'] . "</td>";
        echo "<td>" . $row['userID'] . "</td>";
        echo "<td>" . $row['complaint_type'] . "</td>";
        echo "<td>" . $row['complaint_date'] . "</td>";
        echo "<td>" . $row['complaint_desc'] . "</td>";
        echo "<td>" . $row['complaint_status'] . "</td>";
        echo "<a href='AdminUpdateComplaintStatus.php?id=".$row['complaintID']."'>Ubah</a> ||";
        echo "</tr>";
      }
  
      echo "</table>";
    } else {
      echo "No data found for the selected primary key.";
    }

  // Free the result set
  mysqli_free_result($result);
} else {
  // Handle the case where the query fails
  // ...
}

// Close the database connection
// ...
?>
