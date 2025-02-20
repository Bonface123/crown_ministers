<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get all team members from the database
$sql = "SELECT * FROM team";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$team_members = $stmt->fetchAll();

// Include the header
include('includes/header2.php');
?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Manage Choir Members</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="team.php">Team</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Manage Choir Members</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Manage Team Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Team</p>
            <h1 class="display-3">Manage Choir Members</h1>
        </div>
        <div class="mb-4 text-center">
            <a href="add_member.php" class="btn btn-primary">Add New Member</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($team_members as $member): ?>
                        <tr>
                            <td><?= htmlspecialchars($member['name']) ?></td>
                            <td><?= htmlspecialchars($member['role']) ?></td>
                            <td>
                                <?php if ($member['image']): ?>
                                    <img src="<?= htmlspecialchars($member['image']) ?>" alt="Image" width="80">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td><?= nl2br(htmlspecialchars($member['description'])) ?></td>
                            <td>
                                <a href="edit_member.php?id=<?= $member['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="delete_member.php?id=<?= $member['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Manage Team Section End -->

<?php include('includes/footer2.php'); ?>
