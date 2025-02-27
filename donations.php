<?php
// donations.php
include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch all donations
$sql = "SELECT * FROM donations ORDER BY donation_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$donations = $stmt->fetchAll();

// Calculate total donations
$totalDonation = 0;
foreach ($donations as $donation) {
    $totalDonation += (float)$donation['amount'];
}

include('includes/header2.php');
?>
<!-- Hero Section -->
<div class="container-fluid hero-header">
    <div class="container">
         <div class="row">
              <div class="col-lg-7">
                   <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Manage Donations</h1>
                        <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Manage Donations</li>
                        </ol>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Donations Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <h2 class="mb-4 text-center">Donations</h2>
         <div class="mb-4 text-center">
              <a href="add_donation.php" class="btn btn-primary">Add New Donation</a>
         </div>
         <div class="table-responsive">
              <table class="table table-bordered table-striped">
                   <thead>
                        <tr>
                             <th>Donor Name</th>
                             <th>Phone</th>
                             <th>Amount</th>
                             <th>Date & Time</th>
                             <th>Payment Method</th>
                             <th>Mpesa Code</th>
                             <th>Status</th>
                             <th>Notes</th>
                             <th>Action</th>
                        </tr>
                   </thead>
                   <tbody>
                        <?php if(count($donations) > 0): ?>
                             <?php foreach($donations as $donation): ?>
                                  <tr>
                                       <td><?= htmlspecialchars($donation['donor_name']) ?></td>
                                       <td><?= htmlspecialchars($donation['phone']) ?></td>
                                       <td><?= number_format($donation['amount'], 2) ?></td>
                                       <td><?= date("Y-m-d H:i", strtotime($donation['donation_date'])) ?></td>
                                       <td><?= htmlspecialchars($donation['payment_method']) ?></td>
                                       <td><?= htmlspecialchars($donation['mpesa_code'] ?: 'N/A') ?></td>
                                       <td>
                                            <span class="badge <?= $donation['status'] == 'Completed' ? 'bg-success' : 'bg-warning' ?>">
                                                 <?= htmlspecialchars($donation['status']) ?>
                                            </span>
                                       </td>
                                       <td><?= htmlspecialchars($donation['notes']) ?></td>
                                       <td>
                                            <a href="edit_donation.php?id=<?= $donation['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="delete_donation.php?id=<?= $donation['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this donation?')">Delete</a>
                                       </td>
                                  </tr>
                             <?php endforeach; ?>
                             <tr>
                                  <td colspan="9" class="text-end">
                                       <strong>Total Donations: </strong> KSh <?= number_format($totalDonation, 2) ?>
                                  </td>
                             </tr>
                        <?php else: ?>
                             <tr>
                                  <td colspan="9" class="text-center">No donations found.</td>
                             </tr>
                        <?php endif; ?>
                   </tbody>
              </table>
         </div>
    </div>
</div>
<?php include('includes/footer2.php'); ?>
