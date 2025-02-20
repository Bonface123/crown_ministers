<?php include 'includes/header.php'; ?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn" id="hero-content">
                    <h1 class="display-1 text-dark" id="hero-title">Our Activities</h1>
                    <p class="fs-4 text-dark" id="hero-description">Discover our spirit-led activities that uplift and transform lives.</p>
                    <ol class="breadcrumb mb-0" id="hero-breadcrumb">
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


<?php include 'includes/footer.php'; ?>
