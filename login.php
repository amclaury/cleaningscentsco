<?php
    session_start();
    include("db_connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $password = sha1($password);

        $sql = "SELECT * FROM users WHERE name='" . $name . "' AND password='".$password."' LIMIT 1";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_row($result);
          $_SESSION['logged_in'] = TRUE;
          $_SESSION['logged_in_user'] = $name;
        }
      }
    if(isset($_SESSION["logged_in"])){
      header("Location: client.php");
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Cleaning Scents Company - Login</title>

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

  <nav class="cyan accent-4">
    <div class="nav-wrapper container80"><a id="logo-container" href="home.php" class="brand-logo"><img class="responsive-img pad-extra" alt="logo" src="img/wordmark.png" height="50" width="250"></a>
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
  
        <div class="container">
      <br><br>
        <h3 class="header indigo-text text-lighten-3">Login</h3>
		
		      <div class="row">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-content-xvx">
                    <div class="row">
    <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="row">
        <div class="input-field col s12">
          <input id="name" type="text" class="validate" name="name">
          <label for="name">Username</label>
        </div>
      </div>

        <div class="row">
          <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
      </div>
  </div>
            </div>
		      <button class="btn waves-effect waves-light indigo lighten-3 right" type="submit" name="submit">Login
            </button>
			</form>
				
		  <div class="col s5">
          <p>Don't have an account? <a href="createaccount.php">Register here</a>.</p>
      </div>				
          </div>
		  
        </div>
      </div>
		</div>
  </div>
		<br><br>
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
            <li><a class="white-text" href="#!">Contact</a></li>
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
  <script src="js/init.js">
  </script>

  
</body>
</html>
