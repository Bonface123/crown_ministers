<?php
// add_donation.php

include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure all required fields are set
    if (isset($_POST['donor_name']) && isset($_POST['amount']) && isset($_POST['donation_date']) && isset($_POST['payment_method'])) {
        $donor_name    = trim($_POST['donor_name']);
        $amount        = trim($_POST['amount']);
        
        // Convert datetime-local value (e.g., "2025-02-19T15:30") to MySQL datetime format ("2025-02-19 15:30:00")
        $donation_date_raw = trim($_POST['donation_date']);
        $donation_date = str_replace('T', ' ', $donation_date_raw) . ":00";
        
        $payment_method= trim($_POST['payment_method']);
        $notes         = isset($_POST['notes']) ? trim($_POST['notes']) : '';

        // Insert the donation into the donations table
        $sql  = "INSERT INTO donations (donor_name, amount, donation_date, payment_method, notes) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$donor_name, $amount, $donation_date, $payment_method, $notes]);

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
                        <h1 class="display-1 text-dark">Add Donation</h1>
                        <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                             <li class="breadcrumb-item"><a href="donations.php">Donations</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Add Donation</li>
                        </ol>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Add Donation Form -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <div class="row justify-content-center">
              <div class="col-md-8">
                   <div class="card shadow-sm">
                        <div class="card-body">
                             <h2 class="card-title text-center mb-4">Add New Donation</h2>
                             <?php if (isset($error)): ?>
                                 <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                             <?php endif; ?>
                             <form method="POST">
                                  <div class="mb-3">
                                       <label for="donor_name" class="form-label">Donor Name</label>
                                       <input type="text" name="donor_name" id="donor_name" class="form-control" placeholder="Enter donor name" required>
                                  </div>
                                  <div class="mb-3">
                                       <label for="amount" class="form-label">Amount</label>
                                       <input type="number" step="0.01" name="amount" id="amount" class="form-control" placeholder="Enter amount" required>
                                  </div>
                                  <div class="mb-3">
                                       <label for="donation_date" class="form-label">Donation Date & Time</label>
                                       <input type="datetime-local" name="donation_date" id="donation_date" class="form-control" required>
                                  </div>
                                  <div class="mb-3">
                                       <label for="payment_method" class="form-label">Payment Method</label>
                                       <select name="payment_method" id="payment_method" class="form-control" required>
                                           <option value="">Select Payment Method</option>
                                           <option value="Cash">Cash</option>
                                           <option value="Credit Card">Credit Card</option>
                                           <option value="Bank Transfer">Bank Transfer</option>
                                           <option value="Mobile Payment">Mobile Payment (Mpesa)</option>
                                       </select>
                                  </div>
                                  <div class="mb-3">
                                       <label for="notes" class="form-label">Notes (optional)</label>
                                       <textarea name="notes" id="notes" class="form-control" placeholder="Additional notes"></textarea>
                                  </div>
                                  <div class="text-center">
                                       <button type="submit" class="btn btn-primary">Add Donation</button>
                                  </div>
                             </form>
                        </div>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Add Donation Section -->

<?php include('includes/footer.php'); ?>
