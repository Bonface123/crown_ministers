<?php include 'crown_ministers_admin/includes/header.php'; ?>


        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Our Activities</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-dark" aria-current="page">Our Activities</li>
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
                image: "img/Activity1.jpg",
                title: "Choir Rehearsals",
                description: "Join our choir rehearsals and perfect your voice for the Lord.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Choir Rehearsals</li>`
            },
            {
                image: "img/Activity2.jpg",
                title: "Community Outreach",
                description: "We engage in outreach programs to spread love and faith.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Community Outreach</li>`
            },
            {
                image: "img/Activity3.jpg",
                title: "Youth Fellowship",
                description: "Empowering the youth through music, prayer, and mentorship.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Youth Fellowship</li>`
            },
            {
                image: "img/Activity4.jpg",
                title: "Sunday Worship",
                description: "Experience uplifting worship every Sunday with us.",
                breadcrumb: `<li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Pages</a></li>
                             <li class="breadcrumb-item text-dark" aria-current="page">Sunday Worship</li>`
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
    </body>
</html>
<?php include 'crown_ministers_admin/includes/footer.php'; ?>