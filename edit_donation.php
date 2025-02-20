<?php
// edit_donation.php

include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Check if the donation ID is provided
if (!isset($_GET['id'])) {
    die('Donation ID is missing');
}

$donation_id = $_GET['id'];

// Fetch donation details from the database
$sql = "SELECT * FROM donations WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$donation_id]);
$donation = $stmt->fetch();

if (!$donation) {
    die('Donation not found');
}

// Handle form submission for updating donation details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure all required fields are present
    if (isset($_POST['donor_name']) && isset($_POST['amount']) && isset($_POST['donation_date']) && isset($_POST['payment_method'])) {
        $donor_name    = trim($_POST['donor_name']);
        $amount        = trim($_POST['amount']);
        $donation_date = trim($_POST['donation_date']);
        $payment_method= trim($_POST['payment_method']);
        $notes         = isset($_POST['notes']) ? trim($_POST['notes']) : '';

        // Update donation details in the database
        $sql = "UPDATE donations SET donor_name = ?, amount = ?, donation_date = ?, payment_method = ?, notes = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$donor_name, $amount, $donation_date, $payment_method, $notes, $donation_id]);

        header('Location: donations.php');
        exit();
    } else {
        $error = "Please fill out all required fields.";
    }
}

include('includes/header2.php');
?>

<!-- Hero Section -->
<div class="container-fluid hero-header">
    <div class="container">
         <div class="row">
              <div class="col-lg-7">
                   <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Edit Donation</h1>
                        <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                             <li class="breadcrumb-item"><a href="donations.php">Donations</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Edit Donation</li>
                        </ol>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Edit Donation Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <div class="row justify-content-center">
              <div class="col-md-8">
                   <div class="card shadow-sm">
                        <div class="card-body">
                             <h2 class="card-title text-center mb-4">Edit Donation</h2>
                             <?php if (isset($error)): ?>
                                  <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                             <?php endif; ?>
                             <form method="POST">
                                  <div class="mb-3">
                                       <label for="donor_name" class="form-label">Donor Name</label>
                                       <input type="text" name="donor_name" id="donor_name" class="form-control" value="<?= htmlspecialchars($donation['donor_name']) ?>" required>
                                  </div>
                                  <div class="mb-3">
                                       <label for="amount" class="form-label">Amount</label>
                                       <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="<?= htmlspecialchars($donation['amount']) ?>" required>
                                  </div>
                                  <div class="mb-3">
                                       <label for="donation_date" class="form-label">Donation Date</label>
                                       <input type="date" name="donation_date" id="donation_date" class="form-control" value="<?= htmlspecialchars(date('Y-m-d', strtotime($donation['donation_date']))) ?>" required>
                                  </div>
                                  <div class="mb-3">
                                       <label for="payment_method" class="form-label">Payment Method</label>
                                       <input type="text" name="payment_method" id="payment_method" class="form-control" value="<?= htmlspecialchars($donation['payment_method']) ?>" required>
                                  </div>
                                  <div class="mb-3">
                                       <label for="notes" class="form-label">Notes (optional)</label>
                                       <textarea name="notes" id="notes" class="form-control"><?= htmlspecialchars($donation['notes']) ?></textarea>
                                  </div>
                                  <div class="text-center">
                                       <button type="submit" class="btn btn-primary">Update Donation</button>
                                  </div>
                             </form>
                        </div>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Edit Donation Section -->

<?php include('includes/footer2.php'); ?>
