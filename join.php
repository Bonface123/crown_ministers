<?php
// Include required files
require_once 'includes/db_connect.php';


// Start the session for CSRF protection
session_start();
require_once 'includes/header.php';

// Generate CSRF token if not set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Initialize variables
$success = $error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $event_id  = htmlspecialchars($_POST['event_id']);
    $name      = htmlspecialchars(trim($_POST['name']));
    $email     = htmlspecialchars(trim($_POST['email']));
    $phone     = htmlspecialchars(trim($_POST['phone']));
    $message   = htmlspecialchars(trim($_POST['message'] ?? ""));
    $csrf_token = $_POST['csrf_token'];

    // Validation checks
    if (empty($event_id) || empty($name) || empty($email) || empty($phone)) {
        $error = "All required fields must be filled.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (!preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
        $error = "Invalid phone number format.";
    } elseif ($csrf_token !== $_SESSION['csrf_token']) {
        $error = "CSRF token mismatch. Please try again.";
    } else {
        // Check if the event exists
        $stmt = $pdo->prepare("SELECT id FROM events WHERE id = :event_id");
        $stmt->execute([':event_id' => $event_id]);
        $event = $stmt->fetch();

        if (!$event) {
            $error = "The selected event does not exist.";
        } else {
            try {
                // Insert registration data
                $stmt = $pdo->prepare("INSERT INTO event_registrations (event_id, name, email, phone, message) 
                                       VALUES (:event_id, :name, :email, :phone, :message)");
                $stmt->execute([
                    ':event_id' => $event_id,
                    ':name'     => $name,
                    ':email'    => $email,
                    ':phone'    => $phone,
                    ':message'  => $message
                ]);
                $success = "Thank you! You have successfully registered for the event.";
            } catch (PDOException $e) {
                $error = "Database error: " . htmlspecialchars($e->getMessage());
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Join Event | Choir Events</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>new WOW().init();</script>
</head>

<body>

<!-- Hero Section Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Join Our Event</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="events.php">Events</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Join Event</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Section End -->

<!-- Event Registration Form -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Success & Error Messages -->
            <?php if (!empty($success)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
            <?php elseif (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="join.php" method="POST" class="p-5 bg-light shadow rounded wow fadeIn" data-wow-delay="0.2s">

                <!-- Hidden Event ID -->
                <input type="hidden" name="event_id" value="<?= isset($_GET['event_id']) ? htmlspecialchars($_GET['event_id']) : '' ?>">

                <!-- CSRF Token -->
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

                <!-- Full Name -->
                <div class="mb-4">
                    <label for="name" class="form-label fw-bold">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your full name">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email">
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <label for="phone" class="form-label fw-bold">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="form-control" required placeholder="Enter your phone number">
                </div>

                <!-- Additional Message -->
                <div class="mb-4">
                    <label for="message" class="form-label fw-bold">Message (Optional)</label>
                    <textarea id="message" name="message" rows="4" class="form-control" placeholder="Any additional comments"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Register Now</button>
            </form>

            <!-- Back to Events Link -->
            <div class="text-center mt-4">
                <a href="event.php" class="btn btn-outline-primary">Back to Events</a>
            </div>

        </div>
    </div>
</div>

<!-- Donation Call-to-Action -->
<div class="container-fluid bg-primary text-white py-5 wow fadeIn" data-wow-delay="0.3s">
    <div class="row g-4 align-items-center text-center">
        <div class="col-lg-2">
            <i class="fas fa-hand-holding-heart fa-5x"></i>
        </div>
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="mb-0">Support Our Choir</h1>
            <p class="mb-0">Your generous donations empower us to share the joy of music and faith.</p>
        </div>
        <div class="col-lg-3">
            <a href="donate.php" class="btn btn-light py-2 px-4">Donate Now</a>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

</body>

</html>
