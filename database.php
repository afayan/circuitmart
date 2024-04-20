<?php


$servername = "localhost";
$username = "root"; //MySQL username
$password = "rollsroyce"; //MySQL password
$database = "elec"; //database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn) {
    echo "Connected";
}



?>
