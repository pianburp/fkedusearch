<?php
  // Get the current user's session ID.
  $session_id = session_id();

  // Destroy the user's session.
  session_destroy();

  // Redirect the user to the login page.
  header("Location: index.php");


?>