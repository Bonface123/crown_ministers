<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title   = $_POST['title'];
    $content = $_POST['content'];
    $image   = $_FILES['image']['name'];

    // Move the uploaded image to the uploads directory
    $target_dir  = "uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Insert blog post into the database
    $sql  = "INSERT INTO blogs (title, content, image) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $image]);

    header('Location: blog.php');
    exit();
}

include 'includes/header2.php';
?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Add New Blog Post</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="blog.php">Blogs</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Add New Blog Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Add Blog Post Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Add New Blog Post</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Blog Title" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="content" class="form-control" placeholder="Blog Content" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Blog Post Section End -->

<?php include 'includes/footer2.php'; ?>
