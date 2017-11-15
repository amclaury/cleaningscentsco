<!DOCTYPE html>
<?php include 'connect.php';?> 
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Cleaning Scents Company Client</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="css/styles.css" type="text/css" rel="stylesheet"/>
  <link rel="shortcut icon" href="images/favicon.ico" /> 
  
  <!-- SEARCH -->
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
</head>

<body>
    
    <form action='' method='post'>
        <p><label>Country:</label><input type='text' name='country' value='' class='auto'></p>
    </form>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
    <script type="text/javascript">
    $(function() {
        
                //autocomplete
                $(".auto").autocomplete({
                    source: "search.php",
                    minLength: 1
                });                
    
                });
    </script>
    
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
    <div class="row">
    <div class="col s12">
    <h4 class="indigo-text text-lighten-3">Your Profile</h4>
    </div>
    </div>

    <div class="row">
    <div class="col s12 m7">
      
      <div class="card">
        <div class="card-image">
          <img src="img/profilepic.jpg" alt="profile">
        </div>
        <div class="card-content">
          <span class="card-title">Jane Doe</span>
        </div>
      </div>
      
    </div>
    <div class="col s12 m5">
    <div class="card">
        <div class="card-content">
          <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">local_shipping</i>Shipping Address</div>
      <div class="collapsible-body"><span>123 Cherry Tree Lane</span></div>
    </li>
        <li>
      <div class="collapsible-header"><i class="material-icons">account_balance</i>Billing Address</div>
      <div class="collapsible-body"><span>123 Cherry Tree Lane</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">call</i>Phone Number</div>
      <div class="collapsible-body"><span>Mobile: 456-342-6759</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">email</i>Email Address</div>
      <div class="collapsible-body"><span>janedoe@yahoo.com</span></div>
    </li>
      <li>
      <div class="collapsible-header"><i class="material-icons">credit_card</i>Payment</div>
      <div class="collapsible-body"><span>Credit Card: Visa ending in 1234</span></div>
    </li>
  </ul>
        </div>
        <div class="card-action">
          <a href="#">Edit</a>
          <a href="#">Save</a>
        </div>
    </div>
  </div>
  </div>
 
  </div>
</div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">


    </div>
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
