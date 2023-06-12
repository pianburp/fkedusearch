<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fkedu") or die(mysqli_connect_error());

if (isset($_POST["submit"])) {
	$uname = $_POST['ExpertName'];
	$role = $_POST['user_role'];
	$pass = $_POST['ExpertPassword'];

	if (empty($uname)) {
	} else if (empty($role)) {
		// Handle empty role
	} else if (empty($pass)) {
		// Handle empty password
	} else {

		if ($role == "educator") {
			$_SESSION['educator'] = $uname;
			header("Location: ./educator/index.php");
			exit(); // Terminate the script after redirecting
		} else if ($role == "expert") {
			$_SESSION['expert'] = $uname;
			header("Location: ./expert/index.php");
			exit();
		} else if ($role == "student") {
			$_SESSION['student'] = $uname;
			header("Location: ./student/index.php");
			exit();
		} else if ($role == "admin") {
			$sql1 = "SELECT * FROM admin WHERE name_admin = '$uname'  AND pass_admin = '$pass'";
			$res1 = mysqli_query($conn, $sql1);
			$_SESSION['admin'] = $uname;
			header("Location: Home.php");
			exit();
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="icon" href="images/logo.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<style>
		body {
			background: url(images/umpbg.jpg) no-repeat center center fixed;
			background-size: cover;

		}

		img {
			width: 10%;
		}

		.logo {
			width: 180px;
			height: 150px;
			margin: 0 auto;
			margin-bottom: 10px;
		}

		.logo img {
			width: 100%;
		}
	</style>

</head>

<body>

	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
		<form class="border shadow p-3 rounded" action="" method="post" style="width: 450px;">
			<div class="logo">
				<img src="images\01-Logo UMP_Full Color.png">
			</div>
			<h1 class="text-center p-3">FK-Edu Search</h1>
			<?php if (isset($_GET['error']) && $_GET['error'] === "InvalidCredentials") { ?>
				<div class="alert alert-danger" role="alert">Invalid credentials. Please try again.
				</div>
			<?php } ?>
			<div class="mb-3">
				<label for="username" class="form-label">Username</label>
				<input type="text" class="form-control" name="ExpertName" required>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" name="ExpertPassword" class="form-control" id="password" required>
			</div>
			<div class="mb-1">
				<label class="form-label">Select User Type:</label>
			</div>
			<select class="form-select mb-3" name="user_role" aria-label="Default select example">
				<option disabled selected value> -- select an option -- </option>
				<option value="admin">Admin</option>
				<option value="student">Student</option>
				<option value="expert">Expert</option>
				<option value="educator">Educator</option>
			</select>
			<button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
		</form>
	</div>
	<div style="position: absolute; bottom: 0px;">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  User Satisfaction
</button>
	</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Satisfaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Horizontal Form -->
		<form>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText">
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Rating</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        1 star
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">
                      <label class="form-check-label" for="gridRadios2">
                        2 star
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="3">
                      <label class="form-check-label" for="gridRadios3">
                        3 star
                      </label>
                    </div>
					<div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="3">
                      <label class="form-check-label" for="gridRadios3">
                        4 star
                      </label>
                    </div>
					<div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="3">
                      <label class="form-check-label" for="gridRadios3">
                        5 star
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>