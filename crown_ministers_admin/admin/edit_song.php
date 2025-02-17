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

// Handle form submission for editing song details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $song_name = $_POST['song_name'];
    $youtube_url = $_POST['youtube_url'];
    $description = $_POST['description']; // Get the new description

    // Update song details in the database
    $sql = "UPDATE youtube_songs SET song_name = ?, youtube_url = ?, description = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$song_name, $youtube_url, $description, $song_id]);

    header('Location: youtube.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Edit Song Details</h2>
    <form method="POST">
        <label for="song_name">Song Title</label>
        <input type="text" name="song_name" id="song_name" value="<?= htmlspecialchars($song['song_name']) ?>" required>

        <label for="youtube_url">YouTube URL</label>
        <input type="url" name="youtube_url" id="youtube_url" value="<?= htmlspecialchars($song['youtube_url']) ?>" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4" required><?= htmlspecialchars($song['description']) ?></textarea> <!-- New description field -->

        <button type="submit">Update Song</button>
    </form>

    <p><a href="youtube.php">Back to Manage Songs</a></p>
</body>
</html>
