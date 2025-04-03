<?php
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'timeless_memories';
$username = 'root'; // default XAMPP username
$password = '';     // default XAMPP password

try {
    // Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start user session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['name'];
                
                // Remember me functionality
                if (isset($_POST['remember'])) {
                    $cookie_name = 'remember_me';
                    $cookie_value = $user['id'] . ':' . hash('sha256', $user['password']);
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 30 days
                }
                
                header("Location: admin.php");
                exit();
            } else {
                // Password is incorrect
                header("Location: login.php?error=invalid_credentials");
                exit();
            }
        } else {
            // Email not found
            header("Location: login.php?error=user_not_found");
            exit();
        }
    }
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>