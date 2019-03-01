<?php
  session_start();

  if (isset($_SESSION['valid_user']))
  {

  }
  else
  {
    header("Location: login.php");
  }
?>
