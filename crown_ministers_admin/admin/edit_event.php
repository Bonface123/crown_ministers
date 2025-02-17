<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch event details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->execute([$id]);
    $event = $stmt->fetch();

    if (!$event) {
        echo "Event not found!";
        exit();
    }
} else {
    header('Location: events.php');
    exit();
}

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];
    $status = $_POST['status'];

    $sql = "UPDATE events SET event_name = ?, event_date = ?, event_description = ?, status = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$event_name, $event_date, $event_description, $status, $id]);

    header('Location: events.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Event</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <h2>Edit Event</h2>

    <form method="POST">
        <label>Event Name:</label>
        <input type="text" name="event_name" value="<?= htmlspecialchars($event['event_name']) ?>" required>

        <label>Event Date:</label>
        <input type="date" name="event_date" value="<?= htmlspecialchars($event['event_date']) ?>" required>

        <label>Event Description:</label>
        <textarea name="event_description" required><?= htmlspecialchars($event['event_description']) ?></textarea>

        <label>Status:</label>
        <select name="status">
            <option value="active" <?= ($event['status'] == 'active') ? 'selected' : '' ?>>Active</option>
            <option value="inactive" <?= ($event['status'] == 'inactive') ? 'selected' : '' ?>>Inactive</option>
        </select>

        <button type="submit">Update Event</button>
    </form>

    <a href="events.php">Back to Events</a>
</body>

</html>
