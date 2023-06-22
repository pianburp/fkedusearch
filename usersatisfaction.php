<?php
// Create a connection to the MySQL database
$mysqli = new mysqli("localhost", "root", "", "fkedu");

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve the form data from the POST request
$name = $_POST["name"];
$radio = $_POST["gridRadios"];

// Insert the data into the database
$sql = "INSERT INTO `usersatisfy`( `name`, `rating`) VALUES ('$name','$radio')";
$mysqli->query($sql);

// Redirect the user to a confirmation page
header("Location: index.php");