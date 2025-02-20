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

    // Delete song from the database
    $sql = "DELETE FROM youtube_songs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$id])) {
        $message = 'Song deleted successfully.';
    } else {
        $message = 'Failed to delete the song.';
    }
} else {
    $message = 'Song ID not provided!';
}

include('includes/header2.php');
?>
<!-- Delete Song Result Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <div class="alert alert-info text-center">
             <?= htmlspecialchars($message) ?>
         </div>
         <div class="text-center mt-4">
              <a href="youtube.php" class="btn btn-primary">Return to Manage Songs</a>
         </div>
    </div>
</div>
<?php include('includes/footer2.php'); ?>
