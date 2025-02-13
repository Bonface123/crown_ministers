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

        <script>
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
        <!---->

        <style>
            #hero-content {
                transition: opacity 0.5s ease-in-out;
            }
        </style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let slides = [
          
            {
                image: "",
                subtitle: "JOIN OUR WORSHIP TEAM",
                title: "Lift your voice in praise!",
                buttonText: "Join Now",
                buttonLink: "#join"
            },
            {
                image: "",
                subtitle: "EXPERIENCE SPIRITUAL GROWTH",
                title: "Worship through song and prayer!",
                buttonText: "Learn More",
                buttonLink: "#learn"
            },
            {
                image: "",
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
                                <img src="img" class="img-fluid h-100 wow zoomIn" data-wow-delay="0.1s" alt="image">
                            </div>
                            <div class="col-6">
                                <img src="choir 8" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="image">
                                <img src="img/choir6" class="img-fluid pt-3 wow zoomIn" data-wow-delay="0.1s" alt="image">
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


<div id="events-section">
    <h2>Upcoming Events</h2>
    <div id="events-container"></div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('fetch_events.php')
    .then(response => response.json())
    .then(data => {
        let eventsContainer = document.getElementById('events-container');
        eventsContainer.innerHTML = '';

        data.forEach(event => {
            eventsContainer.innerHTML += `
                <div class="event">
                    <h3>${event.title}</h3>
                    <p><strong>Date:</strong> ${event.date} | <strong>Time:</strong> ${event.time}</p>
                    <p><strong>Location:</strong> ${event.location}</p>
                    <p>${event.description}</p>
                    <img src="uploads/${event.image}" alt="Event Image" width="200">
                </div>
            `;
        });
    })
    .catch(error => console.log("Error fetching events:", error));
});
</script>


<!-- Choir Songs Start -->
<div class="container-fluid choir-songs py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Choir Songs</p>
            <h1 class="display-3">Experience Our Uplifting Music</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Song Item 1 -->
            <div class="col-lg-6 col-xl-4">
                <div class="song-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/song-1.jpg" class="img-fluid w-100" alt="Song Cover - Embracing His Love">
                    </div>
                    <div class="p-4">
                        <div class="song-meta d-flex justify-content-between pb-2">
                            <div>
                                <small>
                                    <i class="fa fa-calendar me-2 text-muted"></i>
                                    <a href="#" class="text-muted me-2">15 Apr 2025</a>
                                </small>
                                <small>
                                    <i class="fas fa-user me-2 text-muted"></i>
                                    <a href="#" class="text-muted">Admin</a>
                                </small>
                            </div>
                            <div>
                                <a href="#" class="me-1"><i class="fas fa-video text-muted"></i></a>
                                <a href="#" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
                                <a href="#" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
                                <a href="#" class=""><i class="fas fa-image text-muted"></i></a>
                            </div>
                        </div>
                        <a href="#" class="d-inline-block h4 lh-sm mb-3">Embracing His Love</a>
                        <p class="mb-0">
                            Listen to our soulful rendition that celebrates the overwhelming love of God.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Song Item 2 -->
            <div class="col-lg-6 col-xl-4">
                <div class="song-item wow fadeIn" data-wow-delay="0.3s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/song-2.jpg" class="img-fluid w-100" alt="Song Cover - The Power of Praise">
                    </div>
                    <div class="p-4">
                        <div class="song-meta d-flex justify-content-between pb-2">
                            <div>
                                <small>
                                    <i class="fa fa-calendar me-2 text-muted"></i>
                                    <a href="#" class="text-muted me-2">22 Apr 2025</a>
                                </small>
                                <small>
                                    <i class="fas fa-user me-2 text-muted"></i>
                                    <a href="#" class="text-muted">Admin</a>
                                </small>
                            </div>
                            <div>
                                <a href="#" class="me-1"><i class="fas fa-video text-muted"></i></a>
                                <a href="#" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
                                <a href="#" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
                                <a href="#" class=""><i class="fas fa-image text-muted"></i></a>
                            </div>
                        </div>
                        <a href="#" class="d-inline-block h4 lh-sm mb-3">The Power of Praise</a>
                        <p class="mb-0">
                            Join us in a powerful musical journey that uplifts and inspires through heartfelt praise.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Song Item 3 -->
            <div class="col-lg-6 col-xl-4">
                <div class="song-item wow fadeIn" data-wow-delay="0.5s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/song-3.jpg" class="img-fluid w-100" alt="Song Cover - A Journey of Faith">
                    </div>
                    <div class="p-4">
                        <div class="song-meta d-flex justify-content-between pb-2">
                            <div>
                                <small>
                                    <i class="fa fa-calendar me-2 text-muted"></i>
                                    <a href="#" class="text-muted me-2">29 Apr 2025</a>
                                </small>
                                <small>
                                    <i class="fas fa-user me-2 text-muted"></i>
                                    <a href="#" class="text-muted">Admin</a>
                                </small>
                            </div>
                            <div>
                                <a href="#" class="me-1"><i class="fas fa-video text-muted"></i></a>
                                <a href="#" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
                                <a href="#" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
                                <a href="#" class=""><i class="fas fa-image text-muted"></i></a>
                            </div>
                        </div>
                        <a href="#" class="d-inline-block h4 lh-sm mb-3">A Journey of Faith</a>
                        <p class="mb-0">
                            Experience a musical voyage that explores the depths of faith and the joy of worship.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Choir Songs End -->




       <!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
            Latest From <span class="text-primary">Our Blog</span>
        </h1>
        <div class="row g-4 justify-content-center">
            <!-- Blog Item 1 -->
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-choir1.jpg" class="img-fluid w-100" alt="Inspiring Worship Moments">
                        <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">
                            15 Apr 2025
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
                        <a href="#" class="d-inline-block h4 lh-sm mb-3">The Joy of Worship Through Song</a>
                        <p class="mb-4">
                            Discover how music unites our community and inspires us to lift our voices in praise. Explore reflections on our recent worship sessions and the power of song.
                        </p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>
            <!-- Blog Item 2 -->
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.3s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-choir2.jpg" class="img-fluid w-100" alt="Reflections on Music Ministry">
                        <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">
                            22 Apr 2025
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
                                    <a href="#" class="text-muted me-2">8 Comments</a>
                                </small>
                            </div>
                            <div>
                                <a href="#"><i class="fas fa-bookmark text-muted"></i></a>
                            </div>
                        </div>
                        <a href="#" class="d-inline-block h4 lh-sm mb-3">Reflections on Our Music Ministry</a>
                        <p class="mb-4">
                            Join us as we share insights on how our choir is transforming lives through the art of music and worship. Learn about our journey and the impact of our ministry.
                        </p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>
            <!-- Blog Item 3 -->
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.5s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-choir3.jpg" class="img-fluid w-100" alt="Inspiration Through Music">
                        <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">
                            29 Apr 2025
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
                                    <a href="#" class="text-muted me-2">10 Comments</a>
                                </small>
                            </div>
                            <div>
                                <a href="#"><i class="fas fa-bookmark text-muted"></i></a>
                            </div>
                        </div>
                        <a href="#" class="d-inline-block h4 lh-sm mb-3">Inspiration Through Music</a>
                        <p class="mb-4">
                            Explore the spiritual journey behind our latest songs. This post dives into the inspiration and creative process that brings our music to life.
                        </p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->


        <!-- Team Start -->
<div class="container-fluid team py-5">
    <div class="container py-5">
      <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
        <p class="fs-5 text-uppercase text-primary">Our Team</p>
        <h1 class="display-3">Meet Our Leaders & Team</h1>
      </div>
      <div class="row g-5">
        <!-- Primary Leader: Choir Director (Davis) -->
        <div class="col-lg-4 col-xl-5">
          <div class="team-img wow zoomIn" data-wow-delay="0.1s">
            <img src="img/team-davis.jpg" class="img-fluid" alt="Davis - Choir Director">
          </div>
        </div>
        <div class="col-lg-8 col-xl-7">
          <div class="team-item wow fadeIn" data-wow-delay="0.1s">
            <h1>Davis</h1>
            <h5 class="fw-normal fst-italic text-primary mb-4">Choir Director</h5>
            <p class="mb-4">
              Davis leads Crown Ministers with passion and dedication, inspiring our choir to spread God's word through song, missions, and outreach projects.
            </p>
            <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">
              <a class="btn btn-primary btn-lg-square me-2" href="#"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-primary btn-lg-square me-2" href="#"><i class="fab fa-twitter"></i></a>
              <a class="btn btn-primary btn-lg-square me-2" href="#"><i class="fab fa-instagram"></i></a>
              <a class="btn btn-primary btn-lg-square" href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
          <div class="row g-4">
            <!-- Team Member: Choir Secretary (Shallot) -->
            <div class="col-md-4">
              <div class="team-item wow zoomIn" data-wow-delay="0.2s">
                <img src="img/team-shallot.jpg" class="img-fluid w-100" alt="Shallot - Choir Secretary">
                <div class="team-content text-dark text-center py-3">
                  <div class="team-content-inner">
                    <h5 class="mb-0">Shallot</h5>
                    <p class="text-dark">Choir Secretary</p>
                    <div class="team-icon d-flex align-items-center justify-content-center">
                      <a class="btn btn-primary btn-sm-square me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                      <a class="btn btn-primary btn-sm-square me-2" href="#"><i class="fab fa-twitter"></i></a>
                      <a class="btn btn-primary btn-sm-square me-2" href="#"><i class="fab fa-instagram"></i></a>
                      <a class="btn btn-primary btn-sm-square" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Team Member: Music Coordinator -->
            <div class="col-md-4">
              <div class="team-item wow zoomIn" data-wow-delay="0.4s">
                <img src="img/team-music.jpg" class="img-fluid w-100" alt="Music Coordinator">
                <div class="team-content text-dark text-center py-3">
                  <div class="team-content-inner">
                    <h5 class="mb-0">Sarah</h5>
                    <p class="text-dark">Music Coordinator</p>
                    <div class="team-icon d-flex align-items-center justify-content-center">
                      <a class="btn btn-primary btn-sm-square me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                      <a class="btn btn-primary btn-sm-square me-2" href="#"><i class="fab fa-twitter"></i></a>
                      <a class="btn btn-primary btn-sm-square me-2" href="#"><i class="fab fa-instagram"></i></a>
                      <a class="btn btn-primary btn-sm-square" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Team Member: Volunteer Coordinator -->
            <div class="col-md-4">
              <div class="team-item wow zoomIn" data-wow-delay="0.6s">
                <img src="img/team-volunteer.jpg" class="img-fluid w-100" alt="Volunteer Coordinator">
                <div class="team-content text-dark text-center py-3">
                  <div class="team-content-inner">
                    <h5 class="mb-0">Linda</h5>
                    <p class="text-dark">Volunteer Coordinator</p>
                    <div class="team-icon d-flex align-items-center justify-content-center">
                      <a class="btn btn-primary btn-sm-square me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                      <a class="btn btn-primary btn-sm-square me-2" href="#"><i class="fab fa-twitter"></i></a>
                      <a class="btn btn-primary btn-sm-square me-2" href="#"><i class="fab fa-instagram"></i></a>
                      <a class="btn btn-primary btn-sm-square" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Additional Team Members -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Team End -->
  

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
  


        <!-- Footer Start -->
<div class="container-fluid footer pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-7">
                <h1 class="text-light mb-0">Subscribe to our YouTube Channel</h1>
                <p class="text-secondary">Watch, share, and support our ministry</p>
            </div>
            <div class="col-lg-5">
                <div class="position-relative mx-auto">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
                </div>
            </div>
            <div class="col-12">
                <div class="border-top border-secondary"></div>
            </div>
        </div>
        <div class="row g-4 footer-inner">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item mt-5">
                    <h4 class="text-light mb-4">Crown Ministers Choir</h4>
                    <p class="mb-4 text-secondary">
                        A Gusii-origin-based Singing Group, formed in 2018 to spread God’s word through music, missions, and outreach projects. 
                    </p>
                    <a href="#" class="btn btn-primary py-2 px-4">Support Our Mission</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item mt-5">
                    <h4 class="text-light mb-4">Contact Us</h4>
                    <div class="d-flex flex-column">
                        <h6 class="text-secondary mb-0">Our Fellowship</h6>
                        <div class="d-flex align-items-center border-bottom py-4">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4">
                                <i class="fa fa-map-marker-alt text-dark"></i>
                            </span>
                            <p class="text-body mb-0">Nyanchwa Mission Hospital SDA Church, Kisii Town</p>
                        </div>
                        <h6 class="text-secondary mt-4 mb-0">Contact Details</h6>
                        <div class="d-flex align-items-center py-4">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4">
                                <i class="fa fa-phone-alt text-dark"></i>
                            </span>
                            <p class="text-body mb-0">
                                Davis (Director): <a href="tel:+254111289899">+254 111 289 899</a><br>
                                Shallot (Secretary): <a href="tel:+254727456619">+254 727 456 619</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item mt-5">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-2" href="#"><i class="fa fa-check text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="#"><i class="fa fa-check text-primary me-2"></i>About Us</a>
                        <a class="text-body mb-2" href="#"><i class="fa fa-check text-primary me-2"></i>Our Music</a>
                        <a class="text-body mb-2" href="#"><i class="fa fa-check text-primary me-2"></i>Contact Us</a>
                        <a class="text-body mb-2" href="#"><i class="fa fa-check text-primary me-2"></i>YouTube Channel</a>
                        <a class="text-body mb-2" href="#"><i class="fa fa-check text-primary me-2"></i>Support Us</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item mt-5">
                    <h4 class="text-light mb-4">Latest Updates</h4>
                    <div class="d-flex border-bottom border-secondary py-4">
                        <img src="img/song1.jpg" class="img-fluid flex-shrink-0" alt="">
                        <div class="ps-3">
                            <p class="mb-0 text-muted">New Release</p>
                            <a href="#" class="text-body">"Song Title" - Watch Now</a>
                        </div>
                    </div>
                    <div class="d-flex py-4">
                        <img src="img/song2.jpg" class="img-fluid flex-shrink-0" alt="">
                        <div class="ps-3">
                            <p class="mb-0 text-muted">Join Our YouTube Membership</p>
                            <a href="#" class="text-body">Support our projects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="container py-4">
        <div class="border-top border-secondary pb-4"></div>
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="border-bottom" href="#">Crown Ministers Choir</a>, All Rights Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                Designed & Maintained by <a class="border-bottom" href="#">Your Name</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->



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