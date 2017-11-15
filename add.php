<?php
//create new account

$pic = basename($_FILES['uploadedfile']['name']);
$name = ($_POST['Name']);
$price = ($_POST['Price']);
$description = ($_POST['description']);



$connection = mysqli_connect("localhost" , "dig4530c_group06" , "knights4321!", "dig4530c_group06") or die(mysql_error());  //(host,username,password,DB name) Connects to mysql server. Throws error if it cannot connect. 
$sql = "SELECT * FROM products WHERE product_img_name='".$pic."' LIMIT 1"; //LIMIT 1 makes sure we only draw one row from the database
$result = mysqli_query($connection, $sql); 
if (mysqli_num_rows($result) == 1){ 		//The number of rows contained in the result of the query that was just run.. equals 1, meaning that something was found. Remember, we limited it to 1, so it can't be above 1, but it can be 0 (not found)
		echo 'Please rename your image';

		die(mysql_error());
	}else{
		
$sql = "
INSERT INTO  products (product_img_name,product_name,price,product_desc) VALUES('$pic','$name','$price','$description')"; //Inserts data into the db, users2 table. Values correspond to fields

mysqli_query($connection, $sql); //(connection variable, query variable)
header('Refresh:5; url=http://sulley.cah.ucf.edu/~dig4530c_group06/office.php');
}
?>