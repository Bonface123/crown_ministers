<?php
include('../includes/db_connect.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Define available roles for the dropdown
$roles = ['Choir Leader', 'Singer', 'Musician', 'Backup Singer'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $description = $_POST['description'];

    // Handle file upload (image)
    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    // Insert member data into the database
    $sql = "INSERT INTO team (name, role, image, description) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $role, $image, $description]);

    header('Location: team.php');
    exit();
}
?>
<?php include '../includes/header.php'; ?>
<body>
    <h2>Add Team Member</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Role:</label>
        <select name="role" required>
            <option value="">Select Role</option>
            <?php foreach ($roles as $role): ?>
                <option value="<?= htmlspecialchars($role) ?>"><?= htmlspecialchars($role) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Image:</label>
        <input type="file" name="image">

        <label>Description:</label>
        <textarea name="description"></textarea>

        <button type="submit">Add Member</button>
    </form>
</body>
</html>
<?php include '../includes/footer.php'; ?>
