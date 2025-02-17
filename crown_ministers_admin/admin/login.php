<?php
// Include the database connection file
include('../includes/db_connect.php');

// Start the session to manage login status
session_start();

// Check if the admin is already logged in and redirect to the dashboard if true
if (isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Basic validation for empty fields
    if (empty($username) || empty($password)) {
        $error = 'Both fields are required.';
    } else {
        // Prepare and execute the query to check if the admin exists
        $sql = "SELECT * FROM admins WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);

        // Fetch the admin record
        $admin = $stmt->fetch();

        // Debugging: Check if admin record is fetched
        if (!$admin) {
            echo "No admin found with that username.";
        }

        // Debugging: Output the fetched admin for verification
        var_dump($admin); 

        // Verify the password using password_verify (use hashed passwords)
        if ($admin && password_verify($password, $admin['password'])) {
            // If login is successful, set session variables
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];

            // Redirect to the dashboard
            header('Location: dashboard.php');
            exit();
        } else {
            // If login fails, show an error message
            $error = 'Invalid username or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Include your CSS file -->
</head>
<body>

<div class="login-container">
    <h2>Admin Login</h2>

    <?php if (isset($error)) { echo '<p class="error">'.$error.'</p>'; } ?>

    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
