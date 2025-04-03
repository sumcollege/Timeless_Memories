<?php
// Database connection
$host = "localhost";
$username = "root";  // Change if needed
$password = "";      // Set your MySQL password
$database = "contact_db";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        die("❌ All fields are required!");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ Invalid email format!");
    }

    // Prepare and execute SQL query (prevent SQL injection)
    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute and confirm success
    if ($stmt->execute()) {
        echo "✅ Message sent successfully!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
}

$conn->close();
?>
