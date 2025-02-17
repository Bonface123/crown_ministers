<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get blog ID from query parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete blog from the database
    $sql = "DELETE FROM blogs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: blog.php');
    exit();
} else {
    echo 'Blog ID not provided!';
}
?>
