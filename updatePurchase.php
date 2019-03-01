<?php
  require ("checkvalid.php");
  require ("coffeeClass.php");
  parse_str($_SERVER['QUERY_STRING']);
  $coffee = new coffee();
  $coffee->purchaseID=$purchaseID;

  $coffee->connect();
  $coffee->loadUpdate();
  $coffee->close();
?>

<!DOCTYPE html>
  <title>Praise The Coffee</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata"/>

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
         background-image: url("frenchpress.jpg");
         min-height: 75%;
       }
     .menu
       {
         display: none;
       }
  </style>

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
  </div>
  <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Update Purchase</span></h5>

  <div align="center">
  <form name="updateForm" action="update.php" method="post" onsubmit="return validateForm()">
   <table>
     <tr><th>Purchase ID:</th><td><input type="text" name="purchaseID" readonly value="<?php echo $purchaseID; ?>"></td></tr>
     <tr><th>User ID:</th><td><input type="text" name="userID" value="<?php echo$coffee->userID; ?>"></td></tr>
     <tr><th>Coffee ID:</th><td><input type="text" name="coffeeID" value="<?php echo$coffee->coffeeID; ?>"></td></tr>
     <tr><th>Bags Purchased:</th><td><input type="text" name="bagspurchased" value="<?php echo$coffee->bagspurchased; ?>"></td></tr>
     <tr><th>Date Purchased:</th><td><input type="date" name="datepurchased" value="<?php echo$coffee->datePurchased; ?>"></td></tr>
   </table>
     <input type="submit" value="Update Purchase"/>
  </form>
  </div>

  <script>
    function validateForm()
    {
      var x = document.forms["updateForm"]["bagspurchased"].value;
        if (x == "" || isNaN(x))
          {
          alert("Must enter a valid amount for bags pruchased.");
          return false;
          }
      var y = document.forms["updateForm"]["datepurchased"].value;
        if (y == "")
          {
            alert("Must enter a purchase date.");
            return false;
          }
    }
  </script>

  <!-- Footer -->
  <footer class="w3-center w3-light-grey w3-padding-48 w3-large">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  </footer>

  <script>
  // Tabbed Menu
  function openMenu(evt, menuName)
  {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++)
    {
      x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++)
    {
      tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
    }
      document.getElementById(menuName).style.display = "block";
      evt.currentTarget.firstElementChild.className += " w3-dark-grey";
  }
  document.getElementById("myLink").click();
  </script>

  </body>
</html>
