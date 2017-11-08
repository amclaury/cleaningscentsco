<?php
$servername = "sulley.cah.ucf.edu";
$username = "dig4530c_group06";
$password = "knights4321!";

// Create connection
$connection = new mysqli($servername, $username, $password, $username);		//mysqli(host, user, pw, database)

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    exit();
} 
//echo "Connected successfully";
?>