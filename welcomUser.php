<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login form
    header('Location: LoginFormK.php');
    exit();
}

// Get the session name
$sessionName = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome User</title>
</head>
<body>
    <h1>Welcome, <?php echo $sessionName; ?>!</h1>
    




    <p><a href="logout.php">Logout</a></p>
</body>
</html>