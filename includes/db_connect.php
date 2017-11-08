<?php
$servername = "sulley.cah.ucf.edu";
$username = "dig4530c_group06";
$password = "knights4321!";

// Create connection
$conn = new mysqli($servername, $username, $password, $username);		//mysqli(host, user, pw, database)

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
} 
//echo "Connected successfully";
?>