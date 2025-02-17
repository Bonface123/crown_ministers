<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get member ID from query parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete member from the database
    $sql = "DELETE FROM team WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: team.php');
    exit();
} else {
    echo 'Member ID not provided!';
}
?>
