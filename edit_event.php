<?php
include('includes/db_connect.php');
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

include 'includes/header2.php';
?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
         <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Edit Event</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="events.php">Events</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Edit Event</li>
                    </ol>
                </div>
            </div>
         </div>
    </div>
</div>
<!-- Hero End -->

<!-- Edit Event Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card shadow-sm">
                      <div class="card-body">
                           <h2 class="card-title text-center mb-4">Edit Event</h2>
                           <form method="POST">
                                <div class="mb-3">
                                    <label for="event_name" class="form-label">Event Name:</label>
                                    <input type="text" name="event_name" class="form-control" value="<?= htmlspecialchars($event['event_name']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="event_date" class="form-label">Event Date:</label>
                                    <input type="date" name="event_date" class="form-control" value="<?= htmlspecialchars($event['event_date']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="event_description" class="form-label">Event Description:</label>
                                    <textarea name="event_description" class="form-control" required><?= htmlspecialchars($event['event_description']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status:</label>
                                    <select name="status" class="form-select">
                                        <option value="active" <?= ($event['status'] == 'active') ? 'selected' : '' ?>>Active</option>
                                        <option value="inactive" <?= ($event['status'] == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update Event</button>
                                </div>
                           </form>
                           <div class="text-center mt-3">
                              <a href="events.php" class="btn btn-secondary">Back to Events</a>
                           </div>
                      </div>
                  </div>
              </div>
         </div>
    </div>
</div>
<!-- Edit Event Section End -->

<?php include 'includes/footer2.php'; ?>
