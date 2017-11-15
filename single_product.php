<?php
session_start();
include_once("connect.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Cleaning Scents Company - Single Product</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/favicon.ico" />
  <link href="css/styles.css" type="text/css" rel="stylesheet"/>
    <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109141340-1"></script> 
</head>
<body>
    
    <!-- CART DROPDOWN -->
    <ul id="dropdown1" class="dropdown-content">
    <li>
      <?php
      if(isset($_SESSION["cart_test"]) && count($_SESSION["cart_test"])>0)
      {
      echo '<div class="cart-view-table-front" id="view-cart">';
      echo '<h4 class="indigo-text text-lighten-3">Your Shopping Cart</h4>';
      echo '<form method="post" action="cart_update.php">';
      echo '<table width="100%"  cellpadding="6" cellspacing="0">';
      echo '<tbody>';
      $total =0;
      $b = 0;
      foreach ($_SESSION["cart_test"] as $cart_itm)
      {
      $product_img_name = $cart_itm["product_img_name"];
      $product_name = $cart_itm["product_name"];
      $product_qty = $cart_itm["product_qty"];
      $product_price = $cart_itm["product_price"];
      $product_code = $cart_itm["product_code"];
      $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
      echo '<tr class="'.$bg_color.'">';
      echo '<td>'.'<img alt="productimage" class="single_thumb" src ="'.$product_img_name.'">' . '</td>';
      echo '<td>'.$product_name.'</td>';
      echo '<td>Qty <input type="text" size="2" length="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
      echo '<td><input type="checkbox" id="remove" name="remove_code[]" value="'.$product_code.'" /><label for="remove">Remove</label></td>';
      echo '</tr>';
      $subtotal = ($product_price * $product_qty);
      $total = ($total + $subtotal);
      }
      echo '<td colspan="4">';
      echo '<button type="submit">Update</button><a href="cart.php" class="button">Checkout</a>';
      echo '</td>';
      echo '</tbody>';
      echo '</table>';
  
      $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
      echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
      echo '</form>';
      echo '</div>';
      }
      ?>
    </li>
    </ul>

  <!-- NAVIGATION -->
  <nav class="cyan accent-4">
    <div class="nav-wrapper container80"><a id="logo-container" href="home.php" class="brand-logo"><img class="responsive-img pad-extra" alt="logo" src="img/wordmark.png" height="50" width="250"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home.php">HOME</a></li>
        <li><a href="catalog.php">SHOP</a></li>
        <li><a href="client.php">PROFILE</a></li>
        <li><a class="dropdown-button" data-activates="dropdown1"><i class="material-icons right">shopping_cart</i></a></li>
        <li><a id="toggle-search" href="#!"><i class="material-icons"><i class="large mdi-action-search">search</i></i></a></li>
        <li><a href="login.php">LOGIN</a></li>
      </ul>
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <!-- SEARCH FUNCTION -->
  <div id="search" class="row white-text grey darken-3" >

    <div class="container">
        <form method="get" action="https://sulley.cah.ucf.edu/~dig4530c_group06/catalog.php">
            <input class="form-control" type="text" placeholder="Search ..." name="q">

            <input type="hidden" value="makoframework.com" name="as_sitesearch">
        </form>
    </div>
</div>



  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>

<div class="row">

          <?php
            $results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price, rating FROM products WHERE id = 2");
            if($results){ 
            echo '<div class="col s12 m5">';
            echo '<div class="">' . '<img alt="single_product" class="img_thumb" src ="product_img/apple_hand.jpg">' . '</div>';
            echo '</div>';




            echo '<div class="col s12 m7">';
            $test_item = '<ul class="single_products">';
            //fetch results set as object and output HTML

            

            while($obj = $results->fetch_object())
            {
            $test_item .= <<<EOT
            <li class="single_product">
            <form method="post" action="cart_update.php">
            <div class="product-content"><h4>{$obj->product_name}</h4></div>
            <div class="product-info">
            Price {$currency}{$obj->price}
            <div class="rating">Rating {$obj->rating} <i class="tiny material-icons">star star star star star</i></div>
            <div class="product-desc">{$obj->product_desc}</div>
            
            <label>
            <span>Quantity</span>
            <input type="number" size="99" name="product_qty" value="1" />
            </label>
           
            <input type="hidden" name="product_code" value="{$obj->product_code}" />
            <input type="hidden" name="type" value="add" />
            <input type="hidden" name="return_url" value="{$current_url}" />
            <div class="left-align"><button type="submit" class="add_to_cart">Add to Cart</button></div>
            </div>
            </form>
            </li>
EOT;
}
$test_item .= '</ul>';
echo $test_item;
echo '</div>';

}
?>  
  </div>

<!-- REVIEWS -->
<div class="row">
<div class="col s12 m5">
</div>
<div class="col s12 m6">
  <div class="card-panel reviews">
      <ul class="tabs">
        <li class="tab col s6"><a href="#review1">Read Reviews</a></li>
        <li class="tab col s6"><a href="#review2">Write a Review</a></li>
      </ul>
      <div id="review1" class="col s12">
        <div class="section"></div>
        <i class="tiny material-icons">star star star star star</i>
        <p><em>I love this soap it is just the best. It smells like the apple tree I used to climb when I was a kid. Do you know which apples are my favorite? Red ones. Anywho, great product!</em></p>
      </div>
      <div id="review2" class="col s12">
        <div class="section"></div>
        <i class="tiny material-icons">star_border star_border star_border star_border star_border</i>
        <form class="col s12">
         <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Comment</label>
        </div>
      </div>
    </form>
      </div>
      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
  </div>
</div>
<div class="col s12 m1"></div>
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

  <!-- FOOTER -->
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
            <li><a class="white-text" href="home.php">Home</a></li>
            <li><a class="white-text" href="catalog.php">Shop</a></li>
            <li><a class="white-text" href="admin.php">Admin</a></li>
            <li><a class="white-text" href="client.php">Profile</a></li>
            <li><a class="white-text" href="cart.php">Your Cart</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Help</h5>
          <ul>
            <li><a class="white-text" href="policies.php">Contact</a></li>
            <li><a class="white-text" href="policies.php">Our Policies</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      <p>Designed by: dig4530c_group06</p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
