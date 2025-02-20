<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'crown_ministers_db'; // Your database name
$username = 'root'; // Database username
$password = ''; // Database password (empty if using default XAMPP settings)

try {
    // Create a PDO instance and connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // In case of a connection failure
    die("Connection failed: " . $e->getMessage());
}
?>
