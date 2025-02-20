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

    // Delete member from the database
    $sql = "DELETE FROM team WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$id])) {
        $message = 'Team member deleted successfully.';
    } else {
        $message = 'Failed to delete team member.';
    }
} else {
    $message = 'Member ID not provided!';
}

include('includes/header2.php');
?>

<!-- Delete Member Result Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <div class="alert alert-info text-center">
             <?= htmlspecialchars($message) ?>
         </div>
         <div class="text-center mt-4">
              <a href="team.php" class="btn btn-primary">Return to Manage Team</a>
         </div>
    </div>
</div>

<?php include('includes/footer2.php'); ?>
