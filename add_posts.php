<?php
// Retrieve post data from the form
$title = $_POST['postTitle'];
$category = $_POST['postCategory'];
$content = $_POST['postContent'];

// Get the current date
$currentDate = date('Y-m-d');

// Create a database connection
$conn = new mysqli('localhost', 'root', '', 'fkedu');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query to insert the post into the database, including the current date
$stmt = $conn->prepare("INSERT INTO posts (title, category, content, date_added) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $title, $category, $content, $currentDate);
$stmt->execute();

// Close the database connection
$stmt->close();
$conn->close();

// Redirect back to the discussion page
header("Location: discussion_board.php");
exit();
?>
