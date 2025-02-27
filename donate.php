<?php
// donate.php

include('includes/db_connect.php');
session_start();

$success = '';
$error = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_name     = trim($_POST['donor_name']);
    $phone          = trim($_POST['phone']);
    $amount         = trim($_POST['amount']);
    $payment_method = trim($_POST['payment_method']);
    $mpesa_code     = trim($_POST['mpesa_code']);
    $notes          = trim($_POST['notes']);

    // Validate required fields
    if (empty($donor_name) || empty($phone) || empty($amount) || empty($payment_method)) {
        $error = "Please fill in all required fields.";
    } else {
        // Set current datetime for donation_date
        $donation_date = date("Y-m-d H:i:s");

        // Insert donation into the donations table
        $sql  = "INSERT INTO donations (donor_name, phone, amount, donation_date, payment_method, mpesa_code, notes, status) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$donor_name, $phone, $amount, $donation_date, $payment_method, $mpesa_code, $notes])) {
            $success = "Thank you for your donation! Please follow the payment instructions below to complete your donation.";
        } else {
            $error = "There was an error processing your donation. Please try again.";
        }
    }
}

include('includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donate - Crown Ministers Choir</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Custom styles for the donation page */
        #hero-donate {
            background: url('img/choir8.jpg') center center no-repeat;
            background-size: cover;
            position: relative;
        }
        #hero-donate .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255,255,255,0.7);
        }
    </style>
</head>
<body>
    <!-- Hero Section Start -->
    <section id="hero-donate" class="container-fluid hero-header">
        <div class="overlay"></div>
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn" id="hero-content">
                        <p class="fs-4 text-dark" id="hero-subtitle">Support Our Mission</p>
                        <h1 class="display-1 mb-5 text-dark" id="hero-title">Your Donation Matters</h1>
                        <a href="#donation-form" class="btn btn-primary py-3 px-5" id="hero-btn">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Donation Form Section Start -->
    <section id="donation-form" class="container py-5">
        <h2 class="text-center mb-4">Make a Donation</h2>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success text-center"><?= htmlspecialchars($success); ?></div>
        <?php elseif (!empty($error)): ?>
            <div class="alert alert-danger text-center"><?= htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm p-4">
                    <form action="donate.php" method="POST">
                        <div class="mb-3">
                            <label for="donor_name" class="form-label">Donor Name <span class="text-danger">*</span></label>
                            <input type="text" name="donor_name" id="donor_name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="amount" id="amount" class="form-control" placeholder="Enter donation amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method <span class="text-danger">*</span></label>
                            <select name="payment_method" id="payment_method" class="form-control" required>
                                <option value="">Select Payment Method</option>
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Mobile Payment">Mobile Payment (Mpesa)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="mpesa_code" class="form-label">Mpesa Transaction Code (If applicable)</label>
                            <input type="text" name="mpesa_code" id="mpesa_code" class="form-control" placeholder="Enter Mpesa code if paid via Mpesa">
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Additional Comments (Optional)</label>
                            <textarea name="notes" id="notes" class="form-control" placeholder="Your message or comments"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary py-2 px-4">Donate Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Donation Form Section End -->

    <!-- Payment Details Section Start -->
    <section id="payment-details" class="container py-5">
        <h2 class="text-center mb-4">Payment Details</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm p-4">
                    <h5 class="text-primary">Bank Transfer</h5>
                    <p>Please transfer your donation to the following bank account:</p>
                    <ul>
                        <li><strong>Bank Name:</strong> KCB Bank</li>
                        <li><strong>Account Number:</strong> 123456789</li>
                        <li><strong>Account Name:</strong> Crown Ministers Choir</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Payment Details Section End -->

<?php include('includes/footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
