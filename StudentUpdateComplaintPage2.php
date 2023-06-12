<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "we_project") or die(mysqli_error($link));

    $Ctype = $_POST["Kat"];
    $typearr= implode(',' ,$Ctype);
    $Cdate = $_POST["tarikh"];
    $Udesc = $_POST["content"];
	$pid2 = $_POST["id2"];

$query = "UPDATE complaint SET complaint_type = '$typearr', complaint_date = '(NOW())', complaint_desc = '$Udesc' WHERE complaintID = '$pid2'";

$result = mysqli_query($link,$query) or die ("Could not execute query in ubah.php");
if($result){
 echo "<script type = 'text/javascript'> window.location='StudentComplaintMainPage.php' </script>";
}
?>