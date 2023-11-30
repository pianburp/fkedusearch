<?php
// Start the session
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="robots" content="noindex, follow">
    
</head>

<body>
    <nav class="navbar navbar-default" style="background-color: #fce8cb;">
        <img src="images\01-Logo UMP_Full Color.png" alt="UMPLogo" width="75" height="75">
        <a style="font-weight: bold; font-size: 30px;">FK-Edu Search</a>
        <div style="margin-right: 100px;" class="dropdown">
            <span><i class="fa-solid fa-user"></i></span>
            <div class="dropdown-content">
                <a href="#">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <h1><a href="index.html" class="logo">Menu Bar</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="#"><i class="fa-solid fa-house mr-3"></i> Home</a>
                    </li>
                    <li>
                        <a href="UserActivity.php"><i class="fa-solid fa-user mr-3"></i> User Activity</a>
                    </li>
                    <li>
                        <a href="Metrics.php"><i class="fa-solid fa-chart-simple mr-3"></i>Metrics</a>
                    </li>
                    <li>
                        <a href="Report.php"><i class="fa-solid fa-file mr-3"></i> Report</a>
                    </li>
                    <li>
                        <a href="ComplaintMainPage.php"><i class="fa-solid fa-file mr-3"></i> Complaint</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa-solid fa-right-from-bracket mr-3"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4" style="font-weight: bold;">Home</h2>
            <?php
            // Connect to the database server.
            $link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

            // Select the database.
            mysqli_select_db($link, "fkedu") or die(mysqli_error($link));

            // Check if the user is logged in and retrieve the user ID.
            // Replace this with your authentication code to get the logged-in user's ID.
            $loggedInUserID = 'CB21130'; // Replace with the actual code to get the user ID.

            // Check if the status is selected in the URL query string.
            if (isset($_GET['status'])) {
                $selectedStatus = $_GET['status'];
            } else {
                // Default status option.
                $selectedStatus = "inProgress"; // Change to your desired default status.
            }

            // SQL query with user ID and status condition.
            $query = "SELECT * FROM complaint WHERE userID = '$loggedInUserID' AND complaint_status = '$selectedStatus'"
                or die(mysqli_connect_error());

            // Execute the query (the recordset $rs contains the result).
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row.
                echo "<table class='table table-hover'>";
                echo "<tr><th >Complaint ID</th><th>Post ID</th><th>User ID</th><th>Complaint type</th><th>Complaint Date</th><th>Complaint Description</th><th>Actions</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $cID = $row["complaintID"];
                    $pID = $row["postID"];
                    $uID = $row["userID"];
                    $Cdate = $row["complaint_date"];
                    $Ctype = $row["complaint_type"];
                    $Udesc = $row["complaint_desc"];

                    echo "<tr>";
                    echo "<td>" . $cID . "</td>";
                    echo "<td>" . $pID . "</td>";
                    echo "<td>" . $uID . "</td>";
                    echo "<td>" . $Ctype . "</td>";
                    echo "<td>" . $Cdate . "</td>";
                    echo "<td>" . $Udesc . "</td>";
                    echo "<td>";
                    echo "<a href='StudentUpdateComplaintPage1.php?id=" . $cID . "'>Ubah</a> ||";
                    echo "<a href='StudentDeleteComplaint.php?id=" . $cID . "'>Padam</a> ||";
                    echo "<a href='StudentViewComplaintDetails.php?id=" . $cID . "'>Lihat</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No results found for the selected status.";
            }

            ?>
            <br><br><br>
            <div align="center">
                <form method="GET" action="StudentComplaintMainPage.php">
                    <label for="status">Select Status:</label>
                    <select name="status" id="status">
                        <option value="inProgress" <?php if ($selectedStatus === 'inProgress') echo 'selected'; ?>>In Progress</option>
                        <option value="Approved" <?php if ($selectedStatus === 'Approved') echo 'selected'; ?>>Approved</option>
                        <option value="Denied" <?php if ($selectedStatus === 'Denied') echo 'selected'; ?>>Denied</option>
                    </select>
                    <input type="submit" value="View">
                </form>
            </div>
            <a href="StudentViewComplaintForm.php">Add Complaint</a> ||
            <a href='ComplaintMainPage.php'>Kembali</a>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/a5df615c65.js" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7d1650606b4f11bc","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}' crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
</body>

</html>