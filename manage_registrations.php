<?php
include('includes/db_connect.php');
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Toggle registration status (approved/pending)
if (isset($_GET['toggle_id'])) {
    $registration_id = $_GET['toggle_id'];

    // Get current status
    $sql = "SELECT status FROM event_registrations WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$registration_id]);
    $registration = $stmt->fetch();

    // Toggle status
    $new_status = ($registration['status'] == 'approved') ? 'pending' : 'approved';

    // Update status in the database
    $update_sql = "UPDATE event_registrations SET status = ? WHERE id = ?";
    $stmt = $pdo->prepare($update_sql);
    $stmt->execute([$new_status, $registration_id]);

    header('Location: manage_registrations.php');
    exit();
}

// Fetch all registrations with event details
$sql = "SELECT r.*, e.event_name FROM event_registrations r
        JOIN events e ON r.event_id = e.id
        ORDER BY r.created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$registrations = $stmt->fetchAll();
?>

<?php include 'includes/header2.php'; ?>

<!-- Hero Section -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Manage Registrations</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="manage_registrations.php">Registrations</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Manage Registrations</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Section End -->

<!-- Manage Registrations Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Registrations</p>
            <h1 class="display-3">Manage Registrations</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registrations as $registration): ?>
                            <tr>
                                <td><?= htmlspecialchars($registration['event_name']) ?></td>
                                <td><?= htmlspecialchars($registration['name']) ?></td>
                                <td><?= htmlspecialchars($registration['email']) ?></td>
                                <td><?= htmlspecialchars($registration['phone']) ?></td>
                                <td><?= htmlspecialchars($registration['message'] ?? 'N/A') ?></td>
                                <td><?= htmlspecialchars($registration['status']) ?></td>
                                <td>
                                    <a href="manage_registrations.php?toggle_id=<?= $registration['id'] ?>" class="btn btn-warning">
                                        <?= ($registration['status'] == 'approved') ? 'Mark Pending' : 'Approve' ?>
                                    </a>
                                    <a href="edit_registration.php?id=<?= $registration['id'] ?>" class="btn btn-info">Edit</a>
                                    <a href="delete_registration.php?id=<?= $registration['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this registration?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($registrations)): ?>
                            <tr>
                                <td colspan="7" class="text-center">No registrations found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Manage Registrations Section End -->

<?php include 'includes/footer2.php'; ?>
