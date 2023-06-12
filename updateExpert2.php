<?php
session_start();
$id=$_POST["id"];
$status=$_POST["status"];
$conn = new mysqli("localhost", "root", "", "fkedu");
$sql = "UPDATE `expert` SET `status_expert`='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: ExpertValidation.php");
} else {
  echo "Error updating record: " . $conn->error;
}
