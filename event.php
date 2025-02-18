<?php include 'crown_ministers_admin/includes/header.php'; ?>
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

<?php
include('crown_ministers_admin/includes/db_connect.php');

// Get active events from the database
$sql = "SELECT * FROM events WHERE status = 'active' ORDER BY event_date ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll();
?>

<!--<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch events dynamically from PHP
        let slides = <?php echo json_encode(array_map(function($event) {
            return [
                'image' => "crown_ministers_admin/uploads/" . htmlspecialchars($event['event_image']),
                'title' => htmlspecialchars($event['event_name']),
                'description' => htmlspecialchars($event['event_description']),
                'breadcrumb' => '
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">' . htmlspecialchars($event['event_name']) . '</li>'
            ];
        }, $events)); ?>;

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
</script>-->


<!--<script>
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
</style> -->



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
    </body>
</html>
<?php include 'crown_ministers_admin/includes/footer.php'; ?>