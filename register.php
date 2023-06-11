<!DOCTYPE html>
<html>

<head>
    <title>registration form</title>
</head>

<body>
    <div class="container">
        <?php
        function connectToDatabase()
        {
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the required fields are present in the $_POST array
            if (isset($_POST['name'], $_POST['username'], $_POST['password'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
            }   

        try {
            // Connect to the database
            $conn = connectToDatabase();

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO generalusers (name, username, userpassword) values (:name ,:username,:password)");

            // Bind the parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);



            // Execute the query
            $stmt->execute();

            // Check if the user is found in the database
            if ($stmt->rowCount() > 0) {
                // Fetch the user data

                // Redirect to a new page or perform further actions
                $errorMessage = "Username/Password taken!";
                //add if statements for different type of users later...
                header('Location: LoginFormK.php');
                exit();
            }
        } catch (PDOException $e) {
            // Handle database errors
            $errorMessage = "Database Error: " . $e->getMessage();
        }
    }

        // $sql = "INSERT INTO generalusers (name, username, userpassword) values (?,?,?)"
        ?>
        <a href="LoginFormK.php">Go Back</a>
        <form action="register.php" method="post">
            <input type="text" name="name" placeholder="Full Name">
            <br>
            <input type="text" name="username" placeholder="username">
            <br>
            <input type="password" name="password" placeholder="pass">
            <br>
            <input type="submit" value="register" name="submit">

        </form>
    </div>
</body>

</html>