<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get event ID from query parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete event from the database
    $sql = "DELETE FROM events WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: events.php');
    exit();
} else {
    echo 'Event ID not provided!';
}
?>
