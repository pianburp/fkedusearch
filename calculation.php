<!DOCTYPE html>
<html>
<head>
    <title>Post Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            display: block;
            margin: 0 auto;
            max-width: 800px;
        }
    </style>
</head>
<body>
    <canvas id="postChart"></canvas>

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

    // Fetch the post counts by day, week, and month
    $queryDay = "SELECT DATE(date_added) AS post_date, COUNT(*) AS count FROM posts GROUP BY DATE(date_added)";
    $resultDay = $conn->query($queryDay);
    $postCountsDay = ($resultDay->num_rows > 0) ? $resultDay->fetch_all(MYSQLI_ASSOC) : array();

    $queryWeek = "SELECT YEAR(date_added) AS year, WEEK(date_added) AS week, COUNT(*) AS count FROM posts GROUP BY YEAR(date_added), WEEK(date_added)";
    $resultWeek = $conn->query($queryWeek);
    $postCountsWeek = ($resultWeek->num_rows > 0) ? $resultWeek->fetch_all(MYSQLI_ASSOC) : array();

    $queryMonth = "SELECT YEAR(date_added) AS year, MONTH(date_added) AS month, COUNT(*) AS count FROM posts GROUP BY YEAR(date_added), MONTH(date_added)";
    $resultMonth = $conn->query($queryMonth);
    $postCountsMonth = ($resultMonth->num_rows > 0) ? $resultMonth->fetch_all(MYSQLI_ASSOC) : array();

    // Close the database connection
    $conn->close();
    ?>

    <script>
        // Prepare the data for the chart
        var postCountsDay = <?php echo json_encode($postCountsDay); ?>;
        var postCountsWeek = <?php echo json_encode($postCountsWeek); ?>;
        var postCountsMonth = <?php echo json_encode($postCountsMonth); ?>;

        // Create the chart
        var ctx = document.getElementById('postChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: postCountsDay.map(function(post) { return post.post_date; }),
                datasets: [{
                    label: 'Posts by Day',
                    data: postCountsDay.map(function(post) { return post.count; }),
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderWidth: 1
                }, {
                    label: 'Posts by Week',
                    data: postCountsWeek.map(function(post) { return post.count; }),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderWidth: 1
                }, {
                    label: 'Posts by Month',
                    data: postCountsMonth.map(function(post) { return post.count; }),
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
</body>
</html>
