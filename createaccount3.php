<?php session_start(); ?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Create an Account</title>
	<link rel="icon" type="image/png" href="http://sulley.cah.ucf.edu/~ro842686/globaltreehouse/images/tree.png">
	<link href="css/reset.css" rel="stylesheet" type="text/css">
	<link href="css/universal.css" rel="stylesheet" type="text/css">
	<link href="css/story-blocks.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Shadows+Into+Light" rel="stylesheet">
	<style>
	input {
		margin-bottom: 10px;
		margin-left: 10px;
	}
	#form {
		display: block;
		width: 40%;
		margin: auto;
	}
	</style>
	
</head>

<body>
	<div id="header">
	<header>
	<h1>The Global Treehouse</h1>
	<ul id="navbar">
				<li><a href="index.php">HOME</a></li>	
				<li><a href="about.html">ABOUT</a></li>

	
				<li><a href="fileuploadform.html">SHARE YOUR STORY</a></li>

	
	</ul>
	</header></div><br><br>	
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
	<?php
		if (isset($_POST["crtacct"])) {
			$name = $_POST['name'];
			$country = $_POST['country'];
			$email = $_POST['email'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$street = $_POST['street'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			$phone = $_POST['phone'];
			$cardnumber = $_POST['cardnumber'];
			$password; //HOLDS ENCRYPTED PASSWORD ONCE PASSWORDS ARE CONFIRMED AS EQUIVALENT
			
			$errorMsg = "";
			
			
			// VALIDATION
			
			if (!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-z.]{2,5}/", $email)) {
					$errorMsg .= "Your email is incorrect.";
				}
				
			if ($password1 === $password2) {
					$password = sha1($password1); //ENCRYPTION
					$cardnumber = sha1($cardnumber);
				}
			else { $errorMsg .= "Your passwords do not match. "; }
			
			// CREATE ACCOUNT OR ECHO ERRORS
			
			if ($errorMsg != "") {
				$_SESSION['log'] = "out";
				echo ("<p>". $errorMsg. "</p>");
			}
			else {
				echo "<p>You have successfully created an account, ".$name.". You will be redirected to the story upload page in 5 seconds.</p>";
				$connection = mysqli_connect("localhost", "dig4530c_group06", "knights4321!", "dig4530c_group06") or die (mysql_error());
				$sql = "INSERT INTO  users (email, name, password, street, city, state, zip, country, phone, cardnumber) VALUES('$email','$name','$password','$street','$city','$state','$zip','$country','$phone','$cardnumber')";
				$result = mysqli_query($connection, $sql);
				
				$_SESSION['log'] = "on";
				$_SESSION['user'] = $name;
				
				header('Refresh: 5; url = fileuploadform.html');
			}
		}
	?>
		</div>
	</form>	
	
	<br>


</body>
</html>