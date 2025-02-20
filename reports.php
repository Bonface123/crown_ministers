<?php
// reports.php
include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Gather summary reports
$report = [];

// Count Blogs
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM blogs");
$report['blogs'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count Events
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM events");
$report['events'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count Team Members
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM team");
$report['team'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count YouTube Songs
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM youtube_songs");
$report['youtube_songs'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count Media Items
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM media");
$report['media'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count Users (Admins)
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM admins");
$report['users'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count Donations
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM donations");
$report['donations'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Calculate Total Donation Amount
$stmt = $pdo->query("SELECT SUM(amount) AS total FROM donations");
$donationSum = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
$report['donations_sum'] = $donationSum ? $donationSum : 0;

include('includes/header2.php');
?>
<!-- Hero Section -->
<div class="container-fluid hero-header">
    <div class="container">
         <div class="row">
              <div class="col-lg-7">
                   <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">System Reports</h1>
                        <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">System Reports</li>
                        </ol>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Reports Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <h2 class="mb-4 text-center">System Reports</h2>
         <!-- Row 1: Blogs, Events, Team Members -->
         <div class="row">
              <div class="col-md-4">
                   <div class="card text-center mb-4">
                        <div class="card-body">
                             <h5 class="card-title">Total Blogs</h5>
                             <p class="card-text display-4"><?= htmlspecialchars($report['blogs']) ?></p>
                        </div>
                   </div>
              </div>
              <div class="col-md-4">
                   <div class="card text-center mb-4">
                        <div class="card-body">
                             <h5 class="card-title">Total Events</h5>
                             <p class="card-text display-4"><?= htmlspecialchars($report['events']) ?></p>
                        </div>
                   </div>
              </div>
              <div class="col-md-4">
                   <div class="card text-center mb-4">
                        <div class="card-body">
                             <h5 class="card-title">Total Team Members</h5>
                             <p class="card-text display-4"><?= htmlspecialchars($report['team']) ?></p>
                        </div>
                   </div>
              </div>
         </div>
         <!-- Row 2: YouTube Songs, Media Items -->
         <div class="row">
              <div class="col-md-6">
                   <div class="card text-center mb-4">
                        <div class="card-body">
                             <h5 class="card-title">Total YouTube Songs</h5>
                             <p class="card-text display-4"><?= htmlspecialchars($report['youtube_songs']) ?></p>
                        </div>
                   </div>
              </div>
              <div class="col-md-6">
                   <div class="card text-center mb-4">
                        <div class="card-body">
                             <h5 class="card-title">Total Media Items</h5>
                             <p class="card-text display-4"><?= htmlspecialchars($report['media']) ?></p>
                        </div>
                   </div>
              </div>
         </div>
         <!-- Row 3: Users, Donations, Total Donation Amount -->
         <div class="row">
              <div class="col-md-4">
                   <div class="card text-center mb-4">
                        <div class="card-body">
                             <h5 class="card-title">Total Users</h5>
                             <p class="card-text display-4"><?= htmlspecialchars($report['users']) ?></p>
                        </div>
                   </div>
              </div>
              <div class="col-md-4">
                   <div class="card text-center mb-4">
                        <div class="card-body">
                             <h5 class="card-title">Total Donations</h5>
                             <p class="card-text display-4"><?= htmlspecialchars($report['donations']) ?></p>
                        </div>
                   </div>
              </div>
              <div class="col-md-4">
                   <div class="card text-center mb-4">
                        <div class="card-body">
                             <h5 class="card-title">Total Donation Amount</h5>
                             <p class="card-text display-4"><?= number_format($report['donations_sum'], 2) ?></p>
                        </div>
                   </div>
              </div>
         </div>
    </div>
</div>
<?php include('includes/footer2.php'); ?>
