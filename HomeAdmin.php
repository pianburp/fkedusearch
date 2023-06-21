<?php
// Start the session
session_start();
$conn = mysqli_connect("localhost", "root", "", "fkedu") or die(mysqli_connect_error());
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
  <script nonce="58affb6c-6507-42b0-8b6c-2bf5644c6acd">
    (function(w, d) {
      ! function(Y, Z, _, ba) {
        Y[_] = Y[_] || {};
        Y[_].executed = [];
        Y.zaraz = {
          deferred: [],
          listeners: []
        };
        Y.zaraz.q = [];
        Y.zaraz._f = function(bb) {
          return function() {
            var bc = Array.prototype.slice.call(arguments);
            Y.zaraz.q.push({
              m: bb,
              a: bc
            })
          }
        };
        for (const bd of ["track", "set", "debug"]) Y.zaraz[bd] = Y.zaraz._f(bd);
        Y.zaraz.init = () => {
          var be = Z.getElementsByTagName(ba)[0],
            bf = Z.createElement(ba),
            bg = Z.getElementsByTagName("title")[0];
          bg && (Y[_].t = Z.getElementsByTagName("title")[0].text);
          Y[_].x = Math.random();
          Y[_].w = Y.screen.width;
          Y[_].h = Y.screen.height;
          Y[_].j = Y.innerHeight;
          Y[_].e = Y.innerWidth;
          Y[_].l = Y.location.href;
          Y[_].r = Z.referrer;
          Y[_].k = Y.screen.colorDepth;
          Y[_].n = Z.characterSet;
          Y[_].o = (new Date).getTimezoneOffset();
          if (Y.dataLayer)
            for (const bk of Object.entries(Object.entries(dataLayer).reduce(((bl, bm) => ({
                ...bl[1],
                ...bm[1]
              })), {}))) zaraz.set(bk[0], bk[1], {
              scope: "page"
            });
          Y[_].q = [];
          for (; Y.zaraz.q.length;) {
            const bn = Y.zaraz.q.shift();
            Y[_].q.push(bn)
          }
          bf.defer = !0;
          for (const bo of [localStorage, sessionStorage]) Object.keys(bo || {}).filter((bq => bq.startsWith("_zaraz_"))).forEach((bp => {
            try {
              Y[_]["z_" + bp.slice(7)] = JSON.parse(bo.getItem(bp))
            } catch {
              Y[_]["z_" + bp.slice(7)] = bo.getItem(bp)
            }
          }));
          bf.referrerPolicy = "origin";
          bf.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(Y[_])));
          be.parentNode.insertBefore(bf, be)
        };
        ["complete", "interactive"].includes(Z.readyState) ? zaraz.init() : Y.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, "zarazData", "script");
    })(window, document);
  </script>
</head>

<body>
<nav class="navbar navbar-default" style = "background-color: #fce8cb;">
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
<a href="logout.php"><i class="fa-solid fa-right-from-bracket mr-3"></i> Logout</a>
</li>
</ul>
</div>
</nav>
    <div style="height: 150px; width: 3%; "></div>
    <div id="content" class="p-4 p-md-5 pt-5">
      <h2 class="mb-4" style="font-weight: bold;">Home</h2>

      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Activity</h5>
              <p class="card-text">Total user in downtrend</p>
              <a href="UserActivity.php" class="btn btn-primary">User Activity</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Metrics</h5>
              <p class="card-text">Retention rate is on high level</p>
              <a href="Metrics.php" class="btn btn-primary">Metrics</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Report</h5>
              <p class="card-text"><?php $sql = "SELECT * from report";

                                    if ($result = mysqli_query($conn, $sql)) {

                                      // Return the number of rows in result set
                                      $rowcount = mysqli_num_rows($result);

                                      // Display result
                                      printf("Total reports is  %d\n", $rowcount);
                                    }
                                    ?> </p>
              <a href="Report.php" class="btn btn-primary">Report</a>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Users</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: ['June', 'July', 'August', 'September', 'October', 'November'],
                      datasets: [{
                        label: 'Line Chart',
                        data: [<?php $result = mysqli_query($conn, "SELECT total_user FROM useractivity ORDER BY id");
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                      printf ("%s,",$row["total_user"]);
                                    }
                                    ?>],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->

            </div>
          </div>
        </div>
      </div>

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