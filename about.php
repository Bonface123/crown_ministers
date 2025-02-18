<?php include 'crown_ministers_admin/includes/header.php'; ?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn" id="hero-content">
                    <h1 class="display-1 text-dark" id="hero-title">About Us</h1>
                    <p class="fs-4 text-dark" id="hero-description">Learn more about our mission and vision.</p>
                    <ol class="breadcrumb mb-0" id="hero-breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Who We Are</li>`
            },
            {
                image: "img/choir6.png",
                title: "Our Mission",
                description: "We are committed to spreading the gospel through music.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Our Mission</li>`
            },
            {
                image: "img/choir8.jpg",
                title: "Our Values",
                description: "Faith, dedication, and love drive our ministry.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Our Values</li>`
            },
            {
                image: "img/choir7.jpg",
                title: "Join Us",
                description: "Be part of our musical journey and praise the Lord with us.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
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



        <!-- About Satrt -->
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 mb-5">
                    <div class="col-xl-6">
                        <div class="row g-4">
                            <div class="col-6">
                                <img src="img/.jpg" class="img-fluid h-100 wow zoomIn" data-wow-delay="0.1s" alt="About Us Image">
                            </div>
                            <div class="col-6">
                                <img src="img/" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="About Us Image">
                                <img src="img/" class="img-fluid pt-3 wow zoomIn" data-wow-delay="0.1s" alt="About Us Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeIn" data-wow-delay="0.5s">
                        <p class="fs-5 text-uppercase text-primary">About Crown Ministers</p>
                        <h1 class="display-5 pb-4 m-0">Sing to the Lord a new song! - Psalm 96:1</h1>
                        <p class="pb-4">Crown Ministers is a Gusii-origin-based choir, formed in 2018, dedicated to spreading God's word through song, missions, 
                            and outreach projects. We fellowship at Nyanchwa Mission Hospital SDA Church in Kisii Town.</p>
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
                                        <p>To spread the Gospel through uplifting music, touching lives, and bringing people closer to God</p>
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
              
                </div>
            </div>
        </div>
        <!-- About End -->
    </body>
</html>
<?php include 'crown_ministers_admin/includes/footer.php'; ?>