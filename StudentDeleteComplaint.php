<!-- update -->
<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "fkedu") or die(mysqli_error($link));

$idURL = $_GET['id'];

//SQL query

$sql = "DELETE FROM complaint WHERE complaintID='$idURL'";
$result = mysqli_query($link, $sql) or die("Could not execute query in ubah.php");
if ($result) {
    echo "<script type = 'text/javascript'> window.location='StudentComplaintMainPage.php' </script>";
}
?>