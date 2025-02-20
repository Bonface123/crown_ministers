<?php include 'includes/header.php'; ?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn" id="hero-content">
                    <h1 class="display-1 text-dark" id="hero-title">About Us</h1>
                    <p class="fs-4 text-dark" id="hero-description">Learn more about our mission and vision.</p>
                    <ol class="breadcrumb mb-0" id="hero-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">About</li>
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
                image: "img/choir5.png",
                title: "Who We Are",
                description: "Discover our journey and the impact we create.",
                breadcrumb: `<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Who We Are</li>`
            },
            {
                image: "img/choir6.png",
                title: "Our Mission",
                description: "We are committed to spreading the gospel through music.",
                breadcrumb: `<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Our Mission</li>`
            },
            {
                image: "img/choir8.jpg",
                title: "Our Values",
                description: "Faith, dedication, and love drive our ministry.",
                breadcrumb: `<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Our Values</li>`
            },
            {
                image: "img/choir7.jpg",
                title: "Join Us",
                description: "Be part of our musical journey and praise the Lord with us.",
                breadcrumb: `<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Join Us</li>`
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



<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 mb-5">
            <!-- Images Column -->
            <div class="col-xl-6">
                <div class="row g-4">
                    <div class="col-6">
                        <img src="img/choir1.png" class="img-fluid wow zoomIn" data-wow-delay="0.1s" alt="Choir Performance">
                    </div>
                    <div class="col-6">
                        <img src="img/choir10.jpg" class="img-fluid wow zoomIn" data-wow-delay="0.2s" alt="Choir Rehearsal">
                        <img src="img/choir8.jpg" class="img-fluid pt-3 wow zoomIn" data-wow-delay="0.3s" alt="Choir in Concert">
                    </div>
                </div>
            </div>

            <!-- Text Column -->
            <div class="col-xl-6 wow fadeIn" data-wow-delay="0.4s">
                <p class="fs-5 text-uppercase text-primary">About Crown Ministers</p>
                <h1 class="display-5 pb-4 m-0">Sing to the Lord a new song! - Psalm 96:1</h1>
                <p class="pb-4">
                    Crown Ministers is a Gusii-origin-based choir, formed in 2018, dedicated to spreading God's word through music, missions, and outreach. We fellowship at Nyanchwa Mission Hospital SDA Church in Kisii Town.
                </p>

                <div class="row g-4 mb-4">
                    <!-- Vision -->
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <span class="bg-primary btn-md-square rounded-circle me-2 p-3">
                                <i class="fa fa-eye text-dark"></i>
                            </span>
                            <div>
                                <h5>Our Vision</h5>
                                <p>To be a leading gospel choir that inspires faith through music, both locally and globally.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Mission -->
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <span class="bg-primary btn-md-square rounded-circle me-2 p-3">
                                <i class="fa fa-flag text-dark"></i>
                            </span>
                            <div>
                                <h5>Our Mission</h5>
                                <p>To spread the Gospel through uplifting music that touches lives and brings people closer to God.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Donation & Inspirational Quote Section -->
        <div class="container text-center bg-primary py-5 wow fadeIn" data-wow-delay="0.5s">
            <div class="row g-4 align-items-center">
                <!-- Icon Section -->
                <div class="col-lg-2">
                    <i class="fas fa-hand-holding-heart fa-5x text-white"></i>
                </div>

                <!-- Message & Bible Verse -->
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="mb-3 text-white">
                        "Your support helps us spread the message of hope through music."
                    </h1>
                    <p class="mb-0 text-white fw-light">
                        Psalms 30:4: "Sing praises to the Lord, O you his saints, and give thanks to his holy name."
                    </p>
                </div>

                <!-- Call-to-Action Button -->
                <div class="col-lg-3">
                    <a href="donate.php" class="btn btn-light py-2 px-4">Support the Choir</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- About End -->

    </body>
</html>
<?php include 'includes/footer.php'; ?>