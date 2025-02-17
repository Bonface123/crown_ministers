<?php
// Start session and destroy it to log out
session_start();
session_destroy();

// Redirect to login page
header('Location: login.php');
exit();
