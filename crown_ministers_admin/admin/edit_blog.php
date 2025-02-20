<?php
include('../includes/db_connect.php');
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
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target_dir = "../uploads/";

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
?>
<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Edit Blog Post</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" value="<?= htmlspecialchars($blog['title']) ?>" placeholder="Blog Title" required>
        <textarea name="content" placeholder="Blog Content" required><?= htmlspecialchars($blog['content']) ?></textarea>
        
        <!-- Image input (optional) -->
        <label for="image">Upload New Image (Optional):</label>
        <input type="file" name="image">
        
        <!-- Display existing image -->
        <p>Current Image: <img src="../uploads/<?= htmlspecialchars($blog['image']) ?>" alt="Current Image" width="100"></p>
        
        <button type="submit">Update Blog</button>
    </form>
</body>
</html>
<?php include '../includes/footer.php'; ?>
