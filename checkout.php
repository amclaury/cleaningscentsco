<?php
session_start();
include_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Cleaning Scents Checkout - Group 06</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="css/styles.css" type="text/css" rel="stylesheet"/>
  
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
        <li><a href="cart.php">YOUR CART</a></li>
        <li><a href="#"><i class="material-icons">search</i></a></li>
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



  <div class="section no-pad-bot" id="index-banner">
  <div class="container">
      <br><br>
  <div class="row">
    <div class="col s12">
        <h4 class="header center indigo-text text-lighten-3"> Checkout</h4>
    </div>
  </div>  
  </div>
</div>
		
		<!--  Guest -->
			<div class="container">
			<div class="section">
			<div class="row">
			<div class="col s12 m4">
			<h5 class="header center indigo-text text-lighten-3">Guest Checkout</h5>
		<ul class="collapsible" data-collapsible="accordion">
			<li>

          <div class="collapsible-header active">Personal Information</div>
          <div class="collapsible-body"><span>Tell Us About Yourself!</span>
          <form class="">
              <div class="row">
                <div class="input-field col s6">
                  <input id="first_name" type="text" class="validate" data-length="20">
                  <label for="first_name">First Name</label>
                </div>
			
                <div class="input-field col s6">
                  <input id="last_name" type="text" class="validate" data-length="20">
                  <label for="last_name">Last Name</label>
                </div>

                <div class="input-field col s6">
                  <input id="email" type="email" class="validate" data-length="30">
                  <label for="email">Email</label>
                </div>

                <div class="input-field col s6">
                  <input id="phone" type="number" class="validate" data-length="10">
                  <label for="phone">Phone Number</label>
                </div>     
              </div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light" type="submit" name="action">Reset
							<i class="material-icons right">send</i>
					</button>
          </form>
          </div>
        </li>

        <li>
          <div class="collapsible-header">Shipping Address</div>
          <div class="collapsible-body"><span>Enter Shipping Information.</span>
          <form>
              <div class="row">
                <div class="input-field col s12">
                  <input id="shipping_address1" type="text" class="validate" data-length="30">
                  <label for="shipping_address1">Address 1</label>
                </div>     
                <div class="input-field col s12">
                  <input id="shipping_address2" type="text" class="validate" data-length="30">
                  <label for="shipping_address2">Address 2</label>
                </div>
                <div class="input-field col s6">
                  <input id="shipping_city" type="text" class="validate" data-length="30">
                  <label for="shipping_city">City</label>
                </div>

                <div class="input-field col s6">
                  <input id="shipping_zip" type="number" class="validate" data-length="10">
                  <label for="shipping_zip">Zip Code</label>
                </div>                                            
              </div>
					<button type="submit" name="action">Submit
							<i class="material-icons right">send</i>
					</button>
					<button  type="submit" name="action">Reset
							<i class="material-icons right">send</i>
					</button>
          </form>
          </div>
        </li>

        <li>
          <div class="collapsible-header">Billing Address</div>
          <div class="collapsible-body"><span>Enter Billing Information.</span>
          <form action="#">
			
			<p>
				<input type="checkbox" id="shipping_address1" />
				<label for="shipping_address1">Same as Shipping</label>
			</p>
              <div class="row">
                <div class="input-field col s12">
                  <input id="billing_address1" type="text" class="validate" data-length="30">
                  <label for="billing_address1">Address 1</label>
                </div>     
                <div class="input-field col s12">
                  <input id="billing_address2" type="text" class="validate" data-length="30">
                  <label for="billing_address2">Address 2</label>
                </div>
                <div class="input-field col s6">
                  <input id="billing_city" type="text" class="validate" data-length="30">
                  <label for="billing_city">City</label>
                </div>

                <div class="input-field col s6">
                  <input id="billing_zip" type="number" class="validate" data-length="10">
                  <label for="billing_zip">Zip Code</label>
                </div>                                            
              </div>
					<div colspan="5"><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>
          </form>
          </div>            
        </li>
		
	      <li>
          <div class="collapsible-header">Payment</div>
		  <div class="collapsible-body"><span>Information.</span>
			<div class="container">
		<table class="respnsive-table">
		<thead class="respnsive-table"><tr><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>
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
	  $carnumber = $cardnumber["cardnumber"];
      $subtotal = ($product_price * $product_qty); //calculate Price x Qty
      
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
        echo '<tr class="'.$bg_color.'">';
        echo '<td>'.'<div class="product-thumb">'.$product_img_name.'</div>'.'</td>';
        echo '<td>'.$product_name.'</td>';
		echo '<td>'.$cardnumber.'</td>';
        echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
        echo '<td>'.$currency.$product_price.'</td>';
        echo '<td>'.$currency.$subtotal.'</td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
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
				<tr><td colspan="5"><a href="catalog.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
			</tbody>
			</table>
			<br />
			
			<!--Product Name	Description	Category	SKU		Cost	Price	Image	Size	Weight	Scent	Category	-->
			
			<form>
			<p>Payment Options</p>
				<div class="row">
                <div class="input-field col s12">
                  <input id="cardnumber" type="text" class="validate" data-length="16">
                  <label for="cardnumber">Credit Card</label>
                </div>     
                <div class="input-field col s12">
                  <input id="cardnumber" type="text" class="validate" data-length="16">
                  <label for="cardnumber">PayPal</label>
                </div>                            
              </div>
			  
					<div colspan="5"><span style="float:right;text-align: right;"><?php echo $cardnumber; ?>Credit Card: <?php echo sprintf($cardnumber);?></span></div>
					
					<div colspan="5"><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>
            </form>            
			</li>
			</ul>
			<br />
	    </div>

	
		<!--  Register-->
		<div class="col s12 m4">
			<h5 class="header center indigo-text text-lighten-3">Create Account</h5>
		<ul class="collapsible" data-collapsible="accordion">
			<li>
				<div class="collapsible-header active">Register</div>
				<div class="collapsible-body"><span>Signup</span>
				<div class="row">
					<form class="col s12 m4">
						<div class="container">
						</div>
						<div class="row">
						<div class="input-field col s12">
							<input id="email" type="email" class="validate" data-length="20">
							<label for="email">Email</label>
						</div>
						</div>
					
						<div class="row">
						<div class="input-field col s12">
							<input id="password" type="password" class="validate" data-length="20">
							<label for="password">Password</label>
						</div>
						</div>

					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light" type="submit" name="action">Reset
							<i class="material-icons right">send</i>
					</button>
				</form>
			</li>
			
        <li>
          <div class="collapsible-header active">Personal Information</div>
          <div class="collapsible-body"><span>Tell Us About Yourself!</span>
          <form class="">
              <div class="row">
                <div class="input-field col s6">
                  <input id="first_name" type="text" class="validate" data-length="20">
                  <label for="first_name">First Name</label>
                </div>

                <div class="input-field col s6">
                  <input id="last_name" type="text" class="validate" data-length="20">
                  <label for="last_name">Last Name</label>
                </div>

                <div class="input-field col s6">
                  <input id="email" type="email" class="validate" data-length="20">
                  <label for="email">Email</label>
                </div>

                <div class="input-field col s6">
                  <input id="phone" type="number" class="validate" data-length="10">
                  <label for="phone">Phone Number</label>
                </div>     
              </div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light" type="submit" name="action">Reset
							<i class="material-icons right">send</i>
					</button>
          </form>
          </div>
        </li>

        <li>
          <div class="collapsible-header">Shipping Address</div>
          <div class="collapsible-body"><span>Enter Shipping Information.</span>
          <form>
              <div class="row">
                <div class="input-field col s12">
                  <input id="shipping_address1" type="text" class="validate"data-length="20">
                  <label for="shipping_address1">Address 1</label>
                </div>     
                <div class="input-field col s12">
                  <input id="shipping_address2" type="text" class="validate" data-length="20">
                  <label for="shipping_address2">Address 2</label>
                </div>
                <div class="input-field col s6">
                  <input id="shipping_city" type="text" class="validate" data-length="20">
                  <label for="shipping_city">City</label>
                </div>

                <div class="input-field col s6">
                  <input id="shipping_zip" type="number" class="validate" data-length="10">
                  <label for="shipping_zip">Zip Code</label>
                </div>                                            
              </div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light" type="submit" name="action">Reset
							<i class="material-icons right">send</i>
					</button>
          </form>
          </div>
        </li>

        <li>
          <div class="collapsible-header">Billing Address</div>
          <div class="collapsible-body"><span>Enter Billing Information.</span>
          <form action="#">
			
			<p>
				<input type="checkbox" id="shipping_address1" />
				<label for="shipping_address1">Same as Shipping</label>
			</p>
              <div class="row">
                <div class="input-field col s12">
                  <input id="billing_address1" type="text" class="validate" data-length="20">
                  <label for="billing_address1">Address 1</label>
                </div>     
                <div class="input-field col s12">
                  <input id="billing_address2" type="text" class="validate" data-length="20">
                  <label for="billing_address2">Address 2</label>
                </div>
                <div class="input-field col s6">
                  <input id="billing_city" type="text" class="validate" data-length="20">
                  <label for="billing_city">City</label>
                </div>

                <div class="input-field col s6">
                  <input id="billing_zip" type="number" class="validate" data-length="10">
                  <label for="billing_zip">Zip Code</label>
                </div>                                            
              </div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light" type="submit" name="action">Reset
							<i class="material-icons right">send</i>
					</button>
          </form>
          </div>            
        </li>
		
	      <li>
          <div class="collapsible-header">Payment</div>
		  <div class="collapsible-body"><span>Information.</span>
			<div class="container">
		<table class="respnsive-table">
	<thead class="respnsive-table"><tr><th>Image</th><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>
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
	
		<form>
			<p>Payment Options</p>
				<div class="row">
                <div class="input-field col s12">
                  <input id="credit_card" type="text" class="validate" data-length="42">
                  <label for="credit_card">Credit Card</label>
                </div>     
                <div class="input-field col s12">
                  <input id="paypal" type="text" class="validate" data-length="42">
                  <label for="paypal">PayPal</label>
                </div>                            
              </div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light" type="submit" name="action">Reset
							<i class="material-icons right">send</i>
					</button>		
            </form>          
			</li>
			</ul>
			<br />
	    </div>

		<!--  Login-->
		<div class="col s12 m4">
			<h5 class="header center indigo-text text-lighten-3">Returning Customer</h5>
		<ul class="collapsible" data-collapsible="accordion">
			<li>
				<div class="collapsible-header active">Login</div>
				<div class="collapsible-body"><span>Signin</span>
				<div class="row">
					<form class="col s12 m4">
						<div class="container">
						</div>
						<div class="row">
						<div class="input-field col s12">
							<input id="email" type="email" class="validate" data-length="30">
							<label for="email">Email</label>
						</div>
						</div>
					
						<div class="row">
						<div class="input-field col s12">
							<input id="password" type="password" class="validate" data-length="20">
							<label for="password">Password</label>
						</div>
						</div>

					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light" type="submit" name="action">Reset
							<i class="material-icons right">send</i>
					</button>
				</form>
			</li>
			
        <li>
          <div class="collapsible-header active">Contact</div>
          <div class="collapsible-body"><span>Contact Us</span>
		  	<div class="row">
			<form class="col s12 m4">
			<div class="container">
			<div class="input-field col s12">
			<input id="email" type="email" class="validate" data-length="30">
				<label for="email">Email</label>
			</div>
			</div>
			<div class="row">
			<div class="input-field col s12">
				<textarea id="textarea1" class="materialize-textarea" data-length="200"></textarea>
				<label for="textarea1">Message</label>
			</div>
			</div>
			</div>
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
					<i class="material-icons right">send</i>
				</button>
				<button class="btn waves-effect waves-light" type="submit" name="action">Reset
					<i class="material-icons right">send</i>
				</button>
			</form>
        </li>
		
	      <li>
          <div class="collapsible-header">Payment</div>
		  <div class="collapsible-body"><span>Information.</span>
			<div class="container">
		<table class="respnsive-table">
	<thead class="respnsive-table"><tr><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>
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
	
			<tr><td colspan="5"><span style="float:right;text-align: right;"><?php 		echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo 		 sprintf("%01.2f", $grand_total);?></span></td></tr>
			<tr><td colspan="5"><a href="catalog_test.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
			</tbody>
			</table>

			<form action="post">
			<br />
			<i class="material-icons">credit_card</i><i class="material-icons">card_giftcard</i>
			  <p>Payment Options</p>
              <p>
                <input class="with-gap" name="group1" type="radio" id="pay1" />
                <label for="pay1">Credit Card ending in</label>
				<div id="credit_card"></div>
              </p>
              <p>
                <input class="with-gap" name="group1" type="radio" id="pay2" />
                <label for="pay2">PayPal</label>
              </p>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light" type="submit" name="action">Reset
							<i class="material-icons right">send</i>
					</button>		
            </form>            
			</li>
			</ul>
			<br />
			</div>
          </div>
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
      <p>Designed by Group 06</p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
