<?php
include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Check if the donation ID is provided
if (!isset($_GET['id'])) {
    die("Donation ID is missing.");
}

$donation_id = $_GET['id'];

// Attempt to delete the donation record
$sql = "DELETE FROM donations WHERE id = ?";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([$donation_id]);

include('includes/header2.php');
?>

<!-- Delete Donation Result Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <?php if ($result): ?>
              <div class="alert alert-success text-center">
                   Donation deleted successfully.
              </div>
         <?php else: ?>
              <div class="alert alert-danger text-center">
                   Failed to delete donation.
              </div>
         <?php endif; ?>
         <div class="text-center mt-4">
              <a href="donations.php" class="btn btn-primary">Back to Donations</a>
         </div>
    </div>
</div>

<?php include('includes/footer2.php'); ?>
