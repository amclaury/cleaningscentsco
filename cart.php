<?php
session_start();
include_once("connect.php");
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cleaning Scents Catalog - DIG 4530c Group 6</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet" type="text/css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109141340-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109141340-1');
</script>

</head>

<body>

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
      $product_img = $cart_itm["product_img_name"];
      $product_name = $cart_itm["product_name"];
      $product_qty = $cart_itm["product_qty"];
      $product_price = $cart_itm["product_price"];
      $product_code = $cart_itm["product_code"];
      $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
      echo '<tr class="'.$bg_color.'">';
      echo '<td>'.'<img alt="productimage" src='.'"img/'. $product_img_name . '">' . '</td>';
      echo '<td>'.$product_name.'</td>';
      echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
      echo '<td><input type="checkbox" id="remove" name="remove_code[]" value="'.$product_code.'" /><label for="remove">Remove</label></td>';
      echo '</tr>';
      $subtotal = ($product_price * $product_qty);
      $total = ($total + $subtotal);
      }
      echo '<td colspan="4">';
      echo '<button type="submit">Update</button><a href="cart_test.php" class="button">Checkout</a>';
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

  <nav class="cyan accent-4">
    <div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo">Cleaning Scents</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="catalog.php">SHOP</a></li>
        <li><a href="admin.php">ADMIN</a></li>
        <li><a href="client.php">PROFILE</a></li>
        <li><a class="dropdown-button" data-activates="dropdown1">YOUR CART<i class="material-icons right">shopping_cart</i></a></li>
        <li><a href="#"><i class="material-icons">search</i></a></li>
	<li>
			<a id="toggle-search" href="#!">
			<i class="large mdi-action-search"></i>
			</a>
        </li>
      </ul>
	  
	  	  <ul id="nav-mobile" class="side-nav">
	    <li><a href="catalog.php">SHOP</a></li>
	    <li><a href="admin.php">ADMIN</a></li>
        <li><a href="client.php">PROFILE</a></li>
		<li><a href="cart.php">CART</a></li>
	 </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


<h4 class="header left indigo-text text-lighten-3">Your Cart</h4>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Image</th><th>Name</th><th>Quantity</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
  <tbody>
  <?php
  if(isset($_SESSION["cart_test"])) //check session var
    {
    $total = 0; //set initial total value
    $b = 0; //var for zebra stripe table 
    foreach ($_SESSION["cart_test"] as $cart_itm)
        {
      //set variables to use in content below
      $product_img_name = $cart_itm["product_img_name"];
      $product_name = $cart_itm["product_name"];
      $product_qty = $cart_itm["product_qty"];
      $product_price = $cart_itm["product_price"];
      $product_code = $cart_itm["product_code"];
      $subtotal = ($product_price * $product_qty); //calculate Price x Qty
      
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
        echo '<tr class="'.$bg_color.'">';
        echo '<td>'.'<div class="product-thumb">'.$product_img_name.'</div>'.'</td>';
        echo '<td>'.$product_name.'</td>';
        echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
        echo '<td>'.$currency.$product_price.'</td>';
        echo '<td>'.$currency.$subtotal.'</td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
      $total = ($total + $subtotal); //add subtotal to total var
        }
    
    $grand_total = $total + $shipping_cost; //grand total including shipping cost
    foreach($taxes as $key => $value){ //list and calculate all taxes in array
        $tax_amount     = round($total * ($value / 100));
        $tax_item[$key] = $tax_amount;
        $grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
    }
    
    $list_tax       = '';
    foreach($tax_item as $key => $value){ //List all taxes
      $list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
    }
    $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
  }
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
    <tr><td colspan="5"><a href="catalog_test.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
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
      <p>Designed by DIG 4530c Group 6</p>
      </div>
    </div>
  </footer>
</body>
</html>
