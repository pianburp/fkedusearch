<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fkedu") or die(mysqli_connect_error());

if (isset($_POST["submit"])) {
	$uname = $_POST['ExpertName'];
	$role = $_POST['user_role'];
	$pass = $_POST['ExpertPassword'];

	if (empty($uname)) {
		// Handle empty username
	} else if (empty($role)) {
		// Handle empty role
	} else if (empty($pass)) {
		// Handle empty password
	} else {

		$sql1 = "SELECT * FROM admin WHERE name_admin = '$uname'  AND pass_admin = '$pass'";
		$res1 = mysqli_query($conn, $sql1);

		if (mysqli_num_rows($res1) == 1) {

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
				$_SESSION['admin'] = $uname;
				header("Location: Home.php");
				exit();
			}
		} else {
			// Handle invalid credentials
			header("Location: index.php?error=InvalidCredentials");
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

			<h1 class="text-center p-3">LOGIN</h1>
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
</body>

</html>