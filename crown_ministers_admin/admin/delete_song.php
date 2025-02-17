<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get song ID from query parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete song from the database
    $sql = "DELETE FROM youtube_songs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: youtube.php');
    exit();
} else {
    echo 'Song ID not provided!';
}
?>
