<?php
include('includes/db_connect.php');

// Get all team members from the database
$sql = "SELECT * FROM team";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$team_members = $stmt->fetchAll();

// Include the header
include('includes/header.php');
?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Meet Our Choir</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Our Choir</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Team Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Choir Team</p>
            <h1 class="display-3">Our Dedicated Members</h1>
        </div>
        <div class="row">
            <?php foreach ($team_members as $member): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center shadow">
                        <?php 
                        // Check if image exists and prepend uploads/ if necessary
                        $imagePath = $member['image'] ? 'uploads/' . htmlspecialchars($member['image']) : 'default-image.jpg';
                        ?>
                        <img src="<?= $imagePath ?>" class="card-img-top" alt="<?= htmlspecialchars($member['name']) ?>">

                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($member['name']) ?></h5>
                            <p class="card-text"><strong><?= htmlspecialchars($member['role']) ?></strong></p>
                            <p class="card-text"><?= nl2br(htmlspecialchars($member['description'])) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Team Section End -->

<?php include('includes/footer.php'); ?>
