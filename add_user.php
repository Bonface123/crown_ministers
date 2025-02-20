<?php
// add_user.php

include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check that all required fields are set
    if (isset($_POST['username'], $_POST['password'], $_POST['confirm_password'], $_POST['role'])) {
        $username         = trim($_POST['username']);
        $password         = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);
        $role             = trim($_POST['role']);

        // Validate that password fields match
        if ($password !== $confirm_password) {
            $error = "Passwords do not match.";
        } else {
            // Ensure that required fields are not empty
            if (empty($username) || empty($password) || empty($role)) {
                $error = "Please fill in all required fields.";
            } else {
                // Hash the password before storing it
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert the new user into the admins table, including the role column.
                $sql  = "INSERT INTO admins (username, password, role) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([$username, $hashed_password, $role]);

                if ($result) {
                    header("Location: user_management.php");
                    exit();
                } else {
                    $error = "There was an error adding the user.";
                }
            }
        }
    } else {
        $error = "Please fill in all required fields.";
    }
}

include('includes/header2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
</head>
<body>
    <!-- Hero Section -->
    <div class="container-fluid hero-header">
        <div class="container">
             <div class="row">
                  <div class="col-lg-7">
                       <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Add New User</h1>
                            <ol class="breadcrumb mb-0">
                                 <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                 <li class="breadcrumb-item"><a href="user_management.php">Manage Users</a></li>
                                 <li class="breadcrumb-item text-dark" aria-current="page">Add New User</li>
                            </ol>
                       </div>
                  </div>
             </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Add User Section -->
    <div class="container-fluid activities py-5">
        <div class="container py-5">
             <div class="row justify-content-center">
                  <div class="col-md-8">
                       <div class="card shadow-sm">
                            <div class="card-body">
                                 <h2 class="card-title text-center mb-4">Add New User</h2>
                                 <?php if (isset($error)): ?>
                                     <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                                 <?php endif; ?>
                                 <form method="POST">
                                      <div class="mb-3">
                                           <label for="username" class="form-label">Username</label>
                                           <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required>
                                      </div>
                                      <div class="mb-3">
                                           <label for="password" class="form-label">Password</label>
                                           <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                                      </div>
                                      <div class="mb-3">
                                           <label for="confirm_password" class="form-label">Confirm Password</label>
                                           <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password" required>
                                      </div>
                                      <div class="mb-3">
                                           <label for="role" class="form-label">User Role</label>
                                           <select name="role" id="role" class="form-control" required>
                                                <option value="">Select User Role</option>
                                                <option value="Super Admin">Super Admin</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Editor">Editor</option>
                                           </select>
                                      </div>
                                      <div class="text-center">
                                           <button type="submit" class="btn btn-primary">Add User</button>
                                      </div>
                                 </form>
                            </div>
                       </div>
                  </div>
             </div>
        </div>
    </div>
    <!-- End Add User Section -->

<?php include('includes/footer2.php'); ?>
</body>
</html>
