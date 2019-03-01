<?php
?>

<!DOCTYPE html>
  <title>Praise The Coffee</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

  <style>
  body, html
  {
      height: 100%;
      font-family: "Inconsolata", sans-serif;
  }
  .bgimg
  {
      background-position: center;
      background-size: cover;
      background-image: url("mountain.jpg");
      min-height: 75%;
  }
  .menu
  {
      display: none;
  }
  </style>

    <!-- Links (sit on top) -->
    <div class="w3-top">
      <div class="w3-row w3-padding w3-black">
        <div class="w3-col s3">
          <a href="#profile" class="w3-button w3-block w3-black">PROFILE</a>
        </div>
        <div class="w3-col s3">
          <a href="#purchases" class="w3-button w3-block w3-black">PURCHASES</a>
        </div>
        <div class="w3-col s3">
          <a href="#images" class="w3-button w3-block w3-black">SHARED IMAGES</a>
        </div>
        <div class="w3-col s3">
          <a href="logout.php" class="w3-button w3-block w3-black">LOG OUT</a>
        </div>
      </div>
    </div>

    <!-- Header with image -->
    <header class="bgimg w3-display-container w3-grayscale-min" id="home">
      <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
        <span class="w3-tag">Open from 6am to 9pm</span>
      </div>
      <div class="w3-display-middle w3-center">
        <span class="w3-text-white" style="font-size:90px">Praise the Coffee</span>
      </div>
      <div class="w3-display-bottomright w3-center w3-padding-large">
        <span class="w3-text-white">1100 Jolly Cooperation Street</span>
      </div>
    </header>

  <body>
    <!-- Add a background color and large text to the whole page -->
    <div class="w3-sand w3-grayscale w3-large">
