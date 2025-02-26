<?php 
include 'includes/header.php'; 
include 'includes/db_connect.php';

// Get active events from the database
$sql = "SELECT * FROM events WHERE status = 'active' ORDER BY event_date ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll();
?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn" id="hero-content">
                    <h1 class="display-1 text-dark" id="hero-title">Upcoming Events</h1>
                    <p class="fs-4 text-dark" id="hero-description">Join us for our upcoming events and gatherings.</p>
                    <ol class="breadcrumb mb-0" id="hero-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Upcoming Events</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Events Start -->
<div class="container-fluid event py-5">
    <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
            Upcoming <span class="text-primary">Events</span>
        </h1>

        <?php if (count($events) > 0): ?>
            <?php foreach ($events as $index => $event): ?>
                <div class="row g-4 event-item wow fadeIn" data-wow-delay="<?= 0.1 * ($index + 1) ?>s">
                    <div class="col-3 col-lg-2 pe-0">
                        <div class="text-center border-bottom border-dark py-3 px-2">
                            <!-- Fetch Date & Time Separately -->
                            <h6><?= date('d M Y', strtotime($event['event_date'])) ?></h6>
                            <?php if (!empty($event['event_time'])): ?>
                                <p class="mb-0"><?= date('D, h:i A', strtotime($event['event_time'])) ?></p>
                            <?php else: ?>
                                <p class="mb-0">Time Not Available</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-9 col-lg-6 border-start border-dark pb-5">
                        <div class="ms-3">
                            <h4 class="mb-3"><?= htmlspecialchars($event['event_name']) ?></h4>
                            <p class="mb-4">
                                <?= htmlspecialchars($event['event_description']) ?>
                            </p>
                            <!-- Fixed Join Now Button -->
                            <a href="join.php?event_id=<?= urlencode($event['id']) ?>" 
                               class="btn btn-primary px-3">
                                Join Now
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="overflow-hidden mb-5 text-center">
                            <?php if (!empty($event['event_image'])): ?>
                                <img src="uploads/<?= htmlspecialchars($event['event_image']) ?>" 
                                     class="img-fluid w-100" 
                                     alt="<?= htmlspecialchars($event['event_name']) ?>">
                            <?php else: ?>
                                <i class="fas fa-calendar-alt text-muted" style="font-size: 5rem;"></i>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-muted">No upcoming events at the moment. Please check back later.</p>
        <?php endif; ?>
    </div>
</div>
<!-- Events End -->

<?php include 'includes/footer.php'; ?>
