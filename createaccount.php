<?php
    session_start();
    include("db_connect.php");

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
	  $country = $_POST['country'];
	  $phone = $_POST['phone'];
	  $cardnumber = $_POST['cardnumber'];

      $sql = "SELECT * FROM users WHERE email='".$email."'LIMIT 1";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_row($result);

      if(mysqli_num_rows($result) ==1){

        echo "Account already exists. Please try a new username.";
      }
      else{
        /*if ($password1 === $password2) {
					$password = sha1($password1); //ENCRYPTION
				}
		else { $errorMsg .= "Your passwords do not match. "; }*/
		$sql = "INSERT INTO users (email, name, password) VALUES ('$email', '$name', '$password')";
        /*$sql = "INSERT INTO users (email, password, name, street, city, state, zip, country, phone, cardnumber, privilege) VALUES ('$email', '$password', '$name', '$address', '$city', '$state', '$zip', '$country', '$phone', '$cardnumber', 'user')";*/
        mysqli_query($connection, $sql);
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
  <title>Cleaning Scents Company - Create Account</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/favicon.ico" />
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
    <div class="nav-wrapper container80"><a id="logo-container" href="home.php" class="brand-logo"><img class="responsive-img pad-extra" alt="logo" src="img/wordmark.png" <img style="width:378x; height:68px;"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home.php">HOME</a></li>
        <li><a href="catalog.php">SHOP</a></li>
        <li><a href="client.php">PROFILE</a></li>
        <li><a href="cart.php"><i class="material-icons"><i class="material-icons">shopping_cart</i></i></a></li>
        <li><a href="#"><a id="toggle-search" href="#!"><i class="material-icons"><i class="large mdi-action-search">search</i></i></a></a></li>
        <li><a href="login.php">LOGIN</a></li>

      </ul>
		
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
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
      <h3 class="header center indigo-text text-lighten-3">Register Account</h3>
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
                  <input id="password2" type="password" class="validate" name="password2" maxlength="20" value="<?php echo $password2; ?>"><span class="error"><?php echo $passworderror;?></span>
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

			<div class="row">
                <div class="input-field col s8">
                  <input id="country" type="text" name="country" maxlength="40" value="<?php echo $country; ?>"><span class="error"><?php echo $nameerror;?></span>
                  <label for="country">Country</label>
                </div>

                <div class="input-field col s4">
                  <input id="phone" type="text" name="phone" size="15" maxlength="13" value="<?php echo $phone; ?>"><span class="error"><?php echo $nameerror;?></span>
                  <label for="phone">Phone Number</label>
                </div>
			</div>
				
			<div class="row">
				<div class="input-field col s12">
                  <input id="cardnumber" type="password" name="cardnumber" size="15" maxlength="16" value="<?php echo $cardnumber; ?>"><span class="error"><?php echo $nameerror;?></span>
                  <label for=cardnumber">Credit Card Number</label>
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
