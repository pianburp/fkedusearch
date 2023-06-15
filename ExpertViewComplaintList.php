<!DOCTYPE html>
<html>
<body>
<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "fkedu") or die(mysqli_error($link));

// Check if the post ID is submitted
// if (isset($_POST['postID'])) {
//     $postID = $_POST['postID'];
$postID = 55;
    //SQL query with post ID and status condition
    $query = "SELECT * FROM complaint WHERE postID = $postID AND complaint_status = 'Approved'"
        or die(mysqli_connect_error());

    //Execute the query (the recordset $rs contains the result)
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0){
        // output data of each row
        echo "<table>";
        echo "<tr><th>Complaint ID</th><th>Post ID</th><th>User ID</th><th>Complaint type</th><th>Complaint Date</th><th>Complaint Description</th><th>Actions</th></tr>";
        while($row = mysqli_fetch_assoc($result)){
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
            echo "<a href='ExpertViewComplaintDetails.php?id=".$cID."'>Lihat</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found for the specified post.";
    }
// }
?>

<form method="POST" action="ExpertViewComplaintReport.php">
    <label for="postID">Enter Post ID:</label>
    <input type="text" name="postID" id="postID">
    <input type="submit" value="Get Complaint Count">
</form>
<a href='ComplaintMainPage.php'>Kembali</a>
</body>
</html>