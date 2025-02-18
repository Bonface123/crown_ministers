<?php include 'crown_ministers_admin/includes/header.php'; ?>

        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Latest Blog</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-dark" aria-current="page">Latest Blog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->



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


</body>
</html>

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