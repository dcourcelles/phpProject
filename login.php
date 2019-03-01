<?php
  require ("usernameClass.php");

  if (isset($_REQUEST['login']))
  {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    $rememberme = $_POST['remember'];

    if ($rememberme=='on')
    {
      setcookie('username', $inputUsername, time() + (86400 * 1), "/");
    }

    $login = new login($inputUsername, $inputPassword);
    $login->login();

    //Add in message if bad
  }
  else
  {

  }
?>

<!DOCTYPE html>
<html>
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

  <body>
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

    <!-- Add a background color and large text to the whole page -->
    <div class="w3-sand w3-grayscale w3-large">

      <?php
        if (isset($SESSION['valid_user']))
        {
          echo '<p>You are logged in as: '.$_SESSION['valid_user'].'<br />';
          echo '<a href="logout.php">Log Out</a></p>';
        }
        else
        {
          if (isset($username))
          {
            //if they've tried and failed to log in
            echo '<p>Could not log you in.</p>';
          }
          else
          {
            //they have not tired to log in yet or have logged fileout
            echo '<p>You are not logged in.</p>';
          }
          //provide form to log in
          echo '<form action="" method="post">';
          echo '<fieldset>';
          echo '<legend>Login To Praise The Coffee</legend>';
          echo '<p><label for="username">Username:</label>';
          echo '<input type="text" name="username" id="username" size="30" value="'.$_COOKIE['username'].'"/></p>';
          echo '<p><label for="password">Password:</label>';
          echo '<input type="password" name="password" id="password" size="30"/></p>';
          echo '</fieldset>';
          echo '<button type="submit" name="login">Login</button><br />';
          echo '<input type="checkbox" id="remember" name="remember"/>';
          echo '<label for="checkbox">Remember Me</label>';
          echo '</form>';
        }


      ?>
    </div>

  <!-- Footer -->
  <footer class="w3-center w3-light-grey w3-padding-48 w3-large">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  </footer>

  <script>
  // Tabbed Menu
  function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
       tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-dark-grey";
  }
  document.getElementById("myLink").click();
  </script>

  </body>
</html>
