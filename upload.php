<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "photo_gallery");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure uploads directory exists
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $name = trim($_POST["name"]);
    $category = trim($_POST["category"]);
    $photo = $_FILES["photo"];

    // Validate inputs
    if (empty($name) || empty($category)) {
        die("<script>alert('Name and Category are required!'); window.location.href='admin.php';</script>");
    }

    // Check if file was uploaded without errors
    if ($photo["error"] !== 0) {
        die("<script>alert('File upload error!'); window.location.href='admin.php';</script>");
    }

    // Validate file type (allowing only images)
    $allowedTypes = ["jpg", "jpeg", "png", "gif"];
    $fileExt = strtolower(pathinfo($photo["name"], PATHINFO_EXTENSION));

    if (!in_array($fileExt, $allowedTypes)) {
        die("<script>alert('Invalid file type! Only JPG, JPEG, PNG, GIF allowed.'); window.location.href='admin.php';</script>");
    }

    // Generate unique file name
    $newFileName = uniqid("img_", true) . "." . $fileExt;
    $filePath = $uploadDir . $newFileName;

    // Move file and insert record
    if (move_uploaded_file($photo["tmp_name"], $filePath)) {
        $stmt = $conn->prepare("INSERT INTO photos (name, category, path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $category, $filePath);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Photo uploaded successfully'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Error uploading file'); window.location.href='admin.php';</script>";
    }
}
?>
