<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // Hide errors from users (enable for debugging)

// Log function
function logError($message) {
    error_log(date("[Y-m-d H:i:s]") . " $message\n", 3, __DIR__ . "/download_errors.log");
}

// Validate input parameters
if (!isset($_GET['videoId']) || !isset($_GET['type']) || !isset($_GET['name'])) {
    logError("Invalid request - Missing parameters.");
    die("Invalid request");
}

// Sanitize inputs
$videoId = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['videoId']);
$type = ($_GET['type'] === 'mp3') ? 'mp3' : 'mp4'; // Only allow mp3 or mp4
$songName = htmlspecialchars($_GET['name']);
$safeSongName = preg_replace('/[^A-Za-z0-9_-]/', '_', $songName);

// File paths
$downloadDir = __DIR__ . "/downloads";
if (!is_dir($downloadDir)) {
    mkdir($downloadDir, 0777, true);
}
$filePath = "$downloadDir/$safeSongName.$type";

// Check if yt-dlp is installed
$ytDlpAvailable = shell_exec("command -v yt-dlp");
if ($ytDlpAvailable) {
    $ytCommand = $type === 'mp3' 
        ? "yt-dlp -x --audio-format mp3 --audio-quality 0 --output '$filePath' 'https://www.youtube.com/watch?v=$videoId' 2>&1"
        : "yt-dlp -f 'best' --output '$filePath' 'https://www.youtube.com/watch?v=$videoId' 2>&1";
    
    exec($ytCommand, $output, $returnCode);
    
    if ($returnCode !== 0) {
        logError("yt-dlp error: " . implode("\n", $output));
        die("Error downloading file.");
    }
    var_dump($youtubeUrl, $videoId);
    // Check if the downloaded file exists and is not empty
    
    if (!file_exists($filePath) || filesize($filePath) === 0) {
        logError("Download failed or empty file: $filePath");
        unlink($filePath);
        die("Download failed.");
    }
    
    // Serve the downloaded file
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$safeSongName.$type\"");
    header("Content-Length: " . filesize($filePath));
    readfile($filePath);
    unlink($filePath); // Delete file after download
    exit;
} else {
    // Fallback API-based download
    $mp3DownloadUrl = "https://api.vevioz.com/api/button/mp3/$videoId"; 
    $mp4DownloadUrl = "https://api.vevioz.com/api/button/mp4/$videoId";
    $downloadUrl = ($type === 'mp3') ? $mp3DownloadUrl : $mp4DownloadUrl;

    // Stream the file directly from API
    $fileContent = @file_get_contents($downloadUrl);
    if ($fileContent === false) {
        logError("Failed to fetch file from API: $downloadUrl");
        die("Failed to fetch the file.");
    }

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$safeSongName.$type\"");
    echo $fileContent;
    exit;
}
?>
