<?php
// blog_details.php

include('includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Check if blog ID is provided
if (!isset($_GET['id'])) {
    die("Blog ID not provided.");
}

$blog_id = $_GET['id'];

// Fetch blog details from the database
$sql = "SELECT * FROM blogs WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$blog_id]);
$blog = $stmt->fetch();

if (!$blog) {
    die("Blog not found.");
}

include('includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($blog['title']); ?> - Blog Details</title>
    <style>
        /* Custom styling for blog content */
        .blog-content {
            font-size: 1rem;
            line-height: 1.6;
            text-align: justify;
            margin-bottom: 20px;
        }
        /* Enhanced styling for blog image */
        .blog-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Hero Section Start -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark"><?= htmlspecialchars($blog['title']); ?></h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="blog.php">Manage Blogs</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">Blog Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Blog Details Section Start -->
    <div class="container-fluid activities py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <!-- Blog Title -->
                    <h2 class="mb-4 text-center"><?= htmlspecialchars($blog['title']); ?></h2>
                    
                    <!-- Blog Image -->
                    <?php if (!empty($blog['image'])): ?>
                        <div class="mb-4 text-center">
                            <img src="uploads/<?= htmlspecialchars($blog['image']); ?>" alt="<?= htmlspecialchars($blog['title']); ?>" class="blog-image">
                        </div>
                    <?php endif; ?>
                    
                    <!-- Blog Content -->
                    <div class="blog-content mb-4">
                        <?= nl2br(htmlspecialchars($blog['content'])); ?>
                    </div>
                    
                    <!-- Published Date -->
                    <p class="text-muted">
                        Published on: <?= date("Y-m-d H:i", strtotime($blog['published_on'])); ?>
                    </p>
                    
                    <!-- Navigation Link -->
                    <div class="text-center mt-4">
                        <a href="blogv.php" class="btn btn-primary">Back to Blogs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Section End -->

<?php include('includes/footer.php'); ?>
</body>
</html>
