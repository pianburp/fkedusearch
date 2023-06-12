<?php
// Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

// Select the database.
mysqli_select_db($link, "we_project") or die(mysqli_error($link));

$idURL = $_GET['id'];

// SQL query
$query = "SELECT * FROM complaint WHERE complaintID = '$idURL'";

// Execute the query
$result = mysqli_query($link, $query) or die(mysqli_error($link));

// Check if any rows are returned
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $Ctype = $row["complaint_type"];
    
    $Udesc = $row["complaint_desc"];
} else {
    die("No rows found for the specified ID.");
}

mysqli_free_result($result);
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="StudentUpdateComplaintPage2.php">
    Type:
    <select name="Kat[]" multiple>
  <option value="Inappropriate">Inappropriate</option>
  <option value="Irrelevant content">Irrelevant content</option>
  <option value="Missing Information">Missing Information</option>
  <option value="Misleading Title">Misleading Title</option>
  </select><br>
    <br>
    
    Description: <input type="text" name="content" value="<?php echo $Udesc; ?>">
    <br>
    <input type="hidden" name="id2" value="<?php echo $idURL; ?>">
    <input type="submit" value="Ubah">
    <input type="reset" value="Batal" Onclick='window.location = "StudentComplaintMainPage.php"'>
    <br>
</form>
<hr>