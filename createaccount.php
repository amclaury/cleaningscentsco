<?php
    session_start();
    include("includes/db_connect.php");

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
  <title>Cleaning Scents Home - Mahogany Breaux</title>

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
	  
	            <div class="row">
            <form class="col s12 m10" name="signupform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div class="row">
                <div class="input-field col s12">
                  <input placeholder="Email" id="email" type="text" class="validate" name="email" size="50" maxlength="50" value="<?php echo $email; ?>"><span class="error"><?php echo $emailerror;?></span>
                  <label for="email">Email</label>
                </div>
              </div>

              <div class="row">
               <div class="input-field col s12">
                  <input placeholder="Display Name" id="name_name" type="text" class="validate" name="name" size="15" maxlength="50" value="<?php echo $name; ?>"><span class="error"><?php echo $nameerror;?></span>
                  <label for="name_name">Display Name</label>
                </div>
              </div>

		    <div class="row">
                <div class="input-field col s6">
                  <input id="password1" type="password" class="validate" name="password1" maxlength="20" value="<?php echo $password1; ?>"><span class="error"><?php echo $passworderror;?></span>
                  <label for="password1">Password</label>
                </div>

                <div class="input-field col s6">
                  <input id="password2" type="password" class="validate" name="password2" size="15" maxlength="50" value="<?php echo $password2; ?>"><span class="error"><?php echo $passworderror;?></span>
                  <label for="password2">Confirm Password</label>
                </div>
              </div>
			  
		    <div class="row">
               <div class="input-field col s12">
                  <input placeholder="Street Address" id="address" type="text" name="address" size="15" maxlength="50" value="<?php echo $address; ?>"><span class="error"><?php echo $nameerror;?></span>
                  <label for="address">Street Address</label>
                </div>
              </div>

		    <div class="row">
                <div class="input-field col s6">
                  <input id="city" type="text" name="city" maxlength="20" value="<?php echo $city; ?>"><span class="error"><?php echo $nameerror;?></span>
                  <label for="city">City</label>
                </div>

                <div class="input-field col s3">
                  <input placeholder="##" id="state" type="text" name="state" size="15" maxlength="50" value="<?php echo $state; ?>"><span class="error"><?php echo $nameerror;?></span>
                  <label for="state">State</label>
                </div>
				
				<div class="input-field col s3">
                  <input placeholder="#####" id="zip" type="text" name="zip" size="15" maxlength="50" value="<?php echo $zip; ?>"><span class="error"><?php echo $nameerror;?></span>
                  <label for="zip">ZIP Code</label>
                </div>
              </div>			  
			  
              <button class="btn waves-effect waves-light blue lighten-1 right" type="submit" name="submit" value="submit">Register
                  <i class="material-icons right">send</i>
              </button>
            </form>
            <p><?php echo $acc_result; ?></p>
          </div>
        <?php /*}*/ ?>
    </div>
	  
	<form action = "createaccount" action = "" method = "post" name = "crtacct" class = "bl-even" style = "width: 50%; margin: 15px auto 15px auto; display: block;">
		<h1 style = "color: white; text-align: center;">Create your Treehouse Account!</h1>
		<div id = "form">
			<p>Email:</p>
			<input type = "text" name = "email"/></br> 
			<p>Name:</p>
			<input type = "text" name = "name"/></br> 
			<p>Password:</p>
			<input type = "password" name = "password1"/></br> 
			<p>Confirm Password:</p>
			<input type = "password" name = "password2"/></br></br>
			<p>Street Address:</p>
			<input type = "text" name = "street"/></br>
			<p>City:</p>
			<input type = "text" name = "city"/></br>
			<p>State:</p>
			<input type = "text" name = "state"/></br>
			<p>ZIP Code:</p>
			<input type = "text" name = "zip"/></br>			
			<p>Country:</p>
			<input type = "text" name = "country"/></br> 
			<p>Phone Number:</p>
			<input type = "text" name = "phone"/></br>
			<p>Card Number:</p>
			<input type = "password" name = "cardnumber"/></br>			
			<input type = "submit" value = "Create Account" name = "crtacct" id = "submit"/>
		</div>
	</form>	
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
        <div class='card horizontal'><div class='card-image'><img alt='lavendersoap' src ='img/soap-2726387_960_720.jpg'></div><div class='card-stacked'><div class='card-content'><span class='card-title grey-text'>Lavender Bar Soap</span><p>&#36;4</p><br /><p>Relaxing floral scent</p></div><div class='card-action'><a href='catalog.php'>View More</a></div></div></div><br />    <br><br>
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
      <p>Designed by Cleaning Scents Co.</p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
