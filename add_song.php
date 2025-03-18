<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$error = '';

// Function to extract video ID from different YouTube URL formats
function extractYouTubeID($url) {
    if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return $matches[1]; // Shareable URL format
    } elseif (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return $matches[1]; // Embedded URL format
    } elseif (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return $matches[1]; // Standard YouTube URL
    } elseif (preg_match('/src="https:\/\/www\.youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return $matches[1]; // Extract from iframe
    }
    return null; // Invalid URL
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['song_name'], $_POST['youtube_url'], $_POST['description'])) {
        $song_name   = trim($_POST['song_name']);
        $youtube_url = trim($_POST['youtube_url']);
        $description = trim($_POST['description']);

        // Extract the video ID
        $video_id = extractYouTubeID($youtube_url);
        if ($video_id) {
            $embed_url = "https://www.youtube.com/embed/$video_id"; // Ensure it's in embed format
        } else {
            $error = "Invalid YouTube URL.";
        }

        // Process file upload for song cover
        $song_cover = ''; // Default to empty
        if (isset($_FILES['song_cover']) && $_FILES['song_cover']['error'] == 0) {
            $allowed = ["jpg", "jpeg", "png", "gif"];
            $fileName = $_FILES['song_cover']['name'];
            $fileTmpName = $_FILES['song_cover']['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExt, $allowed)) {
                $song_cover = uniqid() . '.' . $fileExt;
                $destination = 'uploads/' . $song_cover;
                if (!move_uploaded_file($fileTmpName, $destination)) {
                    $error = "Error uploading the song cover.";
                }
            } else {
                $error = "Invalid file type for song cover. Allowed types: jpg, jpeg, png, gif.";
            }
        } 

        if (empty($error)) {
            // Insert into database
            $sql = "INSERT INTO youtube_songs (song_name, youtube_url, description, song_cover) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$song_name, $embed_url, $description, $song_cover])) {
                header('Location: youtube.php');
                exit();
            } else {
                $error = "Error inserting song into database.";
            }
        }
    } else {
        $error = "Please fill out all fields.";
    }
}

include('includes/header2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Song</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Hero Section -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Add New Song</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="youtube.php">YouTube Songs</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">Add New Song</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Add Song Section Start -->
    <div class="container-fluid activities py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-center mb-4">Add New Song</h2>
                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                            <?php endif; ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="song_name" class="form-label">Song Title</label>
                                    <input type="text" name="song_name" id="song_name" class="form-control" placeholder="Song Title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="youtube_url" class="form-label">YouTube URL</label>
                                    <input type="text" name="youtube_url" id="youtube_url" class="form-control" placeholder="YouTube URL or iframe Embed Code" required>
                                    <small class="form-text text-muted">Enter either a YouTube share link, watch URL, or an iframe embed code.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Song Description</label>
                                    <textarea name="description" id="description" class="form-control" placeholder="Song Description" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="song_cover" class="form-label">Song Cover (Image)</label>
                                    <input type="file" name="song_cover" id="song_cover" class="form-control">
                                    <small class="form-text text-muted">Upload a cover image (jpg, jpeg, png, gif).</small>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Add Song</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Song Section End -->

<?php include('includes/footer2.php'); ?>
</body>
</html>
