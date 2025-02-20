<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];

    // Move the uploaded image to the uploads directory
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Insert blog post into the database
    $sql = "INSERT INTO blogs (title, content, image) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $image]);

    header('Location: blog.php');
    exit();
}
?>
<?php include '../includes/header.php'; ?>
<body>
    <h2>Add New Blog Post</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Blog Title" required>
        <textarea name="content" placeholder="Blog Content" required></textarea>
        <input type="file" name="image" required>
        <button type="submit">Add Blog</button>
    </form>
</body>
</html>
<?php include '../includes/footer.php'; ?>
