<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get the blog ID from the URL
$blog_id = $_GET['id'];

// Fetch the blog details from the database
$sql = "SELECT * FROM blogs WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$blog_id]);
$blog = $stmt->fetch();

// Check if the blog exists
if (!$blog) {
    echo "Blog not found!";
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title   = $_POST['title'];
    $content = $_POST['content'];
    $image   = $_FILES['image']['name'];
    $target_dir = "uploads/";

    // If a new image is uploaded, move it to the uploads directory
    if ($image) {
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    } else {
        // If no new image is uploaded, retain the old image
        $image = $blog['image'];
    }

    // Update the blog details in the database
    $sql = "UPDATE blogs SET title = ?, content = ?, image = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $image, $blog_id]);

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
                    <h1 class="display-1 text-dark">Edit Blog Post</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="blog.php">Blogs</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Edit Blog Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Edit Blog Post Section Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Edit Blog Post</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($blog['title']) ?>" placeholder="Blog Title" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="content" class="form-control" placeholder="Blog Content" rows="5" required><?= htmlspecialchars($blog['content']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload New Image (Optional):</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <p>Current Image:</p>
                                <img src="uploads/<?= htmlspecialchars($blog['image']) ?>" alt="Current Image" width="100">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Blog Post Section End -->

<?php include 'includes/footer2.php'; ?>
