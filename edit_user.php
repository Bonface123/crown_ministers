<?php
include('includes/db_connect.php');
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Check if user id is provided via GET
if (!isset($_GET['id'])) {
    die("User ID is missing.");
}

$user_id = $_GET['id'];

// Fetch user details from admins table
$sql = "SELECT * FROM admins WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    die("User not found.");
}

$error = '';
$success = '';

// Process form submission for updating user details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $role = trim($_POST['role']);
    
    // New password fields (optional)
    $new_password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    // Validate username and role
    if (empty($username) || empty($role)) {
        $error = "Username and Role are required.";
    } else {
        // If a new password is provided, validate the match
        if (!empty($new_password)) {
            if ($new_password !== $confirm_password) {
                $error = "New password and confirm password do not match.";
            } else {
                // Hash the new password and update all fields
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $sql = "UPDATE admins SET username = ?, role = ?, password = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([$username, $role, $hashed_password, $user_id]);
            }
        } else {
            // No new password provided; update username and role only
            $sql = "UPDATE admins SET username = ?, role = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([$username, $role, $user_id]);
        }
        
        if (isset($result) && $result) {
            $success = "User updated successfully.";
            // Update session username if current user is being edited
            if ($user_id == $_SESSION['admin_id']) {
                $_SESSION['username'] = $username;
            }
            // Reload user record
            $sql = "SELECT * FROM admins WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);
            $user = $stmt->fetch();
        } else {
            $error = "Failed to update user.";
        }
    }
}

include('includes/header2.php');
?>
<!-- Hero Section -->
<div class="container-fluid hero-header">
    <div class="container">
         <div class="row">
              <div class="col-lg-7">
                   <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Edit User</h1>
                        <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                             <li class="breadcrumb-item"><a href="user_management.php">Manage Users</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Edit User</li>
                        </ol>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Edit User Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <div class="row justify-content-center">
              <div class="col-md-8">
                   <div class="card shadow-sm">
                        <div class="card-body">
                             <h2 class="card-title text-center mb-4">Edit User Details</h2>
                             <?php if (!empty($error)): ?>
                                  <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                             <?php endif; ?>
                             <?php if (!empty($success)): ?>
                                  <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                             <?php endif; ?>
                             <form method="POST">
                                  <div class="mb-3">
                                       <label for="username" class="form-label">Username</label>
                                       <input type="text" name="username" id="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
                                  </div>
                                  <div class="mb-3">
                                       <label for="role" class="form-label">User Role</label>
                                       <select name="role" id="role" class="form-control" required>
                                            <option value="">Select User Role</option>
                                            <option value="Super Admin" <?= ($user['role'] == 'Super Admin') ? 'selected' : '' ?>>Super Admin</option>
                                            <option value="Manager" <?= ($user['role'] == 'Manager') ? 'selected' : '' ?>>Manager</option>
                                            <option value="Editor" <?= ($user['role'] == 'Editor') ? 'selected' : '' ?>>Editor</option>
                                       </select>
                                  </div>
                                  <div class="mb-3">
                                       <label for="password" class="form-label">New Password (leave blank to keep current password)</label>
                                       <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
                                  </div>
                                  <div class="mb-3">
                                       <label for="confirm_password" class="form-label">Confirm New Password</label>
                                       <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm new password">
                                  </div>
                                  <div class="text-center">
                                       <button type="submit" class="btn btn-primary">Update User</button>
                                  </div>
                             </form>
                             <!-- Navigation Link -->
                             <div class="text-center mt-3">
                                  <a href="user_management.php" class="btn btn-secondary">Back to Manage Users</a>
                             </div>
                        </div>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Edit User Section -->

<?php include('includes/footer2.php'); ?>
