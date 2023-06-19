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
<script nonce="58affb6c-6507-42b0-8b6c-2bf5644c6acd">(function(w,d){!function(Y,Z,_,ba){Y[_]=Y[_]||{};Y[_].executed=[];Y.zaraz={deferred:[],listeners:[]};Y.zaraz.q=[];Y.zaraz._f=function(bb){return function(){var bc=Array.prototype.slice.call(arguments);Y.zaraz.q.push({m:bb,a:bc})}};for(const bd of["track","set","debug"])Y.zaraz[bd]=Y.zaraz._f(bd);Y.zaraz.init=()=>{var be=Z.getElementsByTagName(ba)[0],bf=Z.createElement(ba),bg=Z.getElementsByTagName("title")[0];bg&&(Y[_].t=Z.getElementsByTagName("title")[0].text);Y[_].x=Math.random();Y[_].w=Y.screen.width;Y[_].h=Y.screen.height;Y[_].j=Y.innerHeight;Y[_].e=Y.innerWidth;Y[_].l=Y.location.href;Y[_].r=Z.referrer;Y[_].k=Y.screen.colorDepth;Y[_].n=Z.characterSet;Y[_].o=(new Date).getTimezoneOffset();if(Y.dataLayer)for(const bk of Object.entries(Object.entries(dataLayer).reduce(((bl,bm)=>({...bl[1],...bm[1]})),{})))zaraz.set(bk[0],bk[1],{scope:"page"});Y[_].q=[];for(;Y.zaraz.q.length;){const bn=Y.zaraz.q.shift();Y[_].q.push(bn)}bf.defer=!0;for(const bo of[localStorage,sessionStorage])Object.keys(bo||{}).filter((bq=>bq.startsWith("_zaraz_"))).forEach((bp=>{try{Y[_]["z_"+bp.slice(7)]=JSON.parse(bo.getItem(bp))}catch{Y[_]["z_"+bp.slice(7)]=bo.getItem(bp)}}));bf.referrerPolicy="origin";bf.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(Y[_])));be.parentNode.insertBefore(bf,be)};["complete","interactive"].includes(Z.readyState)?zaraz.init():Y.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
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

$idURL = $_GET['id'];

// SQL query
$query = "SELECT * FROM complaint WHERE complaintID = '$idURL'";

// Execute the query
$result = mysqli_query($link, $query) or die(mysqli_error($link));

// Check if any rows are returned
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $Ctype = $row["complaint_type"];
    
    $Udesc = $row["complaint_desc"];
} else {
    die("No rows found for the specified ID.");
}

mysqli_free_result($result);
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="StudentUpdateComplaintPage2.php">
    Type:
    <select name="Kat[]" multiple>
  <option value="Inappropriate">Inappropriate</option>
  <option value="Irrelevant content">Irrelevant content</option>
  <option value="Missing Information">Missing Information</option>
  <option value="Misleading Title">Misleading Title</option>
  </select><br>
    <br>
    
    Description: <input type="text" name="content" value="<?php echo $Udesc; ?>">
    <br>
    <input type="hidden" name="id2" value="<?php echo $idURL; ?>">
    <input type="submit" value="Ubah">
    <input type="reset" value="Batal" Onclick='window.location = "StudentComplaintMainPage.php"'>
    <br>
</form>
<hr>
</div>
</body>
</html>
