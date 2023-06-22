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

      // SQL query to fetch the number of complaints for each post ID.
      $query = "SELECT postID, COUNT(*) AS complaintCount FROM complaint WHERE complaint_status = 'Approved' GROUP BY postID";
      $result = mysqli_query($link, $query);

      // Check if there are any results.
      if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-hover'>
            <tr>
                <th>Post ID</th>
                <th>Complaint Count</th>
            </tr>";

        // Fetch and display the data for each post ID.
        while ($row = mysqli_fetch_assoc($result)) {
          $postID = $row['postID'];
          $complaintCount = $row['complaintCount'];

          echo "<tr>
                <td>$postID</td>
                <td>$complaintCount</td>
                <td><a href='ExpertViewComplaintList.php?postID=" . $postID . "'>View Complaint Details</a></td>
              </tr>";
        }

        echo "</table>";
      } else {
        echo "No results found for the specified post IDs and status.";
      }

      // Close the database connection.
      mysqli_close($link);
      ?>
<form method="get" action="ExpertSearchComplaint.php">
    <input type="text" name="postID" placeholder="Enter Post ID">
    <button type="submit">Search</button>
</form>
      <a href='ExpertViewComplaintReport.php?id=".$cID."'>Kembali</a>
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