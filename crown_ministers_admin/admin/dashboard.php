<?php
// Include database connection and session start
include('../includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch admin information (optional)
$admin_id = $_SESSION['admin_id'];
$sql = "SELECT * FROM admins WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$admin_id]);
$admin = $stmt->fetch();

// Include the header
include '../includes/header2.php';
?>

<div class="dashboard-container">
    <h2>Welcome, <?php echo htmlspecialchars($admin['username']); ?>!</h2>
    <p>Choose an option below to manage your site content:</p>

    <ul>
        <li><a href="events.php">Manage Events</a></li>
        <li><a href="team.php">Manage Choir Team</a></li>
        <li><a href="youtube.php">Manage YouTube Songs</a></li>
        <li><a href="blog.php">Manage Blogs</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<?php include '../includes/footer.php'; ?>
