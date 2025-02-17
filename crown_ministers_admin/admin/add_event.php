<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];

    // Handle file upload
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] == 0) {
        // Set upload directory and file name
        $upload_dir = "../uploads/";
        $file_name = basename($_FILES['event_image']['name']);
        $upload_file = $upload_dir . $file_name;

        // Validate file type (e.g., image formats)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['event_image']['type'], $allowed_types)) {
            // Move uploaded file to the server
            if (move_uploaded_file($_FILES['event_image']['tmp_name'], $upload_file)) {
                // Insert event into the database with image path
                $sql = "INSERT INTO events (event_name, event_date, event_description, event_image, status) VALUES (?, ?, ?, ?, 'active')";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$event_name, $event_date, $event_description, $file_name]);

                // Redirect to the events page
                header('Location: events.php');
                exit();
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        }
    } else {
        echo "No image uploaded or error in the upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Event</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Add New Event</h2>
    <form method="POST" action="add_event.php" enctype="multipart/form-data">
        <input type="text" name="event_name" placeholder="Event Name" required>
        <input type="date" name="event_date" required>
        <textarea name="event_description" placeholder="Event Description" required></textarea>
        <input type="file" name="event_image" required>
        <button type="submit">Add Event</button>
    </form>
</body>
</html>
