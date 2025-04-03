<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "photo_gallery");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// fetch.php - Retrieves uploaded photos
$sql = "SELECT * FROM photos ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td><img src='{$row['path']}' width='100' height='70'></td>
                <td>{$row['name']}</td>
                <td>{$row['category']}</td>
                <td>
                    <button class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline' onclick='deletePhoto({$row['id']})'>Delete</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No photos uploaded yet.</td></tr>";
}

$conn->close();
?>
