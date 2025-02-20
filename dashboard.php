<?php
// dashboard.php

include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch admin information
$admin_id = $_SESSION['admin_id'];
$sql = "SELECT * FROM admins WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$admin_id]);
$admin = $stmt->fetch();

// Fetch summary metrics
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM blogs");
$totalBlogs = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $pdo->query("SELECT COUNT(*) AS total FROM events");
$totalEvents = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $pdo->query("SELECT COUNT(*) AS total FROM team");
$totalTeam = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $pdo->query("SELECT COUNT(*) AS total FROM youtube_songs");
$totalSongs = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $pdo->query("SELECT COUNT(*) AS total FROM admins");
$totalUsers = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $pdo->query("SELECT COUNT(*) AS total FROM donations");
$totalDonations = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $pdo->query("SELECT SUM(amount) AS sum FROM donations");
$totalDonationAmount = $stmt->fetch(PDO::FETCH_ASSOC)['sum'];
$totalDonationAmount = $totalDonationAmount ? $totalDonationAmount : 0;

include('includes/header2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- You may include additional CSS files or inline styles here -->
</head>
<body>
    <!-- Hero Section -->
    <div class="container-fluid hero-header">
        <div class="container">
             <div class="row">
                  <div class="col-lg-7">
                       <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Welcome, <?php echo htmlspecialchars($admin['username']); ?>!</h1>
                            <ol class="breadcrumb mb-0">
                                 <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                 <li class="breadcrumb-item text-dark" aria-current="page">Admin Dashboard</li>
                            </ol>
                       </div>
                  </div>
             </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Admin Guidelines Section -->
    <div class="container-fluid guidelines py-5">
        <div class="container">
            <div class="card bg-light p-4 mb-5 shadow-sm">
                <h3 class="mb-3">Admin Guidelines</h3>
                <p>Welcome to your admin dashboard! Here you can get an overview of your site's performance as well as manage various content areas. Below is a summary of what each section represents:</p>
                <ul>
                    <li><strong>Total Blogs:</strong> The number of blog posts published on the site.</li>
                    <li><strong>Total Events:</strong> The number of events listed in the system.</li>
                    <li><strong>Total Team Members:</strong> The count of individuals in your choir or team.</li>
                    <li><strong>Total Songs:</strong> The number of YouTube songs currently managed.</li>
                    <li><strong>Total Users:</strong> The total number of admin accounts registered.</li>
                    <li><strong>Total Donations:</strong> The number of donation records.</li>
                    <li><strong>Total Donation Amount:</strong> The cumulative amount donated (displayed in your site's currency).</li>
                </ul>
                <p>Use the navigation options below to manage each area of your site. If you require further assistance, please refer to the admin manual or contact support. When finished, use the "Logout" link to exit your session securely.</p>
            </div>
        </div>
    </div>
    <!-- End Admin Guidelines Section -->

    <!-- Summary Section -->
    <div class="container-fluid activities py-5">
        <div class="container py-5">
             <div class="row g-4">
                  <div class="col-md-4 text-center">
                       <div class="card shadow-sm">
                            <div class="card-body">
                                 <h5 class="card-title">Total Blogs</h5>
                                 <p class="card-text display-4"><?php echo htmlspecialchars($totalBlogs); ?></p>
                            </div>
                       </div>
                  </div>
                  <div class="col-md-4 text-center">
                       <div class="card shadow-sm">
                            <div class="card-body">
                                 <h5 class="card-title">Total Events</h5>
                                 <p class="card-text display-4"><?php echo htmlspecialchars($totalEvents); ?></p>
                            </div>
                       </div>
                  </div>
                  <div class="col-md-4 text-center">
                       <div class="card shadow-sm">
                            <div class="card-body">
                                 <h5 class="card-title">Total Team Members</h5>
                                 <p class="card-text display-4"><?php echo htmlspecialchars($totalTeam); ?></p>
                            </div>
                       </div>
                  </div>
             </div>
             <div class="row g-4 mt-4">
                  <div class="col-md-4 text-center">
                       <div class="card shadow-sm">
                            <div class="card-body">
                                 <h5 class="card-title">Total Songs</h5>
                                 <p class="card-text display-4"><?php echo htmlspecialchars($totalSongs); ?></p>
                            </div>
                       </div>
                  </div>
                  <div class="col-md-4 text-center">
                       <div class="card shadow-sm">
                            <div class="card-body">
                                 <h5 class="card-title">Total Users</h5>
                                 <p class="card-text display-4"><?php echo htmlspecialchars($totalUsers); ?></p>
                            </div>
                       </div>
                  </div>
                  <div class="col-md-4 text-center">
                       <div class="card shadow-sm">
                            <div class="card-body">
                                 <h5 class="card-title">Total Donations</h5>
                                 <p class="card-text display-4"><?php echo htmlspecialchars($totalDonations); ?></p>
                            </div>
                       </div>
                  </div>
             </div>
             <div class="row g-4 mt-4">
                  <div class="col-md-12 text-center">
                       <div class="card shadow-sm">
                            <div class="card-body">
                                 <h5 class="card-title">Total Donation Amount</h5>
                                 <p class="card-text display-4"><?php echo number_format($totalDonationAmount, 2); ?></p>
                            </div>
                       </div>
                  </div>
             </div>
        </div>
    </div>
    <!-- End Summary Section -->

    <head>
    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<!-- Navigation Section -->
<div class="container-fluid contact py-5">
    <div class="container py-5">

        <!-- Heading and Description -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Quick Links</h2>
            <p class="text-muted">
                Use the links below to manage and monitor various aspects of the system. From organizing events to handling donations, this dashboard provides quick access to all essential functionalities.
            </p>
        </div>

        <div class="row g-4 wow fadeIn" data-wow-delay="0.3s">

<!-- Manage Events -->
<div class="col-md-6 col-lg-4 text-center">
        <a href="events.php" class="btn btn-primary">
            <i class="fas fa-calendar-alt fa-3x mb-3"></i><br> Manage Events
        </a>
        <p class="mt-3 text-muted">Create, update, or delete upcoming events and keep the calendar organized.</p>
    </div>

    <!-- Manage Choir Team -->
    <div class="col-md-6 col-lg-4 text-center">
        <a href="team.php" class="btn btn-primary">
            <i class="fas fa-users fa-3x mb-3"></i><br> Manage Choir Team
        </a>
        <p class="mt-3 text-muted">Add, edit, or remove choir team members and manage their details.</p>
    </div>

    <!-- Manage YouTube Songs -->
    <div class="col-md-6 col-lg-4 text-center">
        <a href="youtube.php" class="btn btn-primary">
            <i class="fab fa-youtube fa-3x mb-3"></i><br> Manage YouTube Songs
        </a>
        <p class="mt-3 text-muted">Upload, update, or remove YouTube song links for public viewing.</p>
    </div>

    <!-- Manage Blogs -->
    <div class="col-md-6 col-lg-4 text-center">
        <a href="blog.php" class="btn btn-primary">
            <i class="fas fa-blog fa-3x mb-3"></i><br> Manage Blogs
        </a>
        <p class="mt-3 text-muted">Write, edit, and manage blog posts to share updates and stories.</p>
    </div>

    <!-- View System Reports -->
    <div class="col-md-6 col-lg-4 text-center">
        <a href="reports.php" class="btn btn-primary">
            <i class="fas fa-chart-line fa-3x mb-3"></i><br> View System Reports
        </a>
        <p class="mt-3 text-muted">Access and analyze system reports to track performance and data insights.</p>
    </div>

    <!-- Manage Donations -->
    <div class="col-md-6 col-lg-4 text-center">
        <a href="donations.php" class="btn btn-primary">
            <i class="fas fa-hand-holding-heart fa-3x mb-3"></i><br> Manage Donations
        </a>
        <p class="mt-3 text-muted">View and manage donations to ensure smooth contribution tracking.</p>
    </div>

    <!-- Manage Users -->
    <div class="col-md-6 col-lg-4 text-center">
        <a href="user_management.php" class="btn btn-primary">
            <i class="fas fa-user-cog fa-3x mb-3"></i><br> Manage Users
        </a>
        <p class="mt-3 text-muted">Add, modify, or remove user accounts and control system access.</p>
    </div>

    <!-- Logout -->
    <div class="col-md-6 col-lg-4 text-center">
        <a href="logout.php" class="btn btn-primary">
            <i class="fas fa-sign-out-alt fa-3x mb-3"></i><br> Logout
        </a>
        <p class="mt-3 text-muted">Sign out of the dashboard and end your current session securely.</p>
    </div>

        </div>
    </div>
</div>
<!-- End Navigation Section -->


<?php include('includes/footer2.php'); ?>
</body>
</html>
