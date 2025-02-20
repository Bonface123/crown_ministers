<?php
include('../includes/db_connect.php');
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

<!DOCTYPE html>
<html lang="en">


<?php include '../includes/header.php'; ?>

<body>
    <h2>Manage Events</h2>
    <a href="add_event.php">Add New Event</a>

    <table border="1">
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
                    <!-- Display event image -->
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
                        <a href="events.php?toggle_id=<?= $event['id'] ?>">
                            <?= ($event['status'] == 'active') ? 'Deactivate' : 'Activate' ?>
                        </a> |
                        <a href="edit_event.php?id=<?= $event['id'] ?>">Edit</a> |
                        <a href="delete_event.php?id=<?= $event['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<?php include '../includes/footer.php'; ?>
