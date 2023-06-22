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

// Function to get the total number of posts by day, week, and month
function getPostCounts($conn)
{
    $counts = array();

    // Get the count of posts by day
    $query = "SELECT DATE(date_added) AS post_date, COUNT(*) AS count FROM posts GROUP BY DATE(date_added)";
    $result = $conn->query($query);
    $counts['day'] = ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : array();

    // Get the count of posts by week
    $query = "SELECT YEAR(date_added) AS year, WEEK(date_added) AS week, COUNT(*) AS count FROM posts GROUP BY YEAR(date_added), WEEK(date_added)";
    $result = $conn->query($query);
    $counts['week'] = ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : array();

    // Get the count of posts by month
    $query = "SELECT YEAR(date_added) AS year, MONTH(date_added) AS month, COUNT(*) AS count FROM posts GROUP BY YEAR(date_added), MONTH(date_added)";
    $result = $conn->query($query);
    $counts['month'] = ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : array();

    return $counts;
}


// Fetch the posts from the database
$sql = "SELECT * FROM posts ORDER BY id DESC"; // Modify the table name if necessary
$result = $conn->query($sql);

// Generate the HTML content for posts
if ($result->num_rows > 0) {
    $postCounts = getPostCounts($conn);

    // Display the post counts
    echo '<h2>Trending Posts</h2>';
    echo '<br>';
    echo '<p>Total posts by day: ' . count($postCounts['day']) . '</p>';
    echo '<p>Total posts by week: ' . count($postCounts['week']) . '</p>';
    echo '<p>Total posts by month: ' . count($postCounts['month']) . '</p>';
    echo '<hr>';
    

    while ($row = $result->fetch_assoc()) {
        $postId = $row["id"];
        $postTitle = $row["title"];
        $postCategory = $row["category"];
        $postContent = $row["content"];
        $postDate = $row['date_added'];
        $likesCount = $row["likes"];

        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $postTitle . '</h5>';
        echo '<p class="card-text">Category: ' . $postCategory . '</p>';
        echo '<p class="card-text">' . $postContent . '</p>';
        echo '<p class="card-text likes-count-' . $postId . '">Likes: ' . $likesCount .  '  Status: Accepted</p>'; // Display the likes count
        echo '<p class="card-text"><small class="text-muted">Posted on ' . $postDate . '</small></p>';
        // Add an Edit button with the post ID as a parameter
        echo '<a href="edit_post.php?id=' . $postId . '" class="btn btn-primary" style="margin-right:5px;">Edit</a>';
        // Add a Delete button with the post ID as a parameter
        echo '<a href="delete_posts.php?id=' . $postId . '" class="btn btn-danger">Delete</a>';
        echo '<br><br>';
        echo '<div class="card-footer">';
        echo '<a href="#" class="card-link">10 Comments</a>';
        echo '<button type="button" class="btn btn-link">Like</button>';
        echo '</div></div></div>';
    }
} else {
    echo "Nothing to see here.";
}

// Close the database connection
$conn->close();
?>