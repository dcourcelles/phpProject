<?php
  require ("coffeeClass.php");
  parse_str($_SERVER['QUERY_STRING']);

  $coffee = new coffee();
  $coffee->purchaseID=$purchaseID;

  $coffee->connect();
  $coffee->deletePurchase();
  $coffee->close();

  header("location:home.php#purchasesMade");
 ?>
