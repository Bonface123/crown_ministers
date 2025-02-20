<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get all blog posts from the database
$sql = "SELECT * FROM blogs";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$blogs = $stmt->fetchAll();

include 'includes/header2.php';
?>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Manage Blogs</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="blog.php">Blogs</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Manage Blogs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Manage Blogs Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Blogs</p>
            <h1 class="display-3">Manage Blog Posts</h1>
        </div>
        <div class="mb-4 text-center">
            <a href="add_blog.php" class="btn btn-primary">Add New Blog Post</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Published On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($blogs as $blog): ?>
                        <tr>
                            <td><?= htmlspecialchars($blog['title']) ?></td>
                            <td><?= nl2br(htmlspecialchars(substr($blog['content'], 0, 100))) ?>...</td>
                            <td>
                                <?php if ($blog['image']): ?>
                                    <img src="uploads/<?= htmlspecialchars($blog['image']) ?>" alt="Blog Image" width="100" height="100">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($blog['published_on']) ?></td>
                            <td>
                                <a href="edit_blog.php?id=<?= $blog['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="delete_blog.php?id=<?= $blog['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Manage Blogs Section End -->

<?php include 'includes/footer2.php'; ?>
