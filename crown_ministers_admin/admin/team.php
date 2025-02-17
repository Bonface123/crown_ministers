<?php
include('../includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}
//include '../includes/header.php';

// Get all team members from the database
$sql = "SELECT * FROM team";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$team_members = $stmt->fetchAll();
//include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Team</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <h2>Manage Team</h2>
    <a href="add_member.php">Add New Member</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($team_members as $member): ?>
                <tr>
                    <td><?= htmlspecialchars($member['name']) ?></td>
                    <td><?= htmlspecialchars($member['role']) ?></td>
                    <td>
                        <?php if ($member['image']): ?>
                            <img src="<?= htmlspecialchars($member['image']) ?>" alt="Image" width="80">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td><?= nl2br(htmlspecialchars($member['description'])) ?></td>
                    <td>
                        <a href="edit_member.php?id=<?= $member['id'] ?>">Edit</a> |
                        <a href="delete_member.php?id=<?= $member['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<?php include '../includes/footer.php'; ?>

