<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "photography_inquiry";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM inquiries ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Inquiries</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        table { width: 90%; margin: 20px auto; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #333; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Photography Inquiries</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Event Type</th>
            <th>Event Date</th>
            <th>Budget</th>
            <th>Message</th>
            <th>Submitted At</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['event_type']}</td>
                        <td>{$row['event_date']}</td>
                        <td>\${$row['budget']}</td>
                        <td>{$row['message']}</td>
                        <td>{$row['submitted_at']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9' style='text-align:center;'>No inquiries found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
