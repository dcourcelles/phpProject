<?php
  require ("checkvalid.php");
  require ("header.php");
  require ("coffeeClass.php");

  $coffee = new coffee();
?>

  <div class="w3-container" id="profile">
    <div class="w3-content" style="max-width:700px">
      <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Profile</span></h5>
        <?php
          session_start();
            echo '<p>Username</p><input type="text" name="username" readonly value="'.
            $_SESSION['valid_user'] . '"/>';
        ?>
        <br />
        <?php
          session_start();
            echo '<img src="./images/'.$_SESSION['pathIm'].'" style="width:100%;max-width:500px;margin-top:32px;/>';
        ?>
        <br />

        <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Upload Your Profile Image</span></h5>
          <p></p>
        <form action="uploadprofilepic.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value='10000000' />
            <label for="profile_pic">Upload your profile pic:</label>
            <input type="file" name="profile_pic" id="profile_pic"/>
            <input type="submit" value="Upload File"/>
        </form>
    </div>
  </div>

  <!-- About Container -->
  <div class="w3-container" id="about">
    <div class="w3-content" style="max-width:700px">
      <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">About the Cafe</span></h5>
      <p>Welcome to Praise the Coffee. You can purchase coffee using our purchase page. We offer a great variety of coffee blends. Including a blend roasted right here in house called 'Praise the Coffee' named after the store. Feel free to browse the site and learn more about our company.</p>
      <p>In addition to our coffee beans, we sell fresh brewed coffee and pastries to start your day on the right foot. Our shop also makes a great place to get together in the evening and experience our delicious decaf coffee with a pastry.</p>
    <div class="w3-panel w3-leftbar w3-light-grey">
        <p><i>"Coffee is a key part of people's day and I want to bring a fresh experience to people's lives." Fresh is the new sweet.</i></p>
        <p>Coffee Enthusiast and Owner: Dan Courcelles</p>
    </div>
      <img src="./images/coffeebook.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
      <p><strong>Opening hours:</strong> everyday from 6am to 9pm.</p>
      <p><strong>Address:</strong>1100 Jolly Cooperation Street, Lothric</p>
      <p><strong>PLEASE NOTE THIS IS A FICTIONAL COFFEE SHOP BUILT AS A PORTFOLIO PROJECT FOR SOFTWARE DEVELOPMENT</p>
    </div>
  </div>

  <!-- Menu Container -->
  <div class="w3-container" id="order">
    <div class="w3-content" style="max-width:700px">
      <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Order in Store</span></h5>
      <div class="w3-row w3-center w3-card w3-padding">
        <a href="javascript:void(0)" onclick="openMenu(event, 'Drinks');" id="myLink">
          <div class="w3-col s6 tablink">Drink</div>
        </a>
        <a href="javascript:void(0)" onclick="openMenu(event, 'Eat');">
          <div class="w3-col s6 tablink">Eat</div>
        </a>
      </div>

      <div id="Drinks" class="w3-container menu w3-padding-48 w3-card">
        <h5>Praise The Coffee</h5>
        <p class="w3-text-grey">Medium Blend Roasted In House 2.25</p><br>

        <h5>Dark Beans Blend</h5>
        <p class="w3-text-grey">Dark Roast With Hints Of Chocolate 2.50</p><br>

        <h5>Prepare To Wake Up Blend</h5>
        <p class="w3-text-grey">Prepare To Wake Up With This Highly Caffeinated Blonde 2.50</p><br>

        <h5>Hunt Your Coffee</h5>
        <p class="w3-text-grey">Premium Lovecraft Inspired Dark Roast Full Of Madness 3.00</p><br>

        <h5>Super Organic Delicious Blend</h5>
        <p class="w3-text-grey">Organic, Locally Roasted Blend With Nutty and Fruity Notes 3.00</p>
      </div>

      <div id="Eat" class="w3-container menu w3-padding-48 w3-card">
        <h5>Lothric Muffin</h5>
        <p class="w3-text-grey">Freshly baked muffin 1.50</p><br>

        <h5>Granola with Fruits</h5>
        <p class="w3-text-grey">Natural cereal of honey toasted oats, raisins and almonds 5.00</p><br>

        <h5>Pumpkin Scone</h5>
        <p class="w3-text-grey">Freshly baked pumpkin pastry 1.75</p><br>

        <h5>Cookie Of A Proud Knight</h5>
        <p class="w3-text-grey">Cookie baked in house using a secret recipe from a proud knight 1.50</p><br>

        <h5>Jolly Blueberry Bar</h5>
        <p class="w3-text-grey">Fresh picked blueberries baked with delicious oats 1.75</p>
      </div>

      <img src="images/kaylyncoffeecup.jpg" style="width:100%;max-width:1000px;margin-top:32px;">
    </div>
  </div>

  <!-- Purchases Container -->
  <div class="w3-container" id="purchases" style="padding-bottom:32px;">
    <div class="w3-content" style="max-width:700px" >
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Make Purchase</span></h5>

    <form name="createForm" action="create.php" method="post" onsubmit="return validateForm()">
      <table>
        <tr><th>Username:</th><td>
          <select name="userID">
            <?php
            $coffee->connect();
            $coffee->loadDropDownUser();
            $coffee->connect();
            ?>
          </select>
        </td></tr>
        <tr><th>Coffee Name:</th><td>
          <select name="coffeeID">
            <?php
            $coffee->connect();
            $coffee->loadDropDownCoffee();
            $coffee->connect();
            ?>
          </select>
        </td></tr>
        <tr><th>Bags Purchased:</th><td><input type="text" name="bagspurchased" ></td></tr>
        <tr><th>Date Purchased:</th><td><input type="date" name="datepurchased" ></td></tr>
      </table>
        <input type="submit" value="Create Purchase"/>
       </form>
    </div>
    <div class="w3-container" id="purchasesMade" style="padding-bottom:32px;">
      <div class="w3-content" style="max-width:700px" >
        <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Purchase Made</span></h5>

        <!-- Purchases Coffee -->
        <?php
        $coffee->connect();
        $coffee->readPurchases();
        $coffee->connect();
        ?>
      </div>
    </div>
  </div>

  <div class="w3-container" id="images" style="padding-bottom:32px;">
    <div class="w3-content" style="max-width:700px" >

    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Share Your Coffee Images</span></h5>
      <p>Share your coffee photos with us! Show us your cup of coffee from Praise The Coffee!</p>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value='10000000' />
        <label for="the_file">Upload your coffee image:</label>
        <input type="file" name="the_file" id="the_file"/>
        <input type="submit" value="Upload File"/>
    </form>

    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Shared Images</span></h5>
    <div class= class="slideshow-container">
      <?php
        $dir = './images';
        $files = array_diff(scandir($dir), array('..','.'));
        foreach ($files as $file)
        {
          echo '<img src="'.'./images/'.$file.'" style="width:100%;max-width:1000px;margin-top:32px;">';
        }
      ?>
    </div>

    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Shared Images Slideshow</span></h5>
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="images/coffeefrenchpress.jpg" style="width:100%">
          <div class="text">Picture One</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="images/kaylyncoffeecup.jpg" style="width:100%">
          <div class="text">Picture Two</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="images/coffeebook.jpg" style="width:100%">
          <div class="text">Picture Three</div>
        </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
  </div>

  <!-- End page content -->
  </div>

  <script>
    function validateForm()
    {
      var x = document.forms["createForm"]["bagspurchased"].value;
        if (x == "" || isNaN(x))
          {
          alert("Must enter amount for bags pruchased.");
          return false;
          }
      var y = document.forms["createForm"]["datepurchased"].value;
        if (y == "")
          {
            alert("Must enter a purchase date.");
            return false;
          }
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
    }
  </script>

  <?php
  require ("footer.php");
  ?>
