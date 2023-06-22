<?php
  // Connect to the database
  $mysqli = new mysqli('localhost', 'root', '', 'fkedu');

  // Check if the form was submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the form data
    $username = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password2'];
    $email = $_POST['email'];

    check_password_match($password, $confirm_password);
    validate_email($email);
    validate_password($password);

    // Check if the email already exists
    $sql = "SELECT * FROM user WHERE email_user = '$email'";
    $result = $mysqli->query($sql);

    // If the username already exists, show an error message
    if ($result->num_rows > 0) {
      echo 'The email already exists.';
    } else {

      // Insert the data into the database
      $sqlt = "INSERT INTO `expert`( `name_expert`, `pass_expert`, `email_expert`, `status_expert`) VALUES ('$username','$password','$email', 'Unvalidate')";
      $mysqli->query($sqlt);

      // Redirect the user to the login page
      header('Location: index.php');
    }
  }

  function check_password_match($password, $confirm_password) {

    // Check if the passwords are equal
    if ($password !== $confirm_password) {
      return false;
    }
  
    // The passwords are equal
    return true;
  }

  function validate_email($email) {

    // Check if the email address is in the correct format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return false;
    }
  
    // The email address is valid
    return true;
  }

  function validate_password($password) {

    // Check if the password is at least 8 characters long
    if (strlen($password) < 8) {
      return false;
    }
  
    // Check if the password contains at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
      return false;
    }
  
    // Check if the password contains at least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
      return false;
    }
  
    // Check if the password contains at least one number
    if (!preg_match('/[0-9]/', $password)) {
      return false;
    }
  
    // Check if the password contains at least one special character
    if (!preg_match('/[!@#$%^&*()_+]/', $password)) {
      return false;
    }
  
    // The password is valid
    return true;
  }
?>
