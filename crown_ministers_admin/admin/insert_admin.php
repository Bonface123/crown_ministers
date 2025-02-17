<?php
// Include the database connection file
include('../includes/db_connect.php');

// Admin details (change these to your actual desired admin credentials)
$username = 'Bonface2';
$password = 'Bonface321'; // Plain text password

// Hash the password before storing it
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL query to insert the admin user into the database
$sql = "INSERT INTO admins (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($sql);

// Bind parameters and execute the statement
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $hashed_password);

if ($stmt->execute()) {
    echo 'Admin user inserted successfully!';
} else {
    echo 'Error inserting admin user.';
}
?>
