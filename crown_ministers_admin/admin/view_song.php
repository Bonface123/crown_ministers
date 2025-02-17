<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Check if the song ID is provided
if (!isset($_GET['id'])) {
    die('Song ID is missing');
}

$song_id = $_GET['id'];

// Get song details from the database
$sql = "SELECT * FROM youtube_songs WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$song_id]);
$song = $stmt->fetch();

if (!$song) {
    die('Song not found');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Song Details</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Song Details</h2>
    <p><strong>Song Title:</strong> <?= htmlspecialchars($song['song_name']) ?></p>
    <p><strong>YouTube URL:</strong> <a href="<?= htmlspecialchars($song['youtube_url']) ?>" target="_blank"><?= htmlspecialchars($song['youtube_url']) ?></a></p>

    <!-- Embed YouTube Video -->
    <div>
        <h3>Video Preview</h3>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= parse_url($song['youtube_url'], PHP_URL_QUERY) ? parse_url($song['youtube_url'], PHP_URL_QUERY) : '' ?>" frameborder="0" allowfullscreen></iframe>
    </div>

    <p><a href="youtube.php">Back to Manage Songs</a></p>
</body>
</html>
