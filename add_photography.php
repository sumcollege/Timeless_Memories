<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "photography";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['photographer_name'];
    $email = $_POST['photographer_email'];
    $speciality = $_POST['photographer_speciality'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photographer_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["photographer_photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.'); window.location.href='admin.php';</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('Sorry, file already exists.'); window.location.href='admin.php';</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photographer_photo"]["size"] > 500000) {
        echo "<script>alert('Sorry, your file is too large.'); window.location.href='admin.php';</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location.href='admin.php';</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.'); window.location.href='admin.php';</script>";
    } else {
        if (move_uploaded_file($_FILES["photographer_photo"]["tmp_name"], $target_file)) {
            $photo = basename($_FILES["photographer_photo"]["name"]);

            // Insert data into database
            $sql = "INSERT INTO photographers (name, email, photo, speciality) VALUES ('$name', '$email', '$photo', '$speciality')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New photographer added successfully'); window.location.href='admin.php';</script>";
            } else {
                echo "<script>alert('Error: " . $conn->error . "'); window.location.href='admin.php';</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.'); window.location.href='admin.php';</script>";
        }
    }
}

$conn->close();
?>
