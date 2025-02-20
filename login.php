<?php
// login.php

include('includes/db_connect.php');
session_start();

// If already logged in, redirect based on role
if (isset($_SESSION['admin_id'])) {
    if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['Super Admin', 'Manager', 'Editor'])) {
        header('Location: dashboard.php');
    } else {
        header('Location: user_dashboard.php');
    }
    exit();
}

// Optionally, check for an existing "remember me" cookie and log in automatically
if (isset($_COOKIE['admin_id']) && !isset($_SESSION['admin_id'])) {
    $_SESSION['admin_id'] = $_COOKIE['admin_id'];
    // Validate the cookie value against the database (optional for extra security)
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE id = ?");
    $stmt->execute([$_COOKIE['admin_id']]);
    $admin = $stmt->fetch();
    if ($admin) {
        $_SESSION['role'] = $admin['role'];
        if (in_array($admin['role'], ['Super Admin', 'Manager', 'Editor'])) {
            header('Location: dashboard.php');
        } else {
            header('Location: user_dashboard.php');
        }
        exit();
    }
}

$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = 'Both fields are required.';
    } else {
        try {
            // Retrieve user details
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->execute([$username]);
            $admin = $stmt->fetch();

            // Verify user exists and password is correct
            if ($admin && password_verify($password, $admin['password'])) {
                // Regenerate session ID for security
                session_regenerate_id(true);
                
                // Set session variables
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['username'] = $admin['username'];
                $_SESSION['role'] = $admin['role'];

                // If "Remember Me" is checked, set a cookie for 7 days
                if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
                    setcookie('admin_id', $admin['id'], time() + (7 * 24 * 60 * 60), "/");
                }

                // Redirect based on user role
                if (in_array($admin['role'], ['Super Admin', 'Manager', 'Editor'])) {
                    header('Location: dashboard.php');
                } else {
                    header('Location: user_dashboard.php');
                }
                exit();
            } else {
                $error = 'Invalid username or password.';
            }
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    }
}
?>
<?php include('includes/header2.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- You can include additional CSS links or inline styles here -->
</head>
<body>
    <!-- Hero Section Start -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Login</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">Login</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Logout Confirmation Message -->
    <?php if (isset($_GET['logout']) && $_GET['logout'] == 'success'): ?>
        <div class="container py-3">
            <div class="alert alert-success text-center">
                You have been logged out successfully.
            </div>
        </div>
    <?php endif; ?>

    <!-- Login Form Start -->
    <div class="container-fluid login-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container bg-light p-4 shadow-sm">
                        <h2 class="text-center mb-4">Login</h2>
                        <?php if (!empty($error)): ?>
                            <p class="error text-danger text-center"><?= htmlspecialchars($error); ?></p>
                        <?php endif; ?>
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input">
                                <label for="remember_me" class="form-check-label">Remember Me</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form End -->
    <?php include('includes/footer2.php'); ?>
</body>
</html>
