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

    // Delete the post from the database
    $sql = "DELETE FROM posts WHERE id = $postId"; // Modify the table name if necessary
    if ($conn->query($sql) === TRUE) {
        echo "Post deleted successfully.";
        echo '<script>';
        echo 'setTimeout(function() { window.location.href = "discussion_board.php"; }, 2000);'; // Redirect after 2 seconds
        echo '</script>';
    } else {
        echo "Error deleting post: " . $conn->error;
        echo '<a href="discussion.php">Go back to Discussion</a>';
    }
} else {
    echo "Invalid post ID.";
    echo '<a href="discussion.php">Go back to Discussion</a>';
}

// Close the database connection
$conn->close();
?>
