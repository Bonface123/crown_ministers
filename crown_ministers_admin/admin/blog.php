<?php
include('../includes/db_connect.php');
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
?>
<?php include '../includes/header.php'; ?>
<body>
    <h2>Manage Blogs</h2>
    <a href="add_blog.php">Add New Blog Post</a>
    <table>
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
                    <!-- Display Title -->
                    <td><?= htmlspecialchars($blog['title']) ?></td>
                    
                    <!-- Display Content -->
                    <td><?= nl2br(htmlspecialchars(substr($blog['content'], 0, 100))) ?>...</td>  <!-- Content snippet -->
                    
                    <!-- Display Image -->
                    <td><img src="../uploads/<?= htmlspecialchars($blog['image']) ?>" alt="Blog Image" width="100" height="100"></td>
                    
                    <!-- Display Published Date -->
                    <td><?= htmlspecialchars($blog['published_on']) ?></td>
                    
                    <td>
                        <!-- Link to Edit Blog -->
                        <a href="edit_blog.php?id=<?= $blog['id'] ?>">Edit</a> | 
                        
                        <!-- Link to Delete Blog -->
                        <a href="delete_blog.php?id=<?= $blog['id'] ?>" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?php include '../includes/footer.php'; ?>
