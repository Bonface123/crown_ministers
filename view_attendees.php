<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get event ID from URL
if (!isset($_GET['event_id']) || empty($_GET['event_id'])) {
    header('Location: events.php');
    exit();
}

$event_id = $_GET['event_id'];

// Fetch event details
$sql = "SELECT * FROM events WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$event_id]);
$event = $stmt->fetch();

if (!$event) {
    header('Location: events.php');
    exit();
}

// ✅ Fetch `name`, `email`, `phone`, and `message`
$sql = "SELECT name, email, phone, message FROM event_registrations WHERE event_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$event_id]);
$attendees = $stmt->fetchAll();
?>

<?php include 'includes/header2.php'; ?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Event Attendees</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="events.php">Events</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page"><?= htmlspecialchars($event['event_name']) ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Attendees Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Event Attendees</p>
            <h1 class="display-3"><?= htmlspecialchars($event['event_name']) ?></h1>
            <p>Date: <?= htmlspecialchars($event['event_date']) ?></p>
            <p>Description: <?= htmlspecialchars($event['event_description']) ?></p>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="events.php" class="btn btn-secondary mb-3">Back to Events</a>
                <?php if (count($attendees) > 0): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th> <!-- ✅ Added Message Column -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($attendees as $attendee): ?>
                                <tr>
                                    <td><?= htmlspecialchars($attendee['name'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($attendee['email'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($attendee['phone'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($attendee['message'] ?? 'No message') ?></td> <!-- ✅ Display Message -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">No attendees registered for this event yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Attendees Section End -->

<?php include 'includes/footer2.php'; ?>
