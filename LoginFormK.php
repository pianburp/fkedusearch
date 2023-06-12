<?php
// Start the session
session_start();

// Function to establish a database connection
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newdb";

    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the entered username and password
    $username = $_POST['username'];
    $password = $_POST['userpassword'];
}
    try {
        // Connect to the database
        $conn = connectToDatabase();

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT id, name FROM generalusers WHERE username = :username AND userpassword = :userpassword");

        // Bind the parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':userpassword', $password);

        // Execute the query
        $stmt->execute();

        // Check if the user is found in the database
        if ($stmt->rowCount() > 0) {
            // Fetch the user data
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Store the user ID and name in session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];

            // Redirect to a new page or perform further actions
            
            //add if statements for different type of users later...
            //if general user go here
            header('Location: welcomUser.php');
            //if expert/admin
            exit();
        } else {
            // Invalid username and password
            $errorMessage = "Invalid username and password";
        }
    } catch (PDOException $e) {
        // Handle database errors
        $errorMessage = "Database Error: " . $e->getMessage();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <script src="selection.js"></script>
</head>
<body>
<h1>Welcome to FK-EduSearch</h1>
        <div>
        <select name="users" id="users" onchange="changePage();">
            <option value="generalusers">General Users</option>
            <option value="experts">Experts</option>
            <option value="admin">Administrator</option>
        </select>
        </div>
    <?php if (isset($errorMessage)) { ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php } ?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="userpassword" required><br><br>

        <input type="submit" value="Submit">
        <a href="register.php">Register here</a>
    </form>
</body>
</html>
