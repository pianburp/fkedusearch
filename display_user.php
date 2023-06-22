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

// Fetch the posts from the database
$sql = "SELECT * FROM userinfo ORDER BY userId DESC"; // Modify the table name if necessary
$result = $conn->query($sql);

// Generate the HTML content for posts
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userId = $row["userId"];
        $research_area = $row["areaOfResearch"];
        $academic_status = $row["academicStatus"];
        $social_media = $row["socialMediaAccount"];

        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<p class="card-text">Area Of Research: ' . $research_area . '</p>';
        echo '<p class="card-text">Academic Status: ' . $academic_status . '</p>';
        echo '<p class="card-text">Social Media Account: ' . $social_media . '</p>';
        echo '</div></div></div>';
    }
} else {
    echo "Nothing to see here.";
}

// Close the database connection
$conn->close();
?>