<?php include 'includes/header.php'; ?>
<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn" id="hero-content">
                    <h1 class="display-1 text-dark" id="hero-title">Our Songs</h1>
                    <p class="fs-4 text-dark" id="hero-description">Watch and listen to our spirit-filled gospel songs.</p>
                    <ol class="breadcrumb mb-0" id="hero-breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Our Songs</li>
                    </ol>
                    <!-- YouTube Video -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="hero-video" class="embed-responsive-item" width="560" height="315"
                            src="https://www.youtube.com/embed/YOUTUBE_VIDEO_ID1?autoplay=1&mute=0&rel=0"
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<?php
include('crown_ministers_admin/includes/db_connect.php');

// Get all active songs from the database
$sql = "SELECT * FROM youtube_songs";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$songs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Songs</title>
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Include FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

<!-- Choir Songs Start -->
<div class="container-fluid choir-songs py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5">
            <p class="fs-5 text-uppercase text-primary">Choir Songs</p>
            <h1 class="display-3">Experience Our Uplifting Music</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php foreach ($songs as $song): ?>
                <div class="col-lg-6 col-xl-4">
                    <div class="song-item wow fadeIn" data-wow-delay="0.1s">
                        <div class="overflow-hidden p-4 pb-0">
                            <!-- Dynamic Song Cover Image -->
                            <img src="<?= !empty($song['song_cover']) ? 'uploads/' . htmlspecialchars($song['song_cover']) : 'img/song-placeholder.jpg' ?>" 
                                 class="img-fluid w-100" 
                                 alt="<?= htmlspecialchars($song['song_name']) ?>">
                        </div>
                        <div class="p-4">
                            <div class="song-meta d-flex justify-content-between pb-2">
                                <div>
                                    <small>
                                        <i class="fa fa-calendar me-2 text-muted"></i>
                                        <a href="#" class="text-muted me-2"><?= htmlspecialchars($song['uploaded_on']) ?></a>
                                    </small>
                                </div>
                                <div>
                                    <a href="<?= htmlspecialchars($song['youtube_url']) ?>" target="_blank" class="me-1">
                                        <i class="fas fa-video text-muted"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="<?= htmlspecialchars($song['youtube_url']) ?>" target="_blank" class="d-inline-block h4 lh-sm mb-3">
                                <?= htmlspecialchars($song['song_name']) ?>
                            </a>
                            <!-- Dynamically displaying the song description -->
                            <p class="mb-0">
                                <?= htmlspecialchars($song['description']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Choir Songs End -->

</body>
</html>
<?php include 'includes/footer.php'; ?>
