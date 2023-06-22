<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkedu";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the post ID is provided in the URL parameter
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Retrieve the post details from the database
    $sql = "SELECT * FROM posts WHERE id = $postId"; // Modify the table name if necessary
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $postTitle = $row["title"];
        $postCategory = $row["category"];
        $postContent = $row["content"];

        // Display a confirmation popup message
        echo '<script>';
        echo 'if(confirm("Are you sure you want to delete the post: ' . $postTitle . '")) {';
        echo '   window.location.href = "delete_post_confirm.php?id=' . $postId . '";';
        echo '} else {';
        echo '   window.location.href = "discussion.php";'; // Redirect back to discussion.php if cancel is clicked
        echo '}';
        echo '</script>';
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid post ID.";
}

// Close the database connection
$conn->close();
?>

