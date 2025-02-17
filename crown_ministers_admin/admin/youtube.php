<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get all songs from the database, including the description
$sql = "SELECT * FROM youtube_songs"; // Fetch the 'description' field as well
$stmt = $pdo->prepare($sql);
$stmt->execute();
$songs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Songs</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Manage Songs</h2>
    <a href="add_song.php">Add New Song</a>
    <table>
        <thead>
            <tr>
                <th>Song Title</th>
                <th>YouTube URL</th>
                <th>Description</th> <!-- Added column for the song description -->
                <th>Uploaded On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($songs as $song): ?>
                <tr>
                    <td><?= htmlspecialchars($song['song_name']) ?></td>
                    <td>
                        <a href="<?= htmlspecialchars($song['youtube_url']) ?>" target="_blank">View on YouTube</a>
                    </td>
                    <td><?= htmlspecialchars($song['description']) ?></td> <!-- Display the description -->
                    <td><?= htmlspecialchars($song['uploaded_on']) ?></td>
                    <td>
                        <!-- View Song Details -->
                        <a href="view_song.php?id=<?= $song['id'] ?>">View Details</a> |
                        
                        <!-- Edit Song -->
                        <a href="edit_song.php?id=<?= $song['id'] ?>">Edit</a> |
                        
                        <!-- Delete Song -->
                        <a href="delete_song.php?id=<?= $song['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
