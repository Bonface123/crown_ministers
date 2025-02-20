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
    // Check if form data exists
    if (isset($_POST['song_name']) && isset($_POST['youtube_url']) && isset($_POST['description'])) {
        $song_name = $_POST['song_name'];
        $youtube_url = $_POST['youtube_url'];
        $description = $_POST['description']; // Capture description field

        // Insert song into the youtube_songs database table
        $sql = "INSERT INTO youtube_songs (song_name, youtube_url, description) VALUES (?, ?, ?)"; // Add description field in query
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$song_name, $youtube_url, $description]);

        header('Location: youtube.php');
        exit();
    } else {
        // Handle the case where form data is not set
        echo "Please fill out all fields.";
    }
}
?>
<?php include '../includes/header.php'; ?>
<body>
    <h2>Add New Song</h2>
    <form method="POST">
        <input type="text" name="song_name" placeholder="Song Title" required> <!-- Ensure name is song_name -->
        <input type="url" name="youtube_url" placeholder="YouTube URL" required> <!-- Ensure name is youtube_url -->
        <textarea name="description" placeholder="Song Description" required></textarea> <!-- Add description field -->
        <button type="submit">Add Song</button>
    </form>
</body>
</html>
<?php include '../includes/footer.php'; ?>
