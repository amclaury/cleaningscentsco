<?php
session_start();
include_once("connect.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cleaning Scents Company - Back Office</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="icon" type="image/png" href="img/favicon.ico" />
<link href="css/styles.css" rel="stylesheet" type="text/css">
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
      echo '<td>'.'<img alt="productimage" class="img_thumb" src ="'.$product_img_name.'">' . '</td>';
      echo '<td>'.$product_name.'</td>';
      echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
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
    <div class="nav-wrapper container80"><a id="logo-container" href="home.php" class="brand-logo"><img class="responsive-img pad-extra" alt="logo" src="img/wordmark.png" style="width:378x; height:68px;"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home.php">HOME</a></li>
        <li><a href="catalog.php">SHOP</a></li>
        <li><a href="client.php">PROFILE</a></li>
        <li><a class="dropdown-button" data-activates="dropdown1"><i class="material-icons right">shopping_cart</i></a></li>
         <li><a href="#" id="toggle-search"><i class="material-icons"><i class="large mdi-action-search">search</i></i></a></li>
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

<div class="section"></div>
<div class="row">
<div class="col s12 m2"></div>
<div class="col s12 m8">
  <h3 class="header indigo-text text-lighten-3">Add Product</h3>
  				<form action="upload.php" method="post" enctype="multipart/form-data" class="bl-even">
			<tr>
				<td id="line1"> Name:</td>
				<td><input type="text" name="Name"></td>
				<br>
				<br>
			</tr>
			<tr>
				<td id="line1"> Price: </td>
				<td><input type="text" name="Price"></td>
			</tr>
			<tr>
					<td id="line1"> Select image to upload:</td>
					<td><input type="file" name="uploadedfile"></td>
					<br><br>
			</tr>
			<tr>
					<td id="line1">Description:</td>
					<td><textarea rows=10 cols=75 name="description"></textarea></td>
					<br><br>
			</tr>

			<tr>	<td></td>		
					<td><input type="submit" value="Add Product" name="submit"></td>
			</tr>
		</table>
		</form>
</div>
<div class="col s2"></div>
</div>
<br><br>


<div class="section"></div>
<div class="row">
<div class="col s12 m2"></div>
<div class="col s12 m8">
  <h3 class="header indigo-text text-lighten-3">Delete Product</h3>
  <p class="header light"></p>
</div>
<div class="col s2"></div>
</div>
<br><br>



<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");
if($results){ 
$test_item = '<ul class="products">';
//fetch results set as object and output HTML

//  <div class="product-desc">{$obj->product_desc}</div>

while($obj = $results->fetch_object())
{
$test_item .= <<<EOT
  <li class="product">
  <form method="post" action="cart_update.php">
  <div class="product-thumb"><img alt="productimage" class="img_thumb" src="{$obj->product_img_name}"></div>
  <div class="product-content"><h3>{$obj->product_name}</h3></div>
  <div class="product-info">
  Price {$currency}{$obj->price} 
  
  <fieldset>
  
  
  <label>
    <span>Quantity</span>
    <input type="tel" size="99" maxlength="99" name="product_qty" value="1" />
  </label>
  
  </fieldset>
  <input type="hidden" name="product_code" value="{$obj->product_code}" />
  <input type="hidden" name="type" value="add" />
  <input type="hidden" name="return_url" value="{$current_url}" />
  <div class="center-align"><button type="submit" class="add_to_cart">Delete</button></div>
  </div>
  </form>
  </li>
EOT;
}
$test_item .= '</ul>';
echo $test_item;

}
?>  
<!-- Products List End -->

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

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="js/init.js"></script>
</body>
</html>