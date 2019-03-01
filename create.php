<?php

  $userID = $_POST['userID'];
  $coffeeID = $_POST['coffeeID'];
  $amountPurchased = $_POST['bagspurchased'];
  $datePurchased = $_POST['datepurchased'];

  require ("coffeeClass.php");
  $coffee = new coffee();

  $coffee->connect();
  $coffee->userID = $userID;
  $coffee->coffeeID = $coffeeID;
  $coffee->amountPurchased = $amountPurchased;
  $coffee->datePurchased = $datePurchased;
  $coffee->create();
  $coffee->close();

  header("location:home.php#purchasesMade");

 ?>
