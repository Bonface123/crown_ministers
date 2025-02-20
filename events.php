<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Toggle event status (active/inactive)
if (isset($_GET['toggle_id'])) {
    $event_id = $_GET['toggle_id'];

    // Get current status
    $sql = "SELECT status FROM events WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$event_id]);
    $event = $stmt->fetch();

    // Toggle status
    $new_status = ($event['status'] == 'active') ? 'inactive' : 'active';

    // Update status in the database
    $update_sql = "UPDATE events SET status = ? WHERE id = ?";
    $stmt = $pdo->prepare($update_sql);
    $stmt->execute([$new_status, $event_id]);

    header('Location: events.php');
    exit();
}

// Get all events
$sql = "SELECT * FROM events";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll();
?>

<?php include 'includes/header2.php'; ?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Manage Events</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="events.php">Events</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Manage Events</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Manage Events Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Events</p>
            <h1 class="display-3">Manage Events</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="add_event.php" class="btn btn-primary mb-3">Add New Event</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Event Image</th>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event): ?>
                            <tr>
                                <td>
                                    <?php if ($event['event_image']): ?>
                                        <img src="../uploads/<?= htmlspecialchars($event['event_image']) ?>" alt="<?= htmlspecialchars($event['event_name']) ?>" width="100">
                                    <?php else: ?>
                                        No Image
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($event['event_name']) ?></td>
                                <td><?= htmlspecialchars($event['event_date']) ?></td>
                                <td><?= htmlspecialchars($event['event_description']) ?></td>
                                <td><?= htmlspecialchars($event['status']) ?></td>
                                <td>
                                    <a href="events.php?toggle_id=<?= $event['id'] ?>" class="btn btn-warning">
                                        <?= ($event['status'] == 'active') ? 'Deactivate' : 'Activate' ?>
                                    </a>
                                    <a href="edit_event.php?id=<?= $event['id'] ?>" class="btn btn-info">Edit</a>
                                    <a href="delete_event.php?id=<?= $event['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Manage Events Section End -->

<?php include 'includes/footer2.php'; ?>
