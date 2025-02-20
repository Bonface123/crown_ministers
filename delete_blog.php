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

    // Delete blog from the database
    $sql = "DELETE FROM blogs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$id])) {
        $message = "Blog deleted successfully.";
    } else {
        $message = "Failed to delete blog.";
    }
} else {
    $message = "Blog ID not provided!";
}

include('includes/header2.php');
?>
<!-- Delete Blog Result Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <div class="alert alert-info text-center">
             <?= htmlspecialchars($message) ?>
         </div>
         <div class="text-center mt-4">
              <a href="blog.php" class="btn btn-primary">Return to Manage Blogs</a>
         </div>
    </div>
</div>
<?php include('includes/footer2.php'); ?>
