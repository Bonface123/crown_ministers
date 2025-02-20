<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete event from the database
    $sql = "DELETE FROM events WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$id])) {
        $message = "Event deleted successfully.";
    } else {
        $message = "Failed to delete event.";
    }
} else {
    $message = "Event ID not provided!";
}

include('includes/header2.php');
?>
<!-- Delete Event Result Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <div class="alert alert-info text-center">
             <?= htmlspecialchars($message) ?>
         </div>
         <div class="text-center mt-4">
              <a href="events.php" class="btn btn-primary">Return to Manage Events</a>
         </div>
    </div>
</div>
<?php include('includes/footer2.php'); ?>
