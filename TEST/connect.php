<?php
$currency = '&#8377; '; //Currency Character or code
$db_username = 'dig4530c_group06';
$db_password = 'knights4321!';
$db_name = 'dig4530c_group06';
$db_host = 'localhost';
$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5
                            );						
//connect to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>