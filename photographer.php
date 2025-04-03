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

// Fetch photographers from the database
$sql = "SELECT * FROM photographers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographers List - Timeless Memories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #e74c3c;
            --light: #ecf0f1;
            --dark: #1a252f;
            --accent: #3498db;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light);
            color: var(--dark);
        }
        
        /* Navigation styles to match the first design */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(44, 62, 80, 0.9);
            backdrop-filter: blur(10px);
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        nav.scrolled {
            padding: 1rem 5%;
            background-color: rgba(26, 37, 47, 0.98);
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }
        
        .logo span {
            color: var(--secondary);
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--secondary);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .login-btn {
            background-color: var(--secondary);
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .login-btn:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }
        
        .hamburger {
            display: none;
            cursor: pointer;
            color: white;
            font-size: 1.8rem;
        }
        
        /* Photographer card styles */
        .photographer-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .photographer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .photographer-img {
            transition: transform 0.5s ease;
            height: 250px;
            object-fit: cover;
        }
        
        .photographer-card:hover .photographer-img {
            transform: scale(1.05);
        }
        
        .specialty-badge {
            background-color: var(--secondary);
            color: white;
        }
        
        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 80px);
                background-color: var(--dark);
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                padding-top: 2rem;
                transition: all 0.5s ease;
            }
            
            .nav-links.active {
                left: 0;
            }
            
            .hamburger {
                display: block;
            }
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Navigation -->
    <nav id="navbar">
        <a href="#" class="logo">Timeless <span>Memories</span></a>
        <div class="nav-links" id="navLinks">
            <a href="index.php">Portfolio</a>
            <a href="gallery.php">Gallery</a>
            <a href="photographer.php">Photographer</a>
            <a href="experience.php">Experience</a>
            <a href="contact.php">Contact</a>
        </div>
        <a href="login.php"><button class="login-btn">Login</button></a>
        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>

    <!-- Main Content - Adjusted padding to account for fixed nav -->
    <main class="container mx-auto py-24 flex-grow px-4">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Our Photographers</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Meet our talented team of professional photographers who specialize in capturing your most precious moments.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="photographer-card">';
                    echo '<div class="overflow-hidden rounded-t-lg">';
                    echo '<img src="uploads/' . $row["photo"] . '" alt="' . $row["name"] . '" class="w-full photographer-img">';
                    echo '</div>';
                    echo '<div class="p-6">';
                    echo '<h3 class="text-xl font-semibold mb-1">' . $row["name"] . '</h3>';
                    echo '<span class="inline-block px-3 py-1 text-xs font-semibold rounded-full specialty-badge mb-2">' . $row["speciality"] . '</span>';
                    echo '<p class="text-gray-600 mb-2"><i class="fas fa-envelope mr-2"></i>' . $row["email"] . '</p>';
                    echo '<p class="text-gray-600"><i class="fas fa-phone mr-2"></i>' . ($row["phone"] ?? 'N/A') . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center text-gray-700 col-span-full">No photographers found.</p>';
            }
            $conn->close();
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Timeless Memories</h3>
                    <p class="text-gray-400">Capturing your precious moments with creativity and passion.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-400 hover:text-white">Portfolio</a></li>
                        <li><a href="gallery.php" class="text-gray-400 hover:text-white">Gallery</a></li>
                        <li><a href="photographer.php" class="text-gray-400 hover:text-white">Photographer</a></li>
                        <li><a href="experience.php" class="text-gray-400 hover:text-white">Experience</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Information</h4>
                    <ul class="space-y-2">
                        <li><a href="contact.php" class="text-gray-400 hover:text-white">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                            <span>123 Photography St, Creative City</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            <span>+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>info@timelessmemories.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>© 2025 Timeless Memories. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Mobile menu toggle
        document.getElementById('hamburger').addEventListener('click', function() {
            document.getElementById('navLinks').classList.toggle('active');
        });
        
        // Close mobile menu when clicking a link
        document.querySelectorAll('#navLinks a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('navLinks').classList.remove('active');
            });
        });
    </script>
</body>
</html>