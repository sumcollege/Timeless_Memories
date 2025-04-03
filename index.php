<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeless Memories | Photography Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #e74c3c;
            --light: #ecf0f1;
            --dark: #1a252f;
            --accent: #3498db;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--dark);
            overflow-x: hidden;
        }
        
        /* Navigation */
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
        
        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 10%;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1493863641943-9b68992a8d07?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2058&q=80') no-repeat center center/cover;
            z-index: -1;
        }
        
        .hero-content {
            max-width: 600px;
            color: white;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .cta-btn {
            display: inline-block;
            background-color: var(--secondary);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--secondary);
        }
        
        .cta-btn:hover {
            background-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .social-icons {
            position: absolute;
            bottom: 5%;
            left: 10%;
            display: flex;
            gap: 1.5rem;
        }
        
        .social-icons a {
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            color: var(--secondary);
            transform: translateY(-3px);
        }
        
        /* Floating Elements */
        .floating-camera {
            position: absolute;
            right: 10%;
            top: 50%;
            transform: translateY(-50%);
            width: 300px;
            height: 300px;
            background: url('https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80') no-repeat center center/cover;
            border-radius: 50%;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(-50%) translateX(0px); }
            50% { transform: translateY(-50%) translateX(-20px); }
            100% { transform: translateY(-50%) translateX(0px); }
        }
        
        /* Portfolio Section */
        .portfolio {
            padding: 8rem 5%;
            background-color: white;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        
        .section-header h2 {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        
        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--secondary);
        }
        
        .section-header p {
            color: #777;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .filter-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 3rem;
        }
        
        .filter-btn {
            padding: 0.6rem 1.5rem;
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-btn.active, .filter-btn:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            aspect-ratio: 1/1;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        
        .gallery-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(44, 62, 80, 0.8);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-item:hover .overlay {
            opacity: 1;
        }
        
        .overlay h3 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .overlay p {
            color: #ddd;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .view-btn {
            padding: 0.5rem 1.5rem;
            background-color: var(--secondary);
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .view-btn:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 4rem 5% 2rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }
        
        .footer-column h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--secondary);
        }
        
        .footer-column p {
            margin-bottom: 1rem;
            line-height: 1.6;
            color: #ddd;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #ddd;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--secondary);
            padding-left: 5px;
        }
        
        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .footer-social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            transition: all 0.3s ease;
        }
        
        .footer-social a:hover {
            background-color: var(--secondary);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero h1 {
                font-size: 3rem;
            }
            
            .floating-camera {
                width: 250px;
                height: 250px;
            }
        }
        
        @media (max-width: 992px) {
            .floating-camera {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .gallery {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            nav {
                padding: 1rem 5%;
            }
            
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
            
            .hero {
                padding: 0 5%;
                text-align: center;
            }
            
            .hero-content {
                margin: 0 auto;
            }
            
            .social-icons {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .cta-btn {
                padding: 0.7rem 1.5rem;
                font-size: 0.9rem;
            }
            
            .filter-buttons {
                gap: 0.5rem;
            }
            
            .filter-btn {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }
            
            .gallery {
                grid-template-columns: 1fr;
            }
            
            .section-header h2 {
                font-size: 1.8rem;
            }
            
            .section-header p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav id="navbar">
        <a href="#" class="logo">Timeless <span>Memories</span></a>
        <div class="nav-links" id="navLinks">
            <a href="#portfolio">Portfolio</a>
            <a href="gallery.php">Gallery</a>
            <a href="photographer.php">Photographer</a>
            <a href="experience.php">Experience</a>
            <a href="contact.php">Contact</a>
        </div>
      <a href="login.php"> <button class="login-btn">Login</button></a>
        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to our photography portfolio!</h1>
            <p>As a passionate photographer capturing moments that last a lifetime. Our work is focused on portraiture, landscapes, and events, all told through our unique perspective.</p>
            <a href="inquiry.php"class="cta-btn">Inquiry Now</a>
        </div>
        
        <div class="floating-camera"></div>
        
        <div class="social-icons">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-pinterest-p"></i></a>
        </div>
    </section>
    
    <!-- Portfolio Section -->
    <section class="portfolio" id="portfolio">
        <div class="section-header">
            <h2>Our Portfolio</h2>
            <p>Explore our collection of stunning photographs that capture the essence of every moment</p>
        </div>
        
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="portrait">Portraits</button>
            <button class="filter-btn" data-filter="landscape">Landscapes</button>
            <button class="filter-btn" data-filter="event">Events</button>
            <button class="filter-btn" data-filter="wedding">Weddings</button>
        </div>
        
        <div class="gallery">
            <!-- Portrait -->
            <div class="gallery-item" data-category="portrait">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" alt="Portrait">
                <div class="overlay">
                    <h3>Urban Portrait</h3>
                    <p>Street style portrait session</p>
                    <button class="view-btn">View</button>
                </div>
            </div>
            
            <!-- Landscape -->
            <div class="gallery-item" data-category="landscape">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Landscape">
                <div class="overlay">
                    <h3>Mountain View</h3>
                    <p>Sunrise at the Rockies</p>
                    <button class="view-btn">View</button>
                </div>
            </div>
            
            <!-- Event -->
            <div class="gallery-item" data-category="event">
                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Concert">
                <div class="overlay">
                    <h3>Music Festival</h3>
                    <p>Summer beats night</p>
                    <button class="view-btn">View</button>
                </div>
            </div>
            
            <!-- Wedding -->
            <div class="gallery-item" data-category="wedding">
                <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Wedding">
                <div class="overlay">
                    <h3>Wedding Day</h3>
                    <p>Sarah & Michael's special day</p>
                    <button class="view-btn">View</button>
                </div>
            </div>
            
            <!-- Portrait -->
            <div class="gallery-item" data-category="portrait">
                <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Portrait">
                <div class="overlay">
                    <h3>Studio Portrait</h3>
                    <p>Professional headshot session</p>
                    <button class="view-btn">View</button>
                </div>
            </div>
            
            <!-- Landscape -->
            <div class="gallery-item" data-category="landscape">
                <img src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1274&q=80" alt="Landscape">
                <div class="overlay">
                    <h3>Misty Forest</h3>
                    <p>Morning fog in the woods</p>
                    <button class="view-btn">View</button>
                </div>
            </div>
            
            <!-- Event -->
            <div class="gallery-item" data-category="event">
                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Event">
                <div class="overlay">
                    <h3>Corporate Event</h3>
                    <p>Annual company conference</p>
                    <button class="view-btn">View</button>
                </div>
            </div>
            
            <!-- Wedding -->
            <div class="gallery-item" data-category="wedding">
                <img src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Wedding">
                <div class="overlay">
                    <h3>Beach Wedding</h3>
                    <p>Sunset ceremony</p>
                    <button class="view-btn">View</button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer Section -->
    <footer id="contact">
        <div class="footer-content">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>Timeless Memories is a professional photography studio dedicated to capturing your most precious moments with artistic vision and technical excellence.</p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
            
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Services</h3>
                <ul class="footer-links">
                    <li><a href="#">Wedding Photography</a></li>
                    <li><a href="#">Portrait Sessions</a></li>
                    <li><a href="#">Event Coverage</a></li>
                    <li><a href="#">Commercial Photography</a></li>
                    <li><a href="#">Photo Editing</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 Photography St, Creative City</p>
                <p><i class="fas fa-phone"></i> +1 (555) 123-4567</p>
                <p><i class="fas fa-envelope"></i> info@timelessmemories.com</p>
                <p><i class="fas fa-clock"></i> Mon-Fri: 9AM - 6PM</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2023 Timeless Memories. All Rights Reserved. | Designed with passion for photography</p>
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
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const navLinks = document.getElementById('navLinks');
                navLinks.classList.remove('active');
            });
        });
        
        // Portfolio filtering
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    const filterValue = this.getAttribute('data-filter');
                    
                    galleryItems.forEach(item => {
                        if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
            
            // Mobile menu toggle
            const hamburger = document.getElementById('hamburger');
            const navLinks = document.getElementById('navLinks');
            
            hamburger.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
        });
    </script>
</body>
</html>