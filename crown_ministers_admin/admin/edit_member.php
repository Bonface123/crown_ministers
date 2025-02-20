<?php
include('../includes/db_connect.php');
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch member details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM team WHERE id = ?");
    $stmt->execute([$id]);
    $member = $stmt->fetch();

    if (!$member) {
        echo "Member not found!";
        exit();
    }
} else {
    header('Location: manage_team.php');
    exit();
}

// Available roles for dropdown
$roles = ['Choir Leader', 'Singer', 'Musician', 'Backup Singer'];

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $description = $_POST['description'];

    // Handle image update if uploaded
    $image = $member['image']; // Keep existing image by default
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    // Update member details
    $sql = "UPDATE team SET name = ?, role = ?, image = ?, description = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $role, $image, $description, $id]);

    header('Location:team.php');
    exit();
}
?>
<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Member</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <h2>Edit Team Member</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($member['name']) ?>" required>

        <label>Role:</label>
        <select name="role" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?= htmlspecialchars($role) ?>" <?= $member['role'] == $role ? 'selected' : '' ?>>
                    <?= htmlspecialchars($role) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Current Image:</label><br>
        <?php if ($member['image']): ?>
            <img src="<?= htmlspecialchars($member['image']) ?>" alt="Image" width="100"><br>
        <?php else: ?>
            No image available<br>
        <?php endif; ?>

        <label>Change Image:</label>
        <input type="file" name="image">

        <label>Description:</label>
        <textarea name="description" required><?= htmlspecialchars($member['description']) ?></textarea>

        <button type="submit">Update Member</button>
    </form>
</body>

</html>
<?php include '../includes/footer.php'; ?>