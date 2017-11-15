
<?php
    session_start();
    include("includes/db_connect.php");
	
	include_once("connect.php");

    $emailerror = $nameerror = $passworderror = "";
    $email = $name = $password = $password1 = $password2 = $address = $city = $state = $zip = $country = $phone = $cardnumber = "" ;

    $acc_result = "";

    /*if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if (empty($_POST["email"])){
        $emailerror = "Email is required";
      }else{
        $email = test_input($_POST["email"]);
        if (!preg_match("/^[a-zA-Z]*$/",$email)){
          $emailerror = "Only letters, no spaces";
        }
      }

      if (empty($_POST["name"])){
        $nameerror = "A display name is required";
      }else{
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z]*$/", $name)){
          $nameerror = "Invalid Display Name";
        }
      }

      if (empty($_POST["password"])){
        $passworderror = "Password is required";
      }else{
        $password = ($_POST["password"]);
      }
    }*/

    /*if ($emailerror == "" && $nameerror == "" && $passworderror == ""){
        //$_SESSION['logged_in'] = true;
        //$_SESSION['logged_in_user'] = $email;
      //the above code caused users to ping as logged in just by visiting the page
    }*/


    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      $data = str_replace('(','',$data);
      $data = str_replace(')','',$data);
      return $data;
    }

    if(isset($_POST['submit'])){

      $name = $_POST['name'];
      $email = $_POST['email'];
	  $password1 = $_POST['password1'];
	  $password2 = $_POST['password2'];
	  $password = $_POST['password1'];
	  $address = $_POST['address'];
	  $city = $_POST['city'];
	  $state = $_POST['state'];
	  $zip = $_POST['zip'];

      $sql = "SELECT * FROM users WHERE email='".$email."'LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_row($result);

      if(mysqli_num_rows($result) ==1){

        echo "Account already exists. Please try a new username.";
      }
      else{
        /*if ($password1 === $password2) {
					$password = sha1($password1); //ENCRYPTION
				}
		else { $errorMsg .= "Your passwords do not match. "; }*/
        $sql = "INSERT INTO users (email, password, name, address, street, state, zip) VALUES ('$email','$password', '$name', '$address', '$city', '$state', '$zip')";
        mysqli_query($conn, $sql);
        $acc_result= "Account successfully created. You will be directed to the tracker page in 5 seconds.<br/><br/>Click <a href='tracker.php'>here</a> to go to your tracker page if you are not redirected automatically.";

        $email = $name = $password = $password1 = $password2 = $address = $city = $state = $zip = $country = $phone = $cardnumber = "" ;

        header("refresh:50000; url=client.php");
      }
    }
 ?>	
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Cleaning Scents  Company - Checkout</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="css/styles.css" type="text/css" rel="stylesheet"/>
  <link rel="icon" type="image/png" href="img/favicon.ico" />
  
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
    <div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo"><img class="responsive-img pad-extra" alt="logo" src="img/wordmark.png" height="50" width="250"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home.php">HOME</a></li>
        <li><a href="catalog.php">SHOP</a></li>
        <li><a href="client.php">PROFILE</a></li>
        <li><a href="cart.php"><i class="material-icons"><i class="material-icons">shopping_cart</i></i></a></li>
        <li><a id="toggle-search" href="#!"><i class="material-icons"><i class="large mdi-action-search">search</i></i></a></li>
        <li><a href="login.php">LOGIN</a></li>

      </ul>

<ul id="nav-mobile" class="side-nav">
<li><a href="#">Navbar Link</a></li>
</ul>
<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
</div>
</nav>

<div id="search" class="row white-text grey darken-3" >

<div class="container">
<form method="get" action="https://sulley.cah.ucf.edu/~dig4530c_group06/catalog.php">
<input class="form-control" type="text" placeholder="Search ..." name="q">

<input type="hidden" value="makoframework.com" name="as_sitesearch">
</form>
</div>
</div>



  <div class="section no-pad-bot" id="index-banner">
  <div class="container80">
      <br><br>
  <div class="row">
    <div class="col s12">
        <h4 class="header center indigo-text text-lighten-3"> Checkout</h4>
    </div>
  </div>  
  </div>
</div>
		
		<!--  Guest -->
			<div class="container80">
			<div class="section">
			<div class="row">
			<div class="col s12 m4">
			<h5 class="header center indigo-text text-lighten-3">Guest Checkout</h5>
		<ul class="collapsible" data-collapsible="accordion">
			<li>

          <div class="collapsible-header active">Personal Information</div>
          <div class="collapsible-body"><span>Please complete the required forms.</span>
          <form class="">
              <div class="row">
                <div class="input-field col s6">
                  <input id="first_name1" type="text" class="validate" data-length="20">
                  <label for="first_name1">First Name</label>
                </div>
			
                <div class="input-field col s6">
                  <input id="last_name1" type="text" class="validate" data-length="20">
                  <label for="last_name1">Last Name</label>
                </div>

                <div class="input-field col s6">
                  <input id="email1" type="email" class="validate" data-length="30">
                  <label for="email1">Email</label>
                </div>

                <div class="input-field col s6">
                  <input id="phone1" type="number" class="validate" data-length="10">
                  <label for="phone1">Phone Number</label>
                </div>     
              </div>
					<div><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>
          </form>
          </div>
        </li>

        <li>
          <div class="collapsible-header">Address</div>
          <div class="collapsible-body"><span>Enter Shipping Address.</span>
          <form>
              <div class="row">
                <div class="input-field col s12">
                  <input id="street1" type="text" class="validate" data-length="40">
                  <label for="street1">Address 1</label>
                </div>     
                <div class="input-field col s12">
                  <input id="street2" type="text" class="validate" data-length="40">
                  <label for="street2">Address 2</label>
                </div>
                <div class="input-field col s6">
                  <input id="city1" type="text" class="validate" data-length="30">
                  <label for="city1">City</label>
                </div>

                <div class="input-field col s6">
                  <input id="zip1" type="number" class="validate" data-length="5">
                  <label for="zip1">Zip Code</label>
                </div>                                            
              </div>
					<div><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>
          </form>
          </div>
        </li>
		
	      <li>
          <div class="collapsible-header">Payment Options</div>
		  <div class="collapsible-body"><span>Information.</span>
			<div class="container">
			<form method="post" action="cart_update.php">

		<input type="hidden" name="return_url" value=" "<?php 
		$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		echo $current_url; ?>" />
		</form>
	</div>
			
			<form>
			<p>Payment Options</p>
				<div class="row">
                <div class="input-field col s12">
                  <input id="cardnumber" type="text" class="validate" data-length="16">
                  <label for="cardnumber">Credit Card</label>
                </div>     
                <div>
                  <a class="white-text" href="#!">PayPal</a>
                </div>                            
              </div>
					
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
				<div class="collapsible-body"><span>Sign up</span>
				<div class="row">
					<form class="col s12">
						<div class="container">
						</div>
						<div class="row">
						<div class="input-field">
							<input id="email2" type="email" class="validate" data-length="30">
							<label for="email2">Email</label>
						</div>
						</div>
					
						<div class="row">
						<div class="input-field">
							<input id="password" type="password" class="validate" data-length="20">
							<label for="password">Password</label>
						</div>
						</div>
					<div colspan="5"><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>	
				</form>
			</li>
			
        <li>
          <div class="collapsible-header active">Personal Information</div>
          <div class="collapsible-body"><span>Please complete the required forms.</span>
          <form class="">
              <div class="row">
                <div class="input-field col s6">
                  <input id="first_name2" type="text" class="validate" data-length="20">
                  <label for="first_name2">First Name</label>
                </div>

                <div class="input-field col s6">
                  <input id="last_name2" type="text" class="validate" data-length="20">
                  <label for="last_name2">Last Name</label>
                </div>

                <div class="input-field col s6">
                  <input id="email2" type="email" class="validate" data-length="20">
                  <label for="email2">Email</label>
                </div>

                <div class="input-field col s6">
                  <input id="phone2" type="number" class="validate" data-length="10">
                  <label for="phone2">Phone Number</label>
                </div>     
              </div>
					<div colspan="5"><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>
          </form>
          </div>
        </li>

        <li>
          <div class="collapsible-header">Address</div>
          <div class="collapsible-body"><span>Enter Shipping Information.</span>
          <form>
              <div class="row">
                <div class="input-field col s12">
                  <input id="street3" type="text" class="validate" data-length="40">
                  <label for="street3">Address 1</label>
                </div>     
                <div class="input-field col s12">
                  <input id="street4" type="text" class="validate" data-length="40">
                  <label for="street4">Address 2</label>
                </div>
                <div class="input-field col s6">
                  <input id="city2" type="text" class="validate" data-length="30">
                  <label for="city2">City</label>
                </div>
				<div class="input-field col s6">
                  <input id="state2" type="number" class="validate" data-length="2">
                  <label for="state2">State</label>
                </div>  

                <div class="input-field col s6">
                  <input id="zip2" type="number" class="validate" data-length="5">
                  <label for="zip2">Zip Code</label>
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
<form method="post" action="cart_update.php">
<table width="30%"  cellpadding="6" cellspacing="0"><thead><tr><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>
  <tbody>
  <?php
  if(isset($_SESSION["cart_test"])) //check session var
    {
    $total = 0; //set initial total value
    $b = 0; //var for zebra stripe table 
    foreach ($_SESSION["cart_test"] as $cart_itm)
        {
      //set variables to use in content below
      $product_name = $cart_itm["product_name"];
      $product_qty = $cart_itm["product_qty"];
      $product_price = $cart_itm["product_price"];
      $product_code = $cart_itm["product_code"];
      $subtotal = ($product_price * $product_qty); //calculate Price x Qty
      
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
        echo '<tr class="'.$bg_color.'">';
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
    <tr><td colspan="5"><span style="float:left;text-align: left;"><?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
	
    <tr><td colspan="5"><a href="catalog_test.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>
			
			<form>
			<p>Payment Options</p>
				<div class="row">
                <div class="input-field col s6">
                  <input id="cardnumber" type="text" class="validate" data-length="16">
                  <label for="cardnumber">Credit Card</label>
                </div> 

				<div class="input-field col s12">
                  <a class="white-text" href="#!">PayPal</a>
                </div> 				
              </div>
					
					<div colspan="5"><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>		
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
				<div class="collapsible-body"><span>Sign in</span>
				<div class="row">
					<form class="col s12">
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
					<div colspan="5"><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>	
				</form>
			</li>
			
        <li>
          <div class="collapsible-header active">Contact</div>
          <div class="collapsible-body"><span>Contact Us</span>
		  	<div class="row">
			<form class="col s12">
			<div class="container">

			<div class="input-field col s12">
				<textarea id="textarea1" class="materialize-textarea" data-length="200"></textarea>
				<label for="textarea1">Message</label>
			</div>
			</div>
			</div>
					<div colspan="5"><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>
			</form>
        </li>
		
	      <li>
          <div class="collapsible-header">Payment</div>
		  <div class="collapsible-body"><span>Information.</span>
			<div class="container">
<form method="post" action="cart_update.php">
<table width="20%"  cellpadding="2" cellspacing="0"><thead><tr><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>
  <tbody>
  <?php
  if(isset($_SESSION["cart_test"])) //check session var
    {
    $total = 0; //set initial total value
    $b = 0; //var for zebra stripe table 
    foreach ($_SESSION["cart_test"] as $cart_itm)
        {
      //set variables to use in content below
      $product_name = $cart_itm["product_name"];
      $product_qty = $cart_itm["product_qty"];
      $product_price = $cart_itm["product_price"];
      $product_code = $cart_itm["product_code"];
      $subtotal = ($product_price * $product_qty); //calculate Price x Qty
      
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
        echo '<tr class="'.$bg_color.'">';
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
    <tr><td colspan="5"><span style="float:left;text-align: left;">
	<?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
	
    <tr><td colspan="5"><a href="catalog_test.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>
			
			<form>
				<p>Payment Options</p>
				<div class="row">
				    <input name="group1" type="radio" id="test1" />
				<label for="test1">Credit Card</label>
				</p>
				<p>
					<input name="group1" type="radio" id="test2" />
					<label for="test2">PayPal</label>
				</p>                           
				</div>
					
					<div colspan="5"><button type="submit">Submit</button>
					<a href="checkout.php" class="button">Reset</a></div>	
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
			<li><a class="white-text" href="policies.php">Our Policies</a></li>
          
          
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      <p>Designed by: dig4530c_06</p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
