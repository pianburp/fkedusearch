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
    $research_area = $_POST["research_area"];
    $academic_status = $_POST["academic_status"];
    $social_media = $_POST["social_media"];

    // Update the post in the database
    $sql = "UPDATE userinfo SET areaOfResearch = '$research_area', academicStatus = '$academic_status', socialMediaAccount = '$social_media' WHERE userId = 1";
    $result = $conn->query($sql);

    // Check if the update was successful
    if ($result) {
        // Redirect the user back to the discussion page
        header("Location: user_profile.php");
        exit();
    } else {
        echo "Error updating post: " . $conn->error;
    }
}

?>