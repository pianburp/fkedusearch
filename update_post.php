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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted form values
    $postId = $_POST["postId"];
    $editPostTitle = $_POST["editPostTitle"];
    $editPostCategory = $_POST["editPostCategory"];
    $editPostContent = $_POST["editPostContent"];

    // Update the post in the database
    $sql = "UPDATE posts SET title = '$editPostTitle', category = '$editPostCategory', content = '$editPostContent' WHERE id = $postId";
    $result = $conn->query($sql);

    // Check if the update was successful
    if ($result) {
        // Redirect the user back to the discussion page
        header("Location: discussion_board.php");
        exit();
    } else {
        echo "Error updating post: " . $conn->error;
    }
}

?>