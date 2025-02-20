<?php
include('includes/db_connect.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Check if the song ID is provided
if (!isset($_GET['id'])) {
    die('Song ID is missing');
}

$song_id = $_GET['id'];

// Get song details from the database
$sql = "SELECT * FROM youtube_songs WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$song_id]);
$song = $stmt->fetch();

if (!$song) {
    die('Song not found');
}

// Handle form submission for editing song details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $song_name   = trim($_POST['song_name']);
    $youtube_url = trim($_POST['youtube_url']);
    $description = trim($_POST['description']);

    // Process new song cover if uploaded; otherwise, retain existing cover
    $song_cover = $song['song_cover'];
    if (isset($_FILES['song_cover']) && $_FILES['song_cover']['error'] == 0) {
        $allowed = array("jpg", "jpeg", "png", "gif");
        $fileName = $_FILES['song_cover']['name'];
        $fileTmpName = $_FILES['song_cover']['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        if (in_array($fileExt, $allowed)) {
            // Create a unique file name to avoid collisions
            $newCover = uniqid() . '.' . $fileExt;
            $destination = "uploads/" . $newCover;
            
            if (move_uploaded_file($fileTmpName, $destination)) {
                $song_cover = $newCover;
            } else {
                $error = "Error uploading song cover.";
            }
        } else {
            $error = "Invalid file type for song cover. Allowed types: jpg, jpeg, png, gif.";
        }
    }
    
    // If no error, update the song details
    if (empty($error)) {
        $sql = "UPDATE youtube_songs SET song_name = ?, youtube_url = ?, description = ?, song_cover = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$song_name, $youtube_url, $description, $song_cover, $song_id]);
        
        header('Location: youtube.php');
        exit();
    }
}

include('includes/header2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Song Details - Crown Ministers Choir</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Hero Section -->
    <div class="container-fluid hero-header">
        <div class="container">
             <div class="row">
                  <div class="col-lg-7">
                       <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Edit Song Details</h1>
                            <ol class="breadcrumb mb-0">
                                 <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                 <li class="breadcrumb-item"><a href="youtube.php">YouTube Songs</a></li>
                                 <li class="breadcrumb-item text-dark" aria-current="page">Edit Song</li>
                            </ol>
                       </div>
                  </div>
             </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Edit Song Section Start -->
    <div class="container-fluid activities py-5">
        <div class="container py-5">
             <div class="row justify-content-center">
                  <div class="col-md-8">
                       <div class="card shadow-sm">
                            <div class="card-body">
                                 <h2 class="card-title text-center mb-4">Edit Song Details</h2>
                                 <?php if (!empty($error)): ?>
                                     <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                                 <?php endif; ?>
                                 <form method="POST" enctype="multipart/form-data">
                                      <div class="mb-3">
                                           <label for="song_name" class="form-label">Song Title</label>
                                           <input type="text" name="song_name" id="song_name" class="form-control" value="<?= htmlspecialchars($song['song_name']) ?>" required>
                                      </div>
                                      <div class="mb-3">
                                           <label for="youtube_url" class="form-label">YouTube URL</label>
                                           <input type="url" name="youtube_url" id="youtube_url" class="form-control" value="<?= htmlspecialchars($song['youtube_url']) ?>" required>
                                      </div>
                                      <div class="mb-3">
                                           <label for="description" class="form-label">Description</label>
                                           <textarea name="description" id="description" class="form-control" rows="4" required><?= htmlspecialchars($song['description']) ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                           <label for="song_cover" class="form-label">Song Cover (Optional)</label>
                                           <input type="file" name="song_cover" id="song_cover" class="form-control">
                                           <?php if (!empty($song['song_cover'])): ?>
                                               <small class="form-text text-muted">Current Cover:</small>
                                               <img src="uploads/<?= htmlspecialchars($song['song_cover']) ?>" alt="Current Cover" class="img-fluid mt-2" style="max-width: 150px;">
                                           <?php else: ?>
                                               <small class="form-text text-muted">No cover image uploaded.</small>
                                           <?php endif; ?>
                                      </div>
                                      <div class="text-center">
                                           <button type="submit" class="btn btn-primary">Update Song</button>
                                      </div>
                                 </form>
                                 <div class="text-center mt-3">
                                      <a href="youtube.php" class="btn btn-secondary">Back to Manage Songs</a>
                                 </div>
                            </div>
                       </div>
                  </div>
             </div>
        </div>
    </div>
    <!-- Edit Song Section End -->

<?php include('includes/footer2.php'); ?>
</body>
</html>
