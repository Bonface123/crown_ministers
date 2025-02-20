<?php include 'includes/header.php'; ?>

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
include('includes/db_connect.php');

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

    </body>
</html>
<?php include 'includes/footer.php'; ?>