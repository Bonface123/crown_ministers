<?php
// donate.php

include('includes/db_connect.php');
session_start();

$success = '';
$error = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_name     = trim($_POST['donor_name']);
    $amount         = trim($_POST['amount']);
    $payment_method = trim($_POST['payment_method']);
    $notes          = trim($_POST['notes']);

    // Validate required fields
    if (empty($donor_name) || empty($amount) || empty($payment_method)) {
        $error = "Please fill in all required fields.";
    } else {
        // Set current datetime for donation_date
        $donation_date = date("Y-m-d H:i:s");
        
        // Insert donation into the donations table
        $sql  = "INSERT INTO donations (donor_name, amount, donation_date, payment_method, notes) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$donor_name, $amount, $donation_date, $payment_method, $notes])) {
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
        /* Donation Impact Section Styles */
        #donation-impact {
            background: #f8f9fa;
            padding: 50px 0;
        }
        #donation-impact h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        #donation-impact .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }
        #donation-impact .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        #donation-impact .card-body {
            padding: 20px;
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let slides = [
                {
                    image: "img/choir8.jpg",
                    subtitle: "Support Our Mission",
                    title: "Your Donation Matters",
                    buttonText: "Donate Now",
                    buttonLink: "#donation-form"
                }
                // You can add more slides if needed
            ];
            
            let heroSection = document.querySelector("#hero-donate");
            let subtitleElement = document.getElementById("hero-subtitle");
            let titleElement = document.getElementById("hero-title");
            let buttonElement = document.getElementById("hero-btn");

            let index = 0;

            function changeSlide() {
                heroSection.style.background = `url("${slides[index].image}") center center no-repeat`;
                heroSection.style.backgroundSize = "cover";

                // Fade out content before changing it
                document.getElementById("hero-content").style.opacity = 0;

                setTimeout(() => {
                    subtitleElement.textContent = slides[index].subtitle;
                    titleElement.textContent = slides[index].title;
                    buttonElement.textContent = slides[index].buttonText;
                    buttonElement.href = slides[index].buttonLink;

                    // Fade in new content
                    document.getElementById("hero-content").style.opacity = 1;

                    index = (index + 1) % slides.length;
                }, 500);
            }
            // If more than one slide exists, set interval
            if(slides.length > 1) {
                setInterval(changeSlide, 5000);
            }
        });
    </script>

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
                        <li><strong>Bank Name:</strong> XYZ Bank</li>
                        <li><strong>Account Number:</strong> 123456789</li>
                        <li><strong>Account Name:</strong> Crown Ministers Choir</li>
                    </ul>
                    <h5 class="text-primary mt-4">Mobile Payment (Mpesa)</h5>
                    <p>You can also send your donation via Mpesa to the following details:</p>
                    <ul>
                        <li><strong>Paybill:</strong> 123456</li>
                        <li><strong>Account Number:</strong> Your Phone Number</li>
                    </ul>
                    <p class="text-muted mt-3">
                        After sending your donation, please reply to our SMS or contact us with your transaction details for confirmation.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Payment Details Section End -->

    <!-- Donation Impact Section Start -->
    <section id="donation-impact" class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center mb-5">Your Donation in Action</h2>
            <div class="row g-4">
                <!-- Impact Card 1 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="img/instrument.png" class="card-img-top" alt="New Instruments">
                        <div class="card-body">
                            <h5 class="card-title">New Instruments</h5>
                            <p class="card-text">Donations have enabled us to purchase new instruments, enhancing our musical performance.</p>
                        </div>
                    </div>
                </div>
                <!-- Impact Card 2 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="img/event.jpg" class="card-img-top" alt="Community Event">
                        <div class="card-body">
                            <h5 class="card-title">Community Outreach</h5>
                            <p class="card-text">Your contributions help us host community events that inspire and uplift local neighborhoods.</p>
                        </div>
                    </div>
                </div>
                <!-- Impact Card 3 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="img/recording.jpg" class="card-img-top" alt="Music Recording">
                        <div class="card-body">
                            <h5 class="card-title">Music Recording</h5>
                            <p class="card-text">Recent donations have supported our latest music recordings, enabling us to share our message worldwide.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary">Learn More About Our Impact</a>
            </div>
        </div>
    </section>
    <!-- Donation Impact Section End -->

<?php include('includes/footer.php'); ?>
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
