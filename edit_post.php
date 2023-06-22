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

// Check if the post ID is provided in the query parameter
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Fetch the post from the database based on the provided ID
    $sql = "SELECT * FROM posts WHERE id = $postId"; // Modify the table name and ID column name if necessary
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $postId = $row["id"];
        $postTitle = $row["title"];
        $postCategory = $row["category"];
        $postContent = $row["content"];

        // Display the edit form with pre-filled values
        echo '
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>FK-EduSearch</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
                <link rel="stylesheet" href="styles.css">

                <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Navbar */
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .nav-bar {
            background-color: #fce8cb;
            color: #ffb;
            padding: 10px;
        }
        
        .nav-bar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .nav-bar ul li {
            display: inline-block;
            margin-right: 10px;
        }
        
        .nav-bar ul li a {
            color: #0958a3;
            text-decoration: none;
            padding: 5px 10px;
        }
        
        .nav-bar ul li:hover ul {
            display: block;
        }
        
        .nav-bar ul li ul {
            display: none;
            position: absolute;
            background-color: #555;
            padding: 0;
            margin: 0;
            list-style: none;
        }
        
        .nav-bar ul li ul li {
            display: block;
            margin: 0;
        }
        
        .nav-bar ul li ul li a {
            color: #0958a3;
            padding: 5px 10px;
        }
        
        .nav-bar ul li ul li:hover {
            background-color: #666;
        }
        /* Navbar ends*/
        .content {
            margin-top: 20px;
        }
        
        .content h2 {
            margin-bottom: 10px;
        }
        
        /* Rest of the CSS styles... */
    </style>
            </head>
            <body>

            <!-- Nav bar starts -->
            <div class="nav-bar">
            <ul>
                <li>
                    <a href="user_profile.php">User Profile</a>
                </li>
                <li>
                    <a href="discussion_board.php">Discussion Board</a>
                </li>
                <li>
                    <a href="reportgraph.php">Report</a>
                </li>
                <li style="margin-left:1170px;">
                <img src="umplogo.png"  width="150" height="75">
             </li>
            </ul>
            
        </div>
        <!-- Nav bar ends -->


                <section class="container mt-4">
                <div class="mt-4" id="postContainer">
                    <h4>Posts</h4>
                    <form action="update_post.php" method="POST">
                        <input type="hidden" name="postId" value="' . $postId . '">
                        <div class="form-group">
                            <label for="editPostTitle">Title</label>
                            <input type="text" name="editPostTitle" class="form-control" id="editPostTitle" value="' . $postTitle . '" required>
                        </div>
                        <div class="form-group">
                            <label for="editPostCategory">Category</label>
                            <select class="form-control" name="editPostCategory" id="editPostCategory" required>
                                <option value="">Select category</option>
                                <option value="research" ' . ($postCategory == 'research' ? 'selected' : '') . '>Research</option>
                                <option value="course" ' . ($postCategory == 'course' ? 'selected' : '') . '>Course</option>
                                <option value="other" ' . ($postCategory == 'other' ? 'selected' : '') . '>Other</option>
                                <!-- Add more category options as needed -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editPostContent">Content</label>
                            <textarea class="form-control" name="editPostContent" id="editPostContent" rows="5" required>' . $postContent . '</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                </section>
        ';
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
