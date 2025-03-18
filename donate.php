<?php
include('includes/db_connect.php');
session_start();

$success = '';
$error = '';
$amount = '0.00'; // Default value

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_name     = trim($_POST['donor_name'] ?? '');
    $phone          = trim($_POST['phone'] ?? '');
    $amount         = trim($_POST['amount'] ?? '');
    $payment_method = trim($_POST['payment_method'] ?? '');
    $mpesa_code     = trim($_POST['mpesa_code'] ?? ''); // Ensure key exists
    $notes          = trim($_POST['notes'] ?? ''); // Ensure key exists

    // Validate required fields
    if (empty($donor_name) || empty($phone) || empty($amount) || empty($payment_method)) {
        $error = "Please fill in all required fields.";
    } else {
        $donation_date = date("Y-m-d H:i:s");

        // Insert donation into the database
        try {
            $sql  = "INSERT INTO donations (donor_name, phone, amount, donation_date, payment_method, notes) 
                     VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute([$donor_name, $phone, $amount, $donation_date, $payment_method, $notes])) {
                $success = "Thank you for your donation! Please follow the payment instructions below to complete your donation.";
            } else {
                $error = "There was an error processing your donation. Please try again.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
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
</head>
<body>

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
                                <option value="Mpesa">Mpesa</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary py-2 px-4">Proceed to Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Donation Form Section End -->

    <!-- Payment Details Section Start -->
    <section id="payment-details" class="container py-5">
        <h2 class="text-center mb-4">Payment Instructions</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="payment-container">
                    <h2>Total Due</h2>
                    <h1>Ksh <?= htmlspecialchars($amount ?? '0.00'); ?></h1>

                    <label for="payment-method">Payment Method:</label>
                    <select id="payment-method" class="input-field">
                        <option>Pay via Mpesa</option>
                    </select>

                    <p>Enter your M-PESA number below to receive a prompt on your phone</p>
                    <input type="tel" id="mpesa-phone" class="input-field" placeholder="2547XXXXXXXX" value="254729820689">

                    <button class="btn" onclick="sendPaymentRequest()">Send Payment Request</button>

                    <p class="highlight">Enter business no: 400200</p>
                    <p class="highlight">Enter account no: 860234</p>
                    <p class="highlight">Enter amount: <?= htmlspecialchars($amount ?? '0.00'); ?> KES</p>

                    <a href="#" class="download-link">Download Receipt</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Payment Details Section End -->

    <script>
        function sendPaymentRequest() {
            let phoneNumber = document.getElementById("mpesa-phone").value;
            let amount = <?= json_encode($amount ?? '0.00') ?>;
            
            if (phoneNumber.length < 10) {
                alert("Please enter a valid phone number!");
            } else {
                alert("Payment request for Ksh " + amount + " sent to " + phoneNumber);
            }
        }
    </script>

    <?php include('includes/footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
