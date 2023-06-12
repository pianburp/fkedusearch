<?php
session_start();
$id=$_POST["id"];
$conn = new mysqli("localhost", "root", "", "fkedu");
$sql = "DELETE FROM `report` WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: Report.php");
} else {
  echo "Error updating record: " . $conn->error;
}
?>