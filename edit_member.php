<?php
include('includes/db_connect.php');
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch member details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM team WHERE id = ?");
    $stmt->execute([$id]);
    $member = $stmt->fetch();

    if (!$member) {
        echo "Member not found!";
        exit();
    }
} else {
    header('Location: manage_team.php');
    exit();
}

// Available roles for dropdown
$roles = ['Choir Leader', 'Singer', 'Musician', 'Backup Singer'];

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $description = $_POST['description'];

    // Handle image update if uploaded
    $image = $member['image']; // Keep existing image by default
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    // Update member details in the database
    $sql = "UPDATE team SET name = ?, role = ?, image = ?, description = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $role, $image, $description, $id]);

    header('Location: team.php');
    exit();
}

include 'includes/header.php';
?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Edit Team Member</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="team.php">Team</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Edit Member</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Edit Team Member Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Edit Team Member</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($member['name']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role:</label>
                                <select name="role" class="form-select" required>
                                    <?php foreach ($roles as $r): ?>
                                        <option value="<?= htmlspecialchars($r) ?>" <?= $member['role'] == $r ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($r) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Current Image:</label><br>
                                <?php if ($member['image']): ?>
                                    <img src="<?= htmlspecialchars($member['image']) ?>" alt="Image" width="100">
                                <?php else: ?>
                                    No image available
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Change Image:</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea name="description" class="form-control" required><?= htmlspecialchars($member['description']) ?></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Member</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Team Member Section End -->

<?php include 'includes/footer2.php'; ?>
