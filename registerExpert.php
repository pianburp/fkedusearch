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
            $dbname = "fkedu";

            // Create a new PDO instance
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // Set PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the required fields are present in the $_POST array
            if (isset($_POST['name'], $_POST['password'], $_POST['email'])) {
                $name = $_POST['name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
            }   

        try {
            // Connect to the database
            $conn = connectToDatabase();

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO expert (name_expert, pass_expert, email_expert, status_expert) values (:name_expert ,:pass_expert,:email_expert, 'Invalidate')");

            // Bind the parameters
            $stmt->bindParam(':name_expert', $name);
            $stmt->bindParam(':pass_expert', $password);
            $stmt->bindParam(':email_expert', $email);



            // Execute the query
            $stmt->execute();

            // Check if the user is found in the database
            if ($stmt->rowCount() > 0) {
                // Fetch the user data

                // Redirect to a new page or perform further actions
                $errorMessage = "Username/Password taken!";
                //add if statements for different type of users later...
                header('Location: index.php');
                exit();
            }
        } catch (PDOException $e) {
            // Handle database errors
            $errorMessage = "Database Error: " . $e->getMessage();
        }
    }

        // $sql = "INSERT INTO generalusers (name, username, userpassword) values (?,?,?)"
        ?>
        <a href="index.php">Go Back</a>
        <form action="registerExpert.php" method="post">
            <input type="text" name="name" placeholder="Full Name">
            <br>
            <input type="email" name="email" placeholder="emel">
            <br>
            <input type="password" name="password" placeholder="password">
            <br>
            
            <input type="submit" value="register" name="submit">

        </form>
    </div>
</body>

</html>