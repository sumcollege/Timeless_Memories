<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Gallery - Timeless Memories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" referrerpolicy="no-referrer" rel="stylesheet"/>
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
        
        /* Gallery item hover effect */
        .image-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .image-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .image-item img {
            transition: transform 0.5s ease;
        }
        
        .image-item:hover img {
            transform: scale(1.05);
        }
        
        /* Footer styles */
        footer {
            background-color: var(--dark);
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
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Timeless Memories - Gallery</h1>
            <div class="flex justify-center mt-4">
                <select class="p-2 border rounded bg-white" id="filter" onchange="filterImages()">
                    <option value="all">All Categories</option>
                    <?php
                    // Database connection
                    $conn = new mysqli("localhost", "root", "", "photo_gallery");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch unique categories from the photos table
                    $categoryQuery = "SELECT DISTINCT category FROM photos";
                    $categoryResult = $conn->query($categoryQuery);
                    while ($categoryRow = $categoryResult->fetch_assoc()) {
                        echo '<option value="' . $categoryRow['category'] . '">' . ucfirst($categoryRow['category']) . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <section id="gallery" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php
            // Fetch all photos from database
            $query = "SELECT * FROM photos";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="image-item bg-white rounded-lg shadow-lg overflow-hidden" data-category="' . $row['category'] . '">
                    <img src="' . $row['path'] . '" alt="Photo of ' . $row['name'] . ' in the category of ' . $row['category'] . '" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">' . $row['name'] . '</h3>
                        <span class="inline-block px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs mt-2">' . ucfirst($row['category']) . '</span>
                    </div>
                </div>';
            }
            ?>
        </section>
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
                        <li><a href="home.php" class="text-gray-400 hover:text-white">Portfolio</a></li>
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
                <p>© 2023 Timeless Memories. All rights reserved.</p>
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

        // Filter Images
        function filterImages() {
            var filter = document.getElementById('filter').value;
            var items = document.querySelectorAll('.image-item');
            items.forEach(function(item) {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>