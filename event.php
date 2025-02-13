<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Crown Ministers Choir | Events</title>
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
                                <a class="text-dark px-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="text-dark px-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="text-dark px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="text-dark px-2" href=""><i class="fab fa-instagram"></i></a>
                                <a class="text-body ps-4" href=""><i class="fa fa-lock text-dark me-1"></i> Signup/login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-3">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mb-0">Crown<span class="text-primary">Ministers</span> </h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav ms-lg-auto mx-xl-auto">
                            <a href="index.html" class="nav-item nav-link">Home</a>
                            <a href="about.html" class="nav-item nav-link">About</a>
                            <a href="activity.html" class="nav-item nav-link">Activities</a>
                            <a href="event.html" class="nav-item nav-link active">Events</a>
                            <a href="sermon.html" class="nav-item nav-link">Songs</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 rounded-0">
                                    <a href="blog.html" class="dropdown-item">Latest Blog</a>
                                    <a href="team.html" class="dropdown-item">Our Team</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
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
                    <h1 class="display-1 text-dark" id="hero-title">Upcoming Events</h1>
                    <p class="fs-4 text-dark" id="hero-description">Join us for our upcoming events and gatherings.</p>
                    <ol class="breadcrumb mb-0" id="hero-breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Upcoming Events</li>
                    </ol>
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
                image: "img/Event1.jpg",
                title: "Annual Worship Concert",
                description: "Experience a night of worship, praise, and powerful encounters.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Annual Worship Concert</li>`
            },
            {
                image: "img/Event2.jpg",
                title: "Youth Revival Night",
                description: "An evening filled with prayer, worship, and spiritual awakening.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Youth Revival Night</li>`
            },
            {
                image: "img/Event3.jpg",
                title: "Community Outreach",
                description: "Join us as we give back to the community through service and love.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Community Outreach</li>`
            },
            {
                image: "img/Event4.jpg",
                title: "Christmas Carol Night",
                description: "Celebrate Christmas with us in an evening of carols and joy.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Christmas Carol Night</li>`
            }
        ];

        let heroSection = document.querySelector(".hero-header");
        let heroTitle = document.getElementById("hero-title");
        let heroDescription = document.getElementById("hero-description");
        let heroBreadcrumb = document.getElementById("hero-breadcrumb");

        let index = 0;

        function changeSlide() {
            heroSection.style.background = `url("${slides[index].image}") center center no-repeat`;
            heroSection.style.backgroundSize = "cover";
            heroTitle.textContent = slides[index].title;
            heroDescription.textContent = slides[index].description;
            heroBreadcrumb.innerHTML = slides[index].breadcrumb;

            index = (index + 1) % slides.length; // Loop through slides
        }

        setInterval(changeSlide, 5000); // Change every 5 seconds
    });
</script>

<style>
    .hero-header {
        transition: background 1s ease-in-out;
    }
</style>



         <!-- Events Start -->
<div class="container-fluid event py-5">
    <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
            Upcoming <span class="text-primary">Events</span>
        </h1>
        <!-- Event 1 -->
        <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
            <div class="col-3 col-lg-2 pe-0">
                <div class="text-center border-bottom border-dark py-3 px-2">
                    <h6>15 Apr 2025</h6>
                    <p class="mb-0">Sat 19:00</p>
                </div>
            </div>
            <div class="col-9 col-lg-6 border-start border-dark pb-5">
                <div class="ms-3">
                    <h4 class="mb-3">Evening Praise Concert</h4>
                    <p class="mb-4">
                        Join Crown Ministers for an evening of uplifting music and praise. Experience soulful worship that will inspire and renew your spirit.
                    </p>
                    <a href="#" class="btn btn-primary px-3">Join Now</a>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="overflow-hidden mb-5">
                    <img src="img/events-choir1.jpg" class="img-fluid w-100" alt="Evening Praise Concert">
                </div>
            </div>
        </div>
        <!-- Event 2 -->
        <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.3s">
            <div class="col-3 col-lg-2 pe-0">
                <div class="text-center border-bottom border-dark py-3 px-2">
                    <h6>22 Apr 2025</h6>
                    <p class="mb-0">Sun 10:00</p>
                </div>
            </div>
            <div class="col-9 col-lg-6 border-start border-dark pb-5">
                <div class="ms-3">
                    <h4 class="mb-3">Community Outreach Service</h4>
                    <p class="mb-4">
                        Be part of our community outreach event as we extend our support to those in need through inspiring messages and heartfelt music.
                    </p>
                    <a href="#" class="btn btn-primary px-3">Join Now</a>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="overflow-hidden mb-5">
                    <img src="img/events-choir2.jpg" class="img-fluid w-100" alt="Community Outreach Service">
                </div>
            </div>
        </div>
        <!-- Event 3 -->
        <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.5s">
            <div class="col-3 col-lg-2 pe-0">
                <div class="text-center border-bottom border-dark py-3 px-2">
                    <h6>29 Apr 2025</h6>
                    <p class="mb-0">Fri 18:30</p>
                </div>
            </div>
            <div class="col-9 col-lg-6 border-start border-dark pb-5">
                <div class="ms-3">
                    <h4 class="mb-3">Special Worship Night</h4>
                    <p class="mb-4">
                        Gather with Crown Ministers for a night of special worship, heartfelt prayer, and community fellowship. Let your spirit be lifted.
                    </p>
                    <a href="#" class="btn btn-primary px-3">Join Now</a>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="overflow-hidden mb-5">
                    <img src="img/events-choir3.jpg" class="img-fluid w-100" alt="Special Worship Night">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Events End -->



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