<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Crown Ministers Choir | Home</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        

    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Topbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar d-none d-lg-block">
                <div class="topbar-inner">
                    <div class="row gx-0">
                        <div class="col-lg-7 text-start">
                            <div class="h-100 d-inline-flex align-items-center me-4">
                                <span class="fa fa-phone-alt me-2 text-dark"></span>
                                <a href="#" class="text-secondary"><span>+254 111 289 899</span></a>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center">
                                <span class="far fa-envelope me-2 text-dark"></span>
                                <a href="#" class="text-secondary"><span>crownministers@gmail.com</span></a>
                            </div>
                        </div>
                        <div class="col-lg-5 text-end">
                            <div class="h-100 d-inline-flex align-items-center">
                                <span class="text-body">Follow Us:</span>
                                <a class="text-dark px-2" href="https://www.facebook.com/profile.php/?id=100070472545389"><i class="fab fa-facebook-f"></i></a>
                                <a class="text-dark px-2" href="https://www.youtube.com/results?search_query=crown+ministers+kisii"><i class="fab fa-youtube"></i></a>
                                <a class="text-body ps-4" href=""><i class="fa fa-lock text-dark me-1"></i> Signup/login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-3">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="mb-0">Crown<span class="text-primary">Ministers</span> </h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav ms-lg-auto mx-xl-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="about.php" class="nav-item nav-link">About</a>
                            <a href="activity.php" class="nav-item nav-link">Activities</a>
                            <a href="event.php" class="nav-item nav-link">Events</a>
                            <a href="songs.php" class="nav-item nav-link">Songs</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 rounded-0">
                                    <a href="blog.php" class="dropdown-item">Latest Blog</a>
                                    <a href="team.php" class="dropdown-item">Our Team</a>
                                    <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                                    <a href="404.php" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <!--<a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Donate</a>-->
                    </div>
                </nav>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn" id="hero-content">
                            <p class="fs-4 text-dark" id="hero-subtitle">WELCOME TO CROWN MINISTERS</p>
                            <h1 class="display-1 mb-5 text-dark" id="hero-title">Sing to the Lord a new song!</h1>
                            <a href="#" class="btn btn-primary py-3 px-5" id="hero-btn">Read More</a>
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
                        image: "img/choir7.jpg",
                        subtitle: "JOIN OUR WORSHIP TEAM",
                        title: "Lift your voice in praise!",
                        buttonText: "Join Now",
                        buttonLink: "#join"
                    },
                    {
                        image: "img/choir4.jpg",
                        subtitle: "EXPERIENCE SPIRITUAL GROWTH",
                        title: "Worship through song and prayer!",
                        buttonText: "Learn More",
                        buttonLink: "#learn"
                    },
                    {
                        image: "img/choir10.jpg",
                        subtitle: "CELEBRATE GOD'S LOVE",
                        title: "Sing with joy in your heart!",
                        buttonText: "Get Involved",
                        buttonLink: "#involve"
                    }
                ];
                
                let heroSection = document.querySelector(".hero-header");
                let subtitleElement = document.getElementById("hero-subtitle");
                let titleElement = document.getElementById("hero-title");
                let buttonElement = document.getElementById("hero-btn");

                let index = 0;

                function changeSlide() {
                    heroSection.style.background = `url("${slides[index].image}") center center no-repeat`;
                    heroSection.style.backgroundSize = "cover";

                    // Fade out content before changing it
                    document.getElementById("hero-content").style.opacity = 0;

                    setTimeout(() => {
                        subtitleElement.textContent = slides[index].subtitle;
                        titleElement.textContent = slides[index].title;
                        buttonElement.textContent = slides[index].buttonText;
                        buttonElement.href = slides[index].buttonLink;

                        // Fade in new content
                        document.getElementById("hero-content").style.opacity = 1;

                        index = (index + 1) % slides.length; // Loop through slides
                    }, 500); // Short delay for smooth transition
                }

                setInterval(changeSlide, 5000); // Change every 5 seconds
            });
        </script>
       

        <style>
            #hero-content {
                transition: opacity 0.5s ease-in-out;
            }
        </style>


<!---->

<style>
    #hero-content {
        transition: opacity 0.5s ease-in-out;
    }
</style>




        <!-- About Satrt -->
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 mb-5">
                    <div class="col-xl-6">
                        <div class="row g-4">
                            <div class="col-6">
                                <img src="img/choir2.png" class="img-fluid h-100 wow zoomIn" data-wow-delay="0.1s" alt="image">
                            </div>
                            <div class="col-6">
                                <img src="img/choir7.jpg" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="image">
                                <img src="img/choir10.jpg" class="img-fluid pt-3 wow zoomIn" data-wow-delay="0.1s" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeIn" data-wow-delay="0.5s">
                        <p class="fs-5 text-uppercase text-primary">About Crown Ministers</p>
                        <h1 class="display-5 pb-4 m-0">Sing to the Lord a new song! - Psalm 96:1</h1>
                        <p class="pb-4">Crown Ministers is a Gusii-origin-based choir, formed in 2018, dedicated to spreading God's word through song, 
                            missions, and outreach projects. We fellowship at Nyanchwa Mission Hospital SDA Church in Kisii Town.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <span class="bg-primary btn-md-square rounded-circle mt-4 me-2"><i class="fa fa-eye text-dark fa-4x mb-5 pb-2"></i></span>
                                    <div class="ms-4">
                                        <h5>Our Vision</h5>
                                        <p>To become a leading gospel choir that inspires faith through music, both locally and globally.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <span class="bg-primary btn-md-square rounded-circle mt-4 me-2"><i class="fa fa-flag text-dark fa-4x mb-5 pb-2"></i></span>
                                    <div class="ms-4">
                                        <h5>Our Mission</h5>
                                        <p>To spread the Gospel through uplifting music, touching lives, and bringing people closer to God.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light p-3 mb-4">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-3">
                                    <img src="img/" class="img-fluid rounded-circle" alt="Charity Image">
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Your generous donation helps us spread God's word through music, missions, and outreach.</p>
                                </div>
                                <div class="col-3">
                                        <h2 class="mb-0 text-primary text-center">$20,46</h2>
                                        <h5 class="mb-0 text-center">Raised</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <p class="mb-2"><i class="fa fa-check text-primary me-3"></i>Charity & Donation</p>
                                <p class="mb-0"><i class="fa fa-check text-primary me-3"></i>Parent Education</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2"><i class="fa fa-check text-primary me-3"></i>Shooting</p>
                                <p class="mb-0"><i class="fa fa-check text-primary me-3"></i>Music Recording</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center bg-primary py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-2">
                            <i class="fas fa-church fa-5x text-white"></i>

                        </div>
                        <div class="col-lg-7 text-center text-lg-start">
                            <h1 class="mb-0">Psalms 30:4: "Sing praises to the Lord, O you his saints, and give thanks to his holy name."</h1>
                        </div>
                        <div class="col-lg-3">
                            <a href="" class="btn btn-light py-2 px-4">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Activities Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Activities</p>
            <h1 class="display-3">Our Ongoing Activities</h1>
        </div>
        <div class="row g-4">
            <!-- Choir Rehearsals -->
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-music fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Choir Rehearsals</h4>
                        <p class="mb-4">Join our weekly rehearsals as we prepare to lift our voices in praise.</p>
                        <a href="#" class="btn btn-primary px-3">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Community Outreach -->
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-hands-helping fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Community Outreach</h4>
                        <p class="mb-4">We engage with our community through charity events and local outreach programs.</p>
                        <a href="#" class="btn btn-primary px-3">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Prayer Meetings -->
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-pray fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Prayer Meetings</h4>
                        <p class="mb-4">Gather with us for uplifting prayer meetings and spiritual fellowship.</p>
                        <a href="#" class="btn btn-primary px-3">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Charity & Donations -->
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-heart fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Charity & Donations</h4>
                        <p class="mb-4">We support various charitable causes to help those in need in our community.</p>
                        <a href="#" class="btn btn-primary px-3">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Fellowship Gatherings -->
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Fellowship Gatherings</h4>
                        <p class="mb-4">Experience the warmth of our community at our regular fellowship events.</p>
                        <a href="#" class="btn btn-primary px-3">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Special Events -->
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-calendar-alt fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Special Events</h4>
                        <p class="mb-4">Join us for special concerts, seasonal services, and other exciting events.</p>
                        <a href="#" class="btn btn-primary px-3">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Activities End -->



<?php
include('crown_ministers_admin/includes/db_connect.php');

// Get active events from the database
$sql = "SELECT * FROM events WHERE status = 'active' ORDER BY event_date ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll();
?>

<!-- Events Start -->
<div class="container-fluid event py-5">
    <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
            Upcoming <span class="text-primary">Events</span>
        </h1>

        <?php foreach ($events as $index => $event): ?>
            <div class="row g-4 event-item wow fadeIn" data-wow-delay="<?= 0.1 * ($index + 1) ?>s">
                <div class="col-3 col-lg-2 pe-0">
                    <div class="text-center border-bottom border-dark py-3 px-2">
                        <!-- Format Date -->
                        <h6><?= date('d M Y', strtotime($event['event_date'])) ?></h6>
                        <p class="mb-0"><?= date('D H:i', strtotime($event['event_date'])) ?></p>
                    </div>
                </div>
                <div class="col-9 col-lg-6 border-start border-dark pb-5">
                    <div class="ms-3">
                        <h4 class="mb-3"><?= htmlspecialchars($event['event_name']) ?></h4>
                        <p class="mb-4">
                            <?= htmlspecialchars($event['event_description']) ?>
                        </p>
                        <a href="#" class="btn btn-primary px-3">Join Now</a>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="overflow-hidden mb-5">
                        <!-- Ensure correct image path -->
                        <img src="crown-ministers_admin/uploads/<?= htmlspecialchars($event['event_image']) ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($event['event_name']) ?>">
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
<!-- Events End -->


<?php
include('crown_ministers_admin/includes/db_connect.php');
// Get all active songs from the database
$sql = "SELECT * FROM youtube_songs"; // Query to get all songs
$stmt = $pdo->prepare($sql);
$stmt->execute();
$songs = $stmt->fetchAll();
?>


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



<?php
include('crown_ministers_admin/includes/db_connect.php');

// Get all blog posts from the database
$sql = "SELECT * FROM blogs ORDER BY published_on DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$blogs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- You can include any additional CSS or JS libraries (like WOW.js) here -->
</head>
<body>
    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
                Latest From <span class="text-primary">Our Blog</span>
            </h1>
            <div class="row g-4 justify-content-center">
                <?php foreach ($blogs as $blog): ?>
                    <div class="col-lg-6 col-xl-4">
                        <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="blog-img position-relative overflow-hidden">
                                <img src="uploads/<?= htmlspecialchars($blog['image']) ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($blog['title']) ?>">
                                <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">
                                    <?= htmlspecialchars($blog['published_on']) ?>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="blog-meta d-flex justify-content-between pb-2">
                                    <div>
                                        <small>
                                            <i class="fas fa-user me-2 text-muted"></i>
                                            <a href="#" class="text-muted me-2">By Admin</a>
                                        </small>
                                        <small>
                                            <i class="fa fa-comment-alt me-2 text-muted"></i>
                                            <a href="#" class="text-muted me-2">5 Comments</a>
                                        </small>
                                    </div>
                                    <div>
                                        <a href="#"><i class="fas fa-bookmark text-muted"></i></a>
                                    </div>
                                </div>
                                <a href="blog_details.php?id=<?= $blog['id'] ?>" class="d-inline-block h4 lh-sm mb-3"><?= htmlspecialchars($blog['title']) ?></a>
                                <p class="mb-4">
                                    <?= nl2br(htmlspecialchars(substr($blog['content'], 0, 200))) ?>...
                                </p>
                                <a href="blog_details.php?id=<?= $blog['id'] ?>" class="btn btn-primary px-3">More Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Blog End -->

       

        <!-- Testimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
      <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
        <p class="fs-5 text-uppercase text-primary">Testimonial</p>
        <h1 class="display-3">What People Say About Our Choir</h1>
      </div>
      <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">
        <!-- Testimonial Item 1 -->
        <div class="testimonial-item">
          <div class="d-flex mb-3">
            <div class="position-relative">
              <img src="img/" class="img-fluid" alt="Testimonial from John John">
              <div class="btn-md-square bg-primary rounded-circle position-absolute" style="top: 25px; left: -25px;">
                <i class="fa fa-quote-left text-dark"></i>
              </div>
            </div>
            <div class="ps-3 my-auto">
              <h5 class="mb-0">Jane Mary</h5>
              <p class="m-0">Church Member</p>
            </div>
          </div>
          <div class="testimonial-content">
            <div class="d-flex">
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
            </div>
            <p class="fs-5 m-0 pt-3">
              "Crown Ministers has truly transformed our worship experience with their soulful music and heartfelt performances. Their songs inspire and uplift everyone who listens."
            </p>
          </div>
        </div>
        <!-- Testimonial Item 2 -->
        <div class="testimonial-item">
          <div class="d-flex mb-3">
            <div class="position-relative">
              <img src="img/" class="img-fluid" alt="Testimonial from John Smith">
              <div class="btn-md-square bg-primary rounded-circle position-absolute" style="top: 25px; left: -25px;">
                <i class="fa fa-quote-left text-dark"></i>
              </div>
            </div>
            <div class="ps-3 my-auto">
              <h5 class="mb-0">John Smith</h5>
              <p class="m-0">Choir Enthusiast</p>
            </div>
          </div>
          <div class="testimonial-content">
            <div class="d-flex">
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
            </div>
            <p class="fs-5 m-0 pt-3">
              "The music and energy of Crown Ministers are simply amazing. Every performance fills our hearts with joy and renewed hope."
            </p>
          </div>
        </div>
        <!-- Testimonial Item 3 -->
        <div class="testimonial-item">
          <div class="d-flex mb-3">
            <div class="position-relative">
              <img src="img/" class="img-fluid" alt="Testimonial from Sarah Lee">
              <div class="btn-md-square bg-primary rounded-circle position-absolute" style="top: 25px; left: -25px;">
                <i class="fa fa-quote-left text-dark"></i>
              </div>
            </div>
            <div class="ps-3 my-auto">
              <h5 class="mb-0">Sarah Lee</h5>
              <p class="m-0">Volunteer</p>
            </div>
          </div>
          <div class="testimonial-content">
            <div class="d-flex">
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
            </div>
            <p class="fs-5 m-0 pt-3">
              "Their passion for music is contagious. Crown Ministers not only delivers great performances but also creates a warm, welcoming community."
            </p>
          </div>
        </div>
        <!-- Testimonial Item 4 -->
        <div class="testimonial-item">
          <div class="d-flex mb-3">
            <div class="position-relative">
              <img src="img/" class="img-fluid" alt="Testimonial from Michael Green">
              <div class="btn-md-square bg-primary rounded-circle position-absolute" style="top: 25px; left: -25px;">
                <i class="fa fa-quote-left text-dark"></i>
              </div>
            </div>
            <div class="ps-3 my-auto">
              <h5 class="mb-0">Michael Green</h5>
              <p class="m-0">Longtime Supporter</p>
            </div>
          </div>
          <div class="testimonial-content">
            <div class="d-flex">
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
              <i class="fas fa-star text-primary"></i>
            </div>
            <p class="fs-5 m-0 pt-3">
              "Every time I listen to their music, I feel deeply moved and spiritually refreshed. Truly a blessing to our community."
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonial End -->
  


  <?php include 'crown_ministers_admin/includes/footer.php'; ?>



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-light back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>