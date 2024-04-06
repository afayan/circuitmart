<?php


$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "rollsroyce"; // Your MySQL password
$database = "elec"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn) {
    echo "Connected";
}



?>