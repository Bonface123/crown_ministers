<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get all songs from the database
$sql = "SELECT * FROM youtube_songs ORDER BY uploaded_on DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$songs = $stmt->fetchAll();

include 'includes/header2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Songs - Crown Ministers Choir</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Hero Section Start -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Manage Songs</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="youtube.php">YouTube Songs</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">Manage Songs</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Manage Songs Section Start -->
    <div class="container-fluid activities py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <p class="fs-5 text-uppercase text-primary">Songs</p>
                <h1 class="display-3">Manage YouTube Songs</h1>
            </div>
            <div class="mb-4 text-center">
                <a href="add_song.php" class="btn btn-primary">Add New Song</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Song Title</th>
                            <th>YouTube URL</th>
                            <th>Description</th>
                            <th>Uploaded On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($songs) > 0): ?>
                            <?php foreach ($songs as $song): ?>
                                <tr>
                                    <!-- Thumbnail: if a song cover exists use it; otherwise generate one from the YouTube URL -->
                                    <td>
                                        <?php 
                                        if (!empty($song['song_cover'])) {
                                            echo '<img src="../uploads/' . htmlspecialchars($song['song_cover']) . '" class="img-fluid" alt="Song Cover" style="max-width:100px;">';
                                        } else {
                                            // Extract video ID from YouTube URL
                                            $youtubeUrl = $song['youtube_url'];
                                            if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]+)/', $youtubeUrl, $matches)) {
                                                $videoId = $matches[1];
                                                $thumbnailUrl = "https://img.youtube.com/vi/$videoId/hqdefault.jpg";
                                            } else {
                                                $thumbnailUrl = "img/placeholder.jpg";
                                            }
                                            echo '<img src="' . htmlspecialchars($thumbnailUrl) . '" class="img-fluid" alt="Song Thumbnail" style="max-width:100px;">';
                                        }
                                        ?>
                                    </td>
                                    <!-- Song Title -->
                                    <td><?= htmlspecialchars($song['song_name']) ?></td>
                                    <!-- YouTube URL -->
                                    <td>
                                        <a href="<?= htmlspecialchars($song['youtube_url']) ?>" target="_blank">View on YouTube</a>
                                    </td>
                                    <!-- Song Description -->
                                    <td><?= htmlspecialchars($song['description']) ?></td>
                                    <!-- Uploaded On -->
                                    <td><?= htmlspecialchars($song['uploaded_on']) ?></td>
                                    <!-- Action Buttons -->
                                    <td>
                                        <a href="view_song.php?id=<?= $song['id'] ?>" class="btn btn-info btn-sm">View Details</a>
                                        <a href="edit_song.php?id=<?= $song['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="delete_song.php?id=<?= $song['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No songs found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Manage Songs Section End -->

<?php include('includes/footer2.php'); ?>
</body>
</html>
