<?php
$servername = "localhost"; // Change if using a remote server
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "crown_ministers"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character encoding (optional)
$conn->set_charset("utf8");
?>
