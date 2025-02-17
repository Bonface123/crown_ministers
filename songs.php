<?php include 'crown_ministers_admin/includes/header.php'; ?>
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

<!--<script>
    document.addEventListener("DOMContentLoaded", function () {
        let slides = [
            {
                image: "img/Song1.jpg",
                title: "Hallelujah Praise",
                description: "A song of praise lifting the name of Jesus higher.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Hallelujah Praise</li>`,
                video: "https://youtu.be/9cokak2clco?si=3XUOMHblDlWxWn5x"
            },
            {
                image: "img/Song2.jpg",
                title: "Glory to God",
                description: "A heartfelt worship song exalting the greatness of God.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Glory to God</li>`,
                video: "https://youtu.be/9cokak2clco?si=3XUOMHblDlWxWn5x"
            },
            {
                image: "img/Song3.jpg",
                title: "Joyful Melodies",
                description: "Rejoice in the Lord with this uplifting melody.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Joyful Melodies</li>`,
                video: "https://www.youtube.com/embed/YOUTUBE_VIDEO_ID3?autoplay=1&mute=0&rel=0"
            },
            {
                image: "img/Song4.jpg",
                title: "The Lord is My Strength",
                description: "A song of faith and assurance in God's mighty power.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">The Lord is My Strength</li>`,
                video: "https://www.youtube.com/embed/YOUTUBE_VIDEO_ID4?autoplay=1&mute=0&rel=0"
            }
        ];

        let heroSection = document.querySelector(".hero-header");
        let heroTitle = document.getElementById("hero-title");
        let heroDescription = document.getElementById("hero-description");
        let heroBreadcrumb = document.getElementById("hero-breadcrumb");
        let heroVideo = document.getElementById("hero-video");

        let index = 0;

        function changeSlide() {
            heroSection.style.background = `url("${slides[index].image}") center center no-repeat`;
            heroSection.style.backgroundSize = "cover";
            heroTitle.textContent = slides[index].title;
            heroDescription.textContent = slides[index].description;
            heroBreadcrumb.innerHTML = slides[index].breadcrumb;
            heroVideo.src = slides[index].video; // Update YouTube video

            index = (index + 1) % slides.length; // Loop through slides
        }

        setInterval(changeSlide, 15000); // Change every 15 seconds
    });
</script> -->

<style>
    .hero-header {
        transition: background 1s ease-in-out;
    }
    .embed-responsive {
        margin-top: 15px;
        position: relative;
        display: block;
        width: 100%;
        padding: 0;
        overflow: hidden;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
    }
    .embed-responsive-item {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>



<?php
include('crown_ministers_admin/includes/db_connect.php');
// Get all active songs from the database
$sql = "SELECT * FROM youtube_songs"; // Query to get all songs
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
                            <!-- You can use a placeholder image for the song -->
                            <img src="img/song-placeholder.jpg" class="img-fluid w-100" alt="Song Cover">
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
                                <?= htmlspecialchars($song['description']) ?> <!-- Displaying description here -->
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
<?php include 'crown_ministers_admin/includes/footer.php'; ?>
 