<?php
include('includes/db_connect.php');
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

// Extract YouTube video ID from the URL
$videoId = '';
$query = parse_url($song['youtube_url'], PHP_URL_QUERY);
if ($query) {
    parse_str($query, $params);
    $videoId = $params['v'] ?? '';
}

include('includes/header2.php');
?>

<!-- Hero Section -->
<div class="container-fluid hero-header">
    <div class="container">
         <div class="row">
              <div class="col-lg-7">
                   <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Song Details</h1>
                        <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                             <li class="breadcrumb-item"><a href="youtube.php">YouTube Songs</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Song Details</li>
                        </ol>
                   </div>
              </div>
         </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Song Details Section -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
         <div class="row">
              <div class="col-12">
                   <h2>Song Details</h2>
                   <p><strong>Song Title:</strong> <?= htmlspecialchars($song['song_name']) ?></p>
                   <p>
                        <strong>YouTube URL:</strong>
                        <a href="<?= htmlspecialchars($song['youtube_url']) ?>" target="_blank">
                            <?= htmlspecialchars($song['youtube_url']) ?>
                        </a>
                   </p>

                   <!-- Embed YouTube Video -->
                   <div class="mt-4">
                        <h3>Video Preview</h3>
                        <?php if ($videoId): ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/<?= htmlspecialchars($videoId) ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        <?php else: ?>
                            <p>Invalid YouTube URL.</p>
                        <?php endif; ?>
                   </div>

                   <p class="mt-4">
                        <a href="youtube.php" class="btn btn-secondary">Back to Manage Songs</a>
                   </p>
              </div>
         </div>
    </div>
</div>

<?php include('includes/footer2.php'); ?>
