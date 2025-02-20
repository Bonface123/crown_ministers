<?php
// delete_user.php

include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Check if the user ID is provided
if (!isset($_GET['id'])) {
    die("User ID is missing.");
}

$user_id = $_GET['id'];

// Prevent deletion of currently logged in admin
if ($user_id == $_SESSION['admin_id']) {
    $error = "You cannot delete your own account.";
    include('includes/header2.php');
    ?>
    <div class="container-fluid activities py-5">
        <div class="container py-5">
            <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
            <div class="text-center mt-4">
                <a href="user_management.php" class="btn btn-primary">Back to Manage Users</a>
            </div>
        </div>
    </div>
    <?php
    include('includes/footer.php');
    exit();
}

// Attempt to delete the user from the admins table
$sql = "DELETE FROM admins WHERE id = ?";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([$user_id]);

include('includes/header2.php');
?>
<!-- Delete User Result Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <?php if ($result): ?>
            <div class="alert alert-success text-center">
                User deleted successfully.
            </div>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Failed to delete user.
            </div>
        <?php endif; ?>
        <div class="text-center mt-4">
            <a href="user_management.php" class="btn btn-primary">Back to Manage Users</a>
        </div>
    </div>
</div>
<?php include('includes/footer2.php'); ?>
