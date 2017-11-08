<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Cleaning Scents Company Home</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="css/styles.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <nav class="cyan accent-4">
    <div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo">Cleaning Scents</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="catalog.php">SHOP</a></li>
        <li><a href="admin.php">ADMIN</a></li>
        <li><a href="client.php">PROFILE</a></li>
        <li><a href="cart.php">YOUR CART</a></li>
        <li><a href="#"><i class="material-icons">search</i></a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

    <div class="slider">
    <ul class="slides">
      <li>
        <img src="img/micro-fiber-cloth-2716116_960_720.jpg" class="slideimg" alt="towels"> <!-- random image -->
        <div class="caption center-align">
          <h3>Warm and Fuzzy!</h3>
          <h5 class="light grey-text text-lighten-3">Our laundry care does wonders.</h5>
          <div class="section">
          <a class="btn waves-effect white grey-text darken-text-2">shop</a>
          </div>
        </div>
      </li>
      <li>
        <img src="img/gerbera-611568_960_720.jpg" class="slideimg" alt="flower"> <!-- random image -->

        <div class="caption left-align">
          <h3>Floral Finds</h3>
          <h5 class="light grey-text text-lighten-3">Browse our floral scent collection today!</h5>
          <a class="btn waves-effect white grey-text darken-text-2">shop</a>
        </div>
      </li>
      <li>
        <img src="img/sponge-2541251_960_720.jpg" class="slideimg" alt="sponge"> <!-- random image -->
        <div class="caption right-align">
          <h3>Scrub Away Your Fears!</h3>
          <h5 class="light grey-text text-lighten-3">With our new multi-purpose cleaner.</h5>
          <a class="btn waves-effect white grey-text darken-text-2">shop</a>
        </div>
      </li>
    </ul>
  </div>
 <!-- <div class="carousel carousel-slider">
      <div class="carousel-fixed-item center">
      <a href="catalog.html" class="btn waves-effect white grey-text darken-text-2">button</a>
      </div>  
    <a class="carousel-item" href="#one!"><img src="img/micro-fiber-cloth-2716116_960_720.jpg"><span>Hi</span></a>
    <a class="carousel-item" href="#two!"><img src="img/gerbera-611568_960_720.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="img/sponge-2541251_960_720.jpg"></a>
  </div>-->

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <!--<div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large red">
      HELP
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>-->
      <h3 class="header center indigo-text text-lighten-3">Welcome Home!</h3>
      <div class="row center">
        <p class="header col s12 light">Need a clean home with its own unique flair? Look no further than the Cleaning Scents Company. We give a little boost to everyday living with our fresh, scented cleaning supplies. Each home using our products can expect a high-quality experience.</p>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
        <div class="card">
        <div class="card-image">
          <img src="img/spray-bottle-2754171_960_720.jpg" alt="sprayer">
          <a href="catalog.php" class="btn-floating halfway-fab waves-effect waves-light cyan"><i class="material-icons">chevron_right</i></a>
        </div>
        <div class="card-content">
          <span class="card-title grey-text">Daily Deal</span>
          <p>View our specials on current products and save more money today!</p>
        </div>
      </div>
        </div>

        <div class="col s12 m4">
          <div class="card">
        <div class="card-image">
          <img src="img/soap-2726400__340.jpg" alt="applesoap">
          <a href="catalog.php" class="btn-floating halfway-fab waves-effect waves-light cyan"><i class="material-icons">chevron_right</i></a>
        </div>
        <div class="card-content">
          <span class="card-title grey-text">Exclusive Scents</span>
          <p>Our five scent profiles consist of floral, wood, herb, berry, and citrus.</p>
        </div>
      </div>
        </div>

        <div class="col s12 m4">
        <div class="card">
        <div class="card-image">
          <img src="img/water-drop-2670118__340.jpg" alt="water">
          <a href="catalog.php" class="btn-floating halfway-fab waves-effect waves-light cyan"><i class="material-icons">chevron_right</i></a>
        </div>
        <div class="card-content">
          <span class="card-title grey-text">Safe Ingredients</span>
          <p>Our ingredients include only the safest options for you and your home.</p>
        </div>
      </div>
      </div>

    </div>
        <div class="section"></div>
        <h4 class="header indigo-text text-lighten-3">Featured Product</h4>
        <?php
        $username = "ma826048";
        $password = "Tohru375!";

        // Create connection
        $connection = mysqli_connect("localhost" , "$username" , "$password", "ma826048");
        if (!$connection) {
          die('Could not connect: ' . mysqli_error($connection));
        }

        mysqli_select_db($connection,"ma826048");
        $sql="SELECT * FROM products WHERE ProductID = 0001";
        $result = mysqli_query($connection,$sql);

        
        while($row = mysqli_fetch_array($result)) {
        echo "<div class='card horizontal'>";
        echo "<div class='card-image'>" . "<img alt='lavendersoap' src ='" . $row["Product Image"] . "'>" . "</div>";
        echo "<div class='card-stacked'>";
        echo "<div class='card-content'>";
        echo "<span class='card-title grey-text'>" . $row["Product Name"] . "</span>";
        echo "<p>" . "&#36;" . $row["Price"] . "</p>";
        echo "<br />";
        echo "<p>" . $row["Description"] . "</p>";
        echo "</div>";
        echo "<div class='card-action'>" . "<a href='catalog.php'>View More</a>" . "</div>";
        /*echo "<td>" . $row['Product Name'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "<td>" . "<img src ='" . $row["Product Image"] . "'>" . "</td>";*/
        echo "</div>";
        echo "</div>";
        echo "<br />";
        }
      
        mysqli_close($connection);
        ?>
    <br><br>
  </div>
</div>

  <footer class="page-footer indigo lighten-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Cleaning Scents</h5>
          <p class="grey-text text-lighten-4">This site is not official and is an assignment for a UCF Digital Media course.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="white-text" href="catalog.php">Shop</a></li>
            <li><a class="white-text" href="admin.php">Admin</a></li>
            <li><a class="white-text" href="client.php">Profile</a></li>
            <li><a class="white-text" href="cart.php">Your Cart</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Help</h5>
          <ul>
            <li><a class="white-text" href="#!">Contact</a></li>
            <li><a class="white-text" href="#!">FAQs</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      <p>Designed by dig4530c_group06</p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
