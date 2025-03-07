<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$success_message = ""; // Initialize success message
$error = ""; // Initialize error message

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name        = $_POST['event_name'];
    $event_date        = $_POST['event_date'];
    $event_time        = $_POST['event_time'];
    $event_description = $_POST['event_description'];
    $file_name         = NULL; // Default value for event image

    // Check if an image was uploaded
    if (!empty($_FILES['event_image']['name']) && $_FILES['event_image']['error'] == 0) {
        $upload_dir  = "uploads/";
        $file_name   = basename($_FILES['event_image']['name']);
        $upload_file = $upload_dir . $file_name;

        // Validate file type (JPEG, PNG, GIF allowed)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['event_image']['type'], $allowed_types)) {
            if (!move_uploaded_file($_FILES['event_image']['tmp_name'], $upload_file)) {
                $error = "Error uploading file.";
            }
        } else {
            $error = "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        }
    }

    if (empty($error)) {
        // Insert event into the database
        $sql  = "INSERT INTO events (event_name, event_date, event_time, event_description, event_image, status) 
                 VALUES (?, ?, ?, ?, ?, 'active')";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$event_name, $event_date, $event_time, $event_description, $file_name])) {
            $success_message = "Event added successfully!";
        } else {
            $error = "Error adding event. Please try again.";
        }
    }
}

include('includes/header2.php');
?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Add New Event</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="events.php">Events</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Add New Event</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Add Event Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Add New Event</h2>
                        
                        <!-- Success Message -->
                        <?php if (!empty($success_message)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= htmlspecialchars($success_message) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Error Message -->
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= htmlspecialchars($error) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="add_event.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="event_name" class="form-label">Event Name:</label>
                                <input type="text" name="event_name" class="form-control" placeholder="Event Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="event_date" class="form-label">Event Date:</label>
                                <input type="date" name="event_date" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="event_time" class="form-label">Event Time:</label>
                                <input type="time" name="event_time" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="event_description" class="form-label">Event Description:</label>
                                <textarea name="event_description" class="form-control" placeholder="Event Description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="event_image" class="form-label">Event Image (Optional):</label>
                                <input type="file" name="event_image" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Event Section End -->

<?php include('includes/footer2.php'); ?>
