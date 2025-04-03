<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Timeless Memories</title>
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
        
        .nav-links a.active {
            color: var(--secondary);
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
        
        .nav-links a:hover::after,
        .nav-links a.active::after {
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
        
        /* Mobile Menu */
        .mobile-menu {
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
            z-index: 999;
        }
        
        .mobile-menu.active {
            left: 0;
        }
        
        .mobile-menu a {
            color: white;
            text-decoration: none;
            padding: 1rem 0;
            font-size: 1.2rem;
            width: 100%;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .mobile-menu a.active {
            color: var(--secondary);
        }
        
        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            padding-top: 8rem;
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
            font-size: 1.1rem;
        }
        
        /* Contact Section */
        .contact {
            padding: 4rem 5%;
            background-color: white;
        }
        
        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .contact-card {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
        }
        
        .contact-icon {
            width: 50px;
            height: 50px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        
        .contact-details h3 {
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 1.3rem;
        }
        
        .contact-details p, 
        .contact-details a {
            color: #666;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 1rem;
            line-height: 1.6;
        }
        
        .contact-details a:hover {
            color: var(--secondary);
        }
        
        .contact-form {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary);
            font-weight: 500;
            font-size: 1rem;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .submit-btn {
            background-color: var(--secondary);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1rem;
        }
        
        .submit-btn:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }
        
        /* Map Section */
        .map-section {
            padding: 4rem 5%;
            background-color: #f8f9fa;
        }
        
        .map-container {
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: 500px;
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 4rem 5% 2rem;
        }
        
        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-col h3 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .footer-col h3::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--secondary);
        }
        
        .footer-col p {
            color: #bbb;
            margin-bottom: 1rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            font-size: 0.95rem;
        }
        
        .footer-links a:hover {
            color: var(--secondary);
            transform: translateX(5px);
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
        
        .copyright {
            text-align: center;
            padding-top: 3rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #bbb;
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .section-header {
                padding-top: 7rem;
            }
            
            .section-header h2 {
                font-size: 2.3rem;
            }
            
            .contact-container {
                gap: 2rem;
            }
        }
        
        @media (max-width: 992px) {
            .section-header {
                padding-top: 6rem;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .section-header p {
                font-size: 1rem;
            }
            
            .contact-card {
                gap: 1rem;
            }
            
            .contact-icon {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }
            
            .contact-details h3 {
                font-size: 1.2rem;
            }
            
            .map-container {
                height: 400px;
            }
        }
        
        @media (max-width: 768px) {
            nav {
                padding: 1rem 5%;
            }
            
            .nav-links {
                display: none;
            }
            
            .hamburger {
                display: block;
            }
            
            .section-header {
                padding-top: 5rem;
            }
            
            .section-header h2 {
                font-size: 1.8rem;
            }
            
            .contact-container {
                grid-template-columns: 1fr;
            }
            
            .contact-info {
                margin-bottom: 2rem;
            }
            
            .map-container {
                height: 350px;
            }
            
            .footer-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .section-header {
                padding-top: 4.5rem;
            }
            
            .section-header h2 {
                font-size: 1.6rem;
            }
            
            .section-header p {
                font-size: 0.95rem;
            }
            
            .contact-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            
            .contact-details h3 {
                font-size: 1.1rem;
            }
            
            .map-container {
                height: 300px;
            }
            
            .footer-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .footer-col {
                text-align: center;
            }
            
            .footer-col h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .footer-social {
                justify-content: center;
            }
            
            .footer-links a:hover {
                transform: none;
                color: var(--secondary);
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav id="navbar">
        <a href="index.php" class="logo">Timeless <span>Memories</span></a>
        <div class="nav-links">
            <a href="index.php">Portfolio</a>
            <a href="portfolio.php">Gallery</a>
            <a href="portfolio.php">Photographer</a>
            <a href="experience.php">Experience</a>
            <a href="contact.php" class="active">Contact</a>
         
        </div>
        <button class="login-btn">Login</button>
        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">   
        <a href="index.php">Portfolio</a>
        <a href="portfolio.php">Gallery</a>
        <a href="experience.php">Photographer</a>
        <a href="contact.php" class="active">Contact</a>
     
    </div>
    
    <!-- Contact Section -->
    <section class="contact">
        <div class="section-header">
            <h2>Contact Us</h2>
            <p>Get in touch with us for bookings, inquiries, or just to say hello!</p>
        </div>
        
        <div class="contact-container">
            <div class="contact-info">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Our Studio</h3>
                        <p>123 Photography Lane, Kathmandu 44600</p>
                        <p>Nepal</p>
                    </div>
                </div>
                
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Call Us</h3>
                        <p><a href="tel:+9771234567890">+977-1-2345678</a></p>
                        <p><a href="tel:+9779876543210">+977-9876543210</a></p>
                    </div>
                </div>
                
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Email Us</h3>
                        <p><a href="mailto:info@timelessmemories.com.np">info@timelessmemories.com.np</a></p>
                        <p><a href="mailto:bookings@timelessmemories.com.np">bookings@timelessmemories.com.np</a></p>
                    </div>
                </div>
                
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Working Hours</h3>
                        <p>Sunday-Friday: 9:00 AM - 6:00 PM</p>
                        <p>Saturday: 10:00 AM - 4:00 PM</p>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <form action="contact_process.php" method="POST">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
    </div>
                    
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" class="form-control" required></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>
    
    <!-- Map Section -->
    <section class="map-section">
        <div class="section-header">
            <h2>Find Us in Nepal</h2>
            <p>Visit our studio located in the heart of Kathmandu</p>
        </div>
        
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.456820477566!2d85.32047031506204!3d27.70520438279395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a64b5f13e1%3A0x28b2d0eacda46b98!2sKathmandu%2044600%2C%20Nepal!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <h3>About Us</h3>
                <p>Timeless Memories is dedicated to capturing Nepal's precious moments with artistic vision and technical excellence.</p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
            
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="experience.php">Experience</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Services</h3>
                <ul class="footer-links">
                    <li><a href="#">Wedding Photography</a></li>
                    <li><a href="#">Portrait Sessions</a></li>
                    <li><a href="#">Event Coverage</a></li>
                    <li><a href="#">Commercial Photography</a></li>
                    <li><a href="#">Photo Editing</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Newsletter</h3>
                <p>Subscribe for photography tips and special offers.</p>
                <form>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <button type="submit" class="submit-btn">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; <?php echo date("Y"); ?> Timeless Memories. All Rights Reserved. | Kathmandu, Nepal</p>
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
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        
        hamburger.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            this.classList.toggle('fa-times');
            this.classList.toggle('fa-bars');
        });
        
        // Close mobile menu when clicking on a link
        const mobileLinks = document.querySelectorAll('.mobile-menu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                hamburger.classList.remove('fa-times');
                hamburger.classList.add('fa-bars');
            });
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        


</body>
</html>