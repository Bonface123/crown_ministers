<?php
session_start();
session_destroy();

// Redirect to login page with a logout confirmation parameter
header("Location: login.php?logout=success");
exit();
?>
