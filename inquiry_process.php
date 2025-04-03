<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "photography_inquiry";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $event_type = htmlspecialchars($_POST['event_type']);
    $event_date = htmlspecialchars($_POST['event_date']);
    $budget = htmlspecialchars($_POST['budget']);
    $message = htmlspecialchars($_POST['message']);

  
    $stmt = $conn->prepare("INSERT INTO inquiries (name, email, phone, event_type, event_date, budget, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $phone, $event_type, $event_date, $budget, $message);

   
    if ($stmt->execute()) {
        echo "<script>alert('Your inquiry has been submitted successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error submitting inquiry. Please try again.'); window.history.back();</script>";
    }

   
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
?>
