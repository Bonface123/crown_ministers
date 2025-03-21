<?php include 'includes/header.php'; ?>
<?php
include('crown_ministers_admin/includes/db_connect.php');

// Fetch all active songs from the database
$sql = "SELECT * FROM youtube_songs ORDER BY uploaded_on DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$songs = $stmt->fetchAll();
?>
<!-- Hero Start -->
<div class="container-fluid hero-header" id="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn" id="hero-content">
                    <h1 class="display-1 text-dark" id="hero-title">Our Songs</h1>
                    <p class="fs-4 text-dark" id="hero-description">Watch and listen to our spirit-filled gospel songs.</p>
                    <ol class="breadcrumb mb-0" id="hero-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Our Songs</li>
                    </ol>

                    <!-- Bootstrap Carousel for YouTube Videos -->
                    <?php if (!empty($songs)): ?>
                        <div id="songCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php foreach ($songs as $index => $song): 
                                    // Extract video ID from YouTube URL
                                    $youtubeUrl = $song['youtube_url'];
                                    $videoId = '';
                                    if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]+)/', $youtubeUrl, $matches)) {
                                        $videoId = $matches[1];
                                    }
                                    // Use admin provided cover if available; otherwise use YouTube thumbnail
                                    $coverImage = !empty($song['song_cover']) 
                                        ? 'uploads/' . htmlspecialchars($song['song_cover']) 
                                        : "https://img.youtube.com/vi/$videoId/hqdefault.jpg";
                                    // Prepare embedded video URL
                                    $embedUrl = "https://www.youtube.com/embed/$videoId?autoplay=1&mute=0&rel=0";
                                ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" width="560" height="315"
                                                <?php if($index === 0): ?>
                                                    src="<?= htmlspecialchars($embedUrl) ?>"
                                                <?php else: ?>
                                                    src=""
                                                <?php endif; ?>
                                                data-src="<?= htmlspecialchars($embedUrl) ?>"
                                                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- Carousel Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#songCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#songCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <?php else: ?>
                        <p class="text-center text-muted">No songs available at the moment.</p>
                    <?php endif; ?>
                    <!-- End Carousel -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Ensure only the active carousel iframe plays -->
<script>
document.addEventListener("DOMContentLoaded", function(){
    $('#songCarousel').on('slid.bs.carousel', function () {
        $('#songCarousel .carousel-item').not('.active').find('iframe').each(function(){
            $(this).attr('src', '');
        });
        $('#songCarousel .carousel-item.active').find('iframe').each(function(){
            if (!$(this).attr('src')) {
                $(this).attr('src', $(this).data('src'));
            }
        });
    });
});

</script>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Songs</title>
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Include FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .song-item { position: relative; cursor: pointer; }
        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2.5rem;
            color: #fff;
            opacity: 0.8;
        }
    </style>
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
            <?php if (!empty($songs)): ?>
                <?php foreach ($songs as $song): 
                    // Extract video ID from YouTube URL
                    $youtubeUrl = $song['youtube_url'];
                    $videoId = '';

                    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=))([a-zA-Z0-9_-]{11})/', $youtubeUrl, $matches)) {
                        $videoId = $matches[1];
                    }

                    // Determine cover image
                    $coverImage = !empty($song['song_cover']) 
                        ? 'uploads/' . htmlspecialchars($song['song_cover']) 
                        : ($videoId ? "https://img.youtube.com/vi/$videoId/hqdefault.jpg" : 'default-cover.jpg');

                    // Prepare YouTube embed URL for modal playback
                    $embedUrl = $videoId ? "https://www.youtube.com/embed/$videoId?autoplay=1&mute=0&rel=0" : '#';

                    // Generate Download Links
                    $encodedName = urlencode($song['song_name']);
                    $downloadMp3 = $videoId ? "download.php?videoId=$videoId&type=mp3&name=$encodedName" : ''; 
                    $downloadMp4 = $videoId ? "download.php?videoId=$videoId&type=mp4&name=$encodedName" : ''; 
                ?>
                    <div class="col-lg-6 col-xl-4">
                        <div class="song-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="overflow-hidden p-4 pb-0 position-relative">
                                <img src="<?= $coverImage ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($song['song_name']) ?>">
                                <?php if ($videoId): ?>
                                    <div class="play-icon">
                                        <i class="fas fa-play" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="<?= $embedUrl ?>"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="p-4">
                                <div class="song-meta d-flex justify-content-between pb-2">
                                    <div>
                                        <small>
                                            <i class="fa fa-calendar me-2 text-muted"></i>
                                            <span class="text-muted me-2"><?= htmlspecialchars($song['uploaded_on']) ?></span>
                                        </small>
                                    </div>
                                    <div>
                                        <a href="<?= htmlspecialchars($song['youtube_url']) ?>" target="_blank" class="me-1">
                                            <i class="fas fa-video text-muted"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="#" class="d-inline-block h4 lh-sm mb-3 song-title">
                                    <?= htmlspecialchars($song['song_name']) ?>
                                </a>
                                <p class="mb-3"><?= htmlspecialchars($song['description']) ?></p>

                                <!-- Download Buttons -->
                                <?php if ($videoId): ?>
                                    <button class="btn btn-primary btn-sm download-btn" data-url="<?= $downloadMp3 ?>" data-type="mp3" data-name="<?= htmlspecialchars($song['song_name']) ?>">Download MP3</button>
                                    <button class="btn btn-success btn-sm download-btn" data-url="<?= $downloadMp4 ?>" data-type="mp4" data-name="<?= htmlspecialchars($song['song_name']) ?>">Download MP4</button>
                                <?php else: ?>
                                    <button class="btn btn-secondary btn-sm" disabled>No Download Available</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center">
                    <p class="text-muted">No songs available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Choir Songs End -->

<script>
document.querySelectorAll('.download-btn').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        let downloadUrl = this.getAttribute('data-url');
        let fileType = this.getAttribute('data-type');
        let songName = this.getAttribute('data-name').replace(/[^a-zA-Z0-9_-]/g, '_'); // Sanitize filename

        fetch(downloadUrl)
            .then(response => response.blob())
            .then(blob => {
                let a = document.createElement('a');
                a.href = URL.createObjectURL(blob);
                a.download = `${songName}.${fileType}`; 
                document.body.appendChild(a);
                a.click();
                a.remove();
            })
            .catch(error => console.error('Download error:', error));
    });
});
</script>






<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Song Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="youtubeVideo" width="100%" height="315" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Handle Video Playback in Modal -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var videoModal = document.getElementById('videoModal');
        var youtubeFrame = document.getElementById('youtubeVideo');

        videoModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var videoUrl = button.getAttribute('data-video');
            youtubeFrame.src = videoUrl;
        });

        videoModal.addEventListener('hidden.bs.modal', function () {
            youtubeFrame.src = "";
        });
    });
</script>


<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
         <div class="ratio ratio-16x9">
             <iframe id="videoModalIframe" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Include jQuery and Bootstrap JS if not already included -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
    // Modal playback for choir songs
    $('.song-item, .song-title').on('click', function(e) {
        e.preventDefault();
        var videoUrl = $(this).data('video-url');
        if(videoUrl) {
            // Convert YouTube URL to embed format if necessary
            if(videoUrl.indexOf("embed") === -1) {
                var regExp = /(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]+)/;
                var match = videoUrl.match(regExp);
                if(match && match[1]) {
                    videoUrl = "https://www.youtube.com/embed/" + match[1] + "?autoplay=1&mute=0&rel=0";
                }
            }
            $('#videoModalIframe').attr('src', videoUrl);
            $('#videoModal').modal('show');
        }
    });

    // Clear modal iframe on close to stop playback
    $('#videoModal').on('hidden.bs.modal', function(){
        $('#videoModalIframe').attr('src', '');
    });
});
</script>
</body>
</html>
<?php include 'includes/footer.php'; ?>
