<?php
// user_management.php
include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch all admin users from the admins table
$sql = "SELECT * FROM admins";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

include('includes/header2.php');
?>
<!-- Hero Section -->
<div class="container-fluid hero-header">
    <div class="container">
         <div class="row">
              <div class="col-lg-7">
                   <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Manage Users</h1>
                        <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Manage Users</li>
                        </ol>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- User Management Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <h2 class="mb-4 text-center">Users</h2>
         <div class="mb-4 text-center">
              <a href="add_user.php" class="btn btn-primary">Add New User</a>
         </div>
         <div class="table-responsive">
              <table class="table table-bordered">
                   <thead>
                        <tr>
                             <th>ID</th>
                             <th>Username</th>
                             <th>Role</th>
                             <th>Action</th>
                        </tr>
                   </thead>
                   <tbody>
                        <?php if(count($users) > 0): ?>
                             <?php foreach($users as $user): ?>
                                  <tr>
                                       <td><?= htmlspecialchars($user['id']) ?></td>
                                       <td><?= htmlspecialchars($user['username']) ?></td>
                                       <td><?= htmlspecialchars($user['role']) ?></td>
                                       <td>
                                            <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                       </td>
                                  </tr>
                             <?php endforeach; ?>
                        <?php else: ?>
                             <tr>
                                  <td colspan="4" class="text-center">No users found.</td>
                             </tr>
                        <?php endif; ?>
                   </tbody>
              </table>
         </div>
    </div>
</div>
<?php include('includes/footer2.php'); ?>
