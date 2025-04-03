<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "photo_gallery");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// delete.php - Handles photo deletion
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Retrieve file path before deletion
    $stmt = $conn->prepare("SELECT path FROM photos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($filePath);
    $stmt->fetch();
    $stmt->close();
    
    if ($filePath && file_exists($filePath)) {
        unlink($filePath); // Delete the actual file
    }
    
    // Delete entry from database
    $stmt = $conn->prepare("DELETE FROM photos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    
    echo "<script>alert('Photo deleted successfully'); window.location.href='admin.php';</script>";
}
$conn->close();
?>
