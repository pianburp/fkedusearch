<?php
session_start();
$id=$_POST["id"];
$status=$_POST["status"];
$conn = new mysqli("localhost", "root", "", "fkedu");
$sql = "UPDATE `report` SET `stats_report`='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: Report.php");
} else {
  echo "Error updating record: " . $conn->error;
}
