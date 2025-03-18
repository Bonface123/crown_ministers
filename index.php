<?php include 'includes/header.php'; ?>

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

       <<script>
            document.addEventListener("DOMContentLoaded", function () {
    let slides = [
        {
            image: "img/choir7.jpg",
            subtitle: "JOIN OUR WORSHIP TEAM",
            title: "Lift your voice in praise!",
            buttonText: "Join Now",
            buttonLink: "#join",
            modalContent: "Become a member of our worship team and lift your voice in praise. Everyone is welcome!"
        },
        {
            image: "img/choir4.jpg",
            subtitle: "EXPERIENCE SPIRITUAL GROWTH",
            title: "Worship through song and prayer!",
            buttonText: "Learn More",
            buttonLink: "#learn",
            modalContent: "Deepen your spiritual journey through music and heartfelt prayer. Join us today!"
        },
        {
            image: "img/choir10.jpg",
            subtitle: "CELEBRATE GOD'S LOVE",
            title: "Sing with joy in your heart!",
            buttonText: "Get Involved",
            buttonLink: "#involve",
            modalContent: "Celebrate God's love by participating in our choir and community outreach programs."
        }
    ];

    let heroSection = document.querySelector(".hero-header");
    let subtitleElement = document.getElementById("hero-subtitle");
    let titleElement = document.getElementById("hero-title");
    let buttonElement = document.getElementById("hero-btn");
    let modalTitle = document.getElementById("modal-title");
    let modalBody = document.getElementById("modal-body");

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

            // Set modal content dynamically
            buttonElement.onclick = function () {
                modalTitle.textContent = slides[index].title;
                modalBody.textContent = slides[index].modalContent;
                new bootstrap.Modal(document.getElementById("heroModal")).show();
            };

            // Fade in new content
            document.getElementById("hero-content").style.opacity = 1;

            index = (index + 1) % slides.length; // Loop through slides
        }, 500); // Short delay for smooth transition
    }

    setInterval(changeSlide, 5000); // Change every 5 seconds
});
  </script>
       <!-- Hero Modal -->
<div class="modal fade" id="heroModal" tabindex="-1" aria-labelledby="heroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Modal Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
                Modal content goes here...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Hero Modal End -->

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


 <!-- Activities Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Activities</p>
            <h1 class="display-3">Our Ongoing Activities</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            // Array of activities (replace with database if needed)
            $activities = [
                ["icon" => "fa-music", "title" => "Choir Rehearsals", "description" => "Join our weekly rehearsals as we prepare to lift our voices in praise."],
                ["icon" => "fa-hands-helping", "title" => "Community Outreach", "description" => "We engage with our community through charity events and local outreach programs."],
                ["icon" => "fa-pray", "title" => "Prayer Meetings", "description" => "Gather with us for uplifting prayer meetings and spiritual fellowship."],
                ["icon" => "fa-heart", "title" => "Charity & Donations", "description" => "We support various charitable causes to help those in need in our community."],
                ["icon" => "fa-users", "title" => "Fellowship Gatherings", "description" => "Experience the warmth of our community at our regular fellowship events."],
                ["icon" => "fa-calendar-alt", "title" => "Special Events", "description" => "Join us for special concerts, seasonal services, and other exciting events."]
            ];

            $delay = 0.1; // Animation delay
            foreach ($activities as $index => $activity):
            ?>
                <!-- Activity Card -->
                <div class="col-lg-6 col-xl-4">
                    <div class="activities-item p-4 wow fadeIn" data-wow-delay="<?= $delay ?>s">
                        <i class="fa <?= $activity['icon'] ?> fa-4x text-dark"></i>
                        <div class="ms-4">
                            <h4><?= htmlspecialchars($activity['title']) ?></h4>
                            <p class="mb-4"><?= htmlspecialchars($activity['description']) ?></p>
                            <a href="#" class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#activityModal<?= $index ?>">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Modal for Activity -->
                <div class="modal fade" id="activityModal<?= $index ?>" tabindex="-1" aria-labelledby="activityModalLabel<?= $index ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="activityModalLabel<?= $index ?>"><?= htmlspecialchars($activity['title']) ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><?= htmlspecialchars($activity['description']) ?></p>
                                <p>More information about <?= htmlspecialchars($activity['title']) ?> can go here...</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                $delay += 0.2; // Increment delay for each item
            endforeach;
            ?>
        </div>
    </div>
</div>
<!-- Activities End -->



<?php
include 'includes/db_connect.php';

// Get active events from the database
$sql = "SELECT * FROM events WHERE status = 'active' ORDER BY event_date ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll();
?>

<!-- Events Start -->
<div class="container-fluid event py-5">
    <div class="container py-5">
        <!-- Section Title -->
        <div class="text-center mb-5 wow fadeIn" data-wow-delay="0.1s">
            <h1 class="display-3">
                Upcoming <span class="text-primary">Events</span>
            </h1>
        </div>

        <?php if (!empty($events)): ?>
            <?php foreach ($events as $index => $event): ?>
                <div class="row g-4 event-item align-items-center wow fadeIn" data-wow-delay="<?= 0.1 * ($index + 1) ?>s">
                    <!-- Event Date -->
                    <div class="col-12 col-md-4 col-lg-3 text-center">
                        <div class="border p-3 rounded">
                            <h3 class="text-primary mb-1"><?= date('d', strtotime($event['event_date'])) ?></h3>
                            <h6 class="text-uppercase mb-0"><?= date('M Y', strtotime($event['event_date'])) ?></h6>
                            <small class="text-muted"><?= date('D • H:i', strtotime($event['event_date'])) ?></small>
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="col-12 col-md-8 col-lg-5">
                        <div>
                            <h4 class="mb-3"><?= htmlspecialchars($event['event_name']) ?></h4>
                            <p class="mb-4"><?= htmlspecialchars($event['event_description']) ?></p>
                            <a href="join.php" class="btn btn-primary px-4">Join Now</a>
                        </div>
                    </div>

                    <!-- Event Image -->
                    <div class="col-12 col-lg-4">
                        <div class="overflow-hidden rounded">
                            <img src="uploads/<?= htmlspecialchars($event['event_image']) ?>" 
                                 class="img-fluid w-100" 
                                 alt="<?= htmlspecialchars($event['event_name']) ?>">
                        </div>
                    </div>
                </div>

                <!-- Divider between events -->
                <?php if ($index < count($events) - 1): ?>
                    <hr class="my-5">
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- No Events Available -->
            <p class="text-center">No upcoming events at the moment. Stay tuned!</p>
        <?php endif; ?>

    </div>
</div>
<!-- Events End -->






<?php
include 'includes/db_connect.php';

// Get all blog posts from the database
$sql = "SELECT * FROM blogs ORDER BY published_on DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$blogs = $stmt->fetchAll();
?>
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
         <!-- Contact Section Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Get In Touch</p>
            <h1 class="display-3">Contact For Any Queries</h1>
        </div>

        <!-- Contact Form (Normal Submission) -->
        <form id="contact-form" action="https://formspree.io/f/xkgwarar" method="POST">
            <div class="row g-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="fas fa-user"></i></span>
                        <input type="text" name="name" class="form-control bg-transparent p-3" placeholder="Your Name" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control bg-transparent p-3" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="fas fa-tag"></i></span>
                        <input type="text" name="subject" class="form-control bg-transparent p-3" placeholder="Subject" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="fas fa-comment-dots"></i></span>
                        <textarea name="message" class="w-100 form-control bg-transparent p-3" rows="6" placeholder="Your Message" required></textarea>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary border-0 py-3 px-5" type="submit">Send Message</button>
                </div>
            </div>
        </form>

        <!-- Contact Info -->
        <div class="container my-5">
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
            <h5>Our Fellowship Location</h5>
            <p>Nyanchwa Mission Hospital SDA Church, Kisii Town</p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-phone fa-3x text-primary mb-3"></i>
            <h5>Contact Us</h5>
            <p>Director: <a href="tel:+254111289899">+254 111 289 899</a><br>
            Secretary: <a href="tel:+254727456619">+254 727 456 619</a></p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-envelope fa-3x text-primary mb-3"></i>
            <h5>Email Us</h5>
            <p><a href="mailto:info@crownministerschoir.com">crownministerschoir@gmail.com</a></p>
        </div>
    </div>
</div>

    </div>
</div>
<!-- Contact Section End -->

<!-- FontAwesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    </body>
</html>
<?php include 'includes/footer.php'; ?>

