<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience & Skills | Timeless Memories</title>
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
        
        /* Section Header (Common to all pages) */
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
        
        /* Form Elements (Common) */
        .form-group {
            margin-bottom: 1.5rem;
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
        }
        
        .submit-btn:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }

        /* Experience & Skills Section */
        .experience-skills {
            padding: 8rem 5%;
            background-color: #f8f9fa;
        }
        
        .skills-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .skills-column {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .skills-column h3 {
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            position: relative;
        }
        
        .skills-column h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--secondary);
        }
        
        .skill-item {
            margin-bottom: 1.5rem;
        }
        
        .skill-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        
        .skill-name {
            font-weight: 500;
        }
        
        .skill-percent {
            color: var(--secondary);
            font-weight: 600;
        }
        
        .skill-bar {
            height: 8px;
            background-color: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .skill-progress {
            height: 100%;
            background-color: var(--primary);
            border-radius: 4px;
            width: 0;
            transition: width 1.5s ease;
        }
        
        .experience-item {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px dashed #ddd;
        }
        
        .experience-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .experience-date {
            color: var(--secondary);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .experience-title {
            color: var(--primary);
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        
        .experience-company {
            color: #666;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .experience-description {
            color: #666;
            line-height: 1.6;
        }
        
        .certifications {
            list-style-type: none;
        }
        
        .certifications li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .certifications li::before {
            content: '\f058';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: var(--secondary);
            position: absolute;
            left: 0;
        }
        
        .equipment-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .equipment-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem;
            background-color: #f8f9fa;
            border-radius: 6px;
        }
        
        .equipment-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .stat-item {
            text-align: center;
            padding: 1.5rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
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
        @media (max-width: 992px) {
            .skills-container {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            nav {
                padding: 1rem 5%;
            }
            
            .nav-links {
                display: none;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .stats-container {
                grid-template-columns: 1fr 1fr;
            }
            
            .equipment-list {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav id="navbar">
        <a href="#" class="logo">Timeless <span>Memories</span></a>
        <div class="nav-links">
            <a href="index.php">Portfolio</a>
            <a href="gallery.php">Gallery</a>
            <a href="photographer.php">Photographer</a>
            <a href="experience-skills.php" class="active">Experience</a>
            <a href="contact.php">Contact</a>
            
        </div>
        <button class="login-btn">Login</button>
    </nav>
    
    <!-- Experience & Skills Section -->
    <section class="experience-skills">
        <div class="section-header">
            <h2>Experience & Skills</h2>
            <p>With over a decade of professional photography experience, I bring technical expertise and artistic vision to every project</p>
        </div>
        
        <div class="skills-container">
            <div class="skills-column">
                <h3>Technical Skills</h3>
                
                <div class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">Portrait Photography</span>
                        <span class="skill-percent">95%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 95%"></div>
                    </div>
                </div>
                
                <div class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">Wedding Photography</span>
                        <span class="skill-percent">90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%"></div>
                    </div>
                </div>
                
                <div class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">Photo Editing</span>
                        <span class="skill-percent">92%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 92%"></div>
                    </div>
                </div>
                
                <div class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">Lightroom</span>
                        <span class="skill-percent">94%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 94%"></div>
                    </div>
                </div>
                
                <div class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">Photoshop</span>
                        <span class="skill-percent">88%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 88%"></div>
                    </div>
                </div>
                
                <div class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">Studio Lighting</span>
                        <span class="skill-percent">85%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 85%"></div>
                    </div>
                </div>
            </div>
            
            <div class="skills-column">
                <h3>Professional Experience</h3>
                
                <div class="experience-item">
                    <div class="experience-date">2020 - Present</div>
                    <h4 class="experience-title">Lead Photographer</h4>
                    <div class="experience-company">Timeless Memories Studio</div>
                    <p class="experience-description">Leading a team of photographers, specializing in wedding and event photography with a focus on candid moments and storytelling through images.</p>
                </div>
                
                <div class="experience-item">
                    <div class="experience-date">2016 - 2020</div>
                    <h4 class="experience-title">Freelance Photographer</h4>
                    <div class="experience-company">Self-Employed</div>
                    <p class="experience-description">Worked with various clients worldwide, expanding portfolio to include commercial and landscape photography while developing a distinctive style.</p>
                </div>
                
                <div class="experience-item">
                    <div class="experience-date">2013 - 2016</div>
                    <h4 class="experience-title">Photography Instructor</h4>
                    <div class="experience-company">Creative Arts Academy</div>
                    <p class="experience-description">Taught photography techniques and post-processing to aspiring photographers, developing curriculum for digital photography courses.</p>
                </div>
            </div>
            
            <div class="skills-column">
                <h3>Certifications & Equipment</h3>
                
                <h4 style="margin-top: 1.5rem; margin-bottom: 1rem; color: var(--primary);">Certifications</h4>
                <ul class="certifications">
                    <li>Certified Professional Photographer (CPP)</li>
                    <li>Adobe Certified Expert (Photoshop)</li>
                    <li>Master of Wedding Photography</li>
                    <li>Lightroom Professional Certification</li>
                </ul>
                
                <h4 style="margin-top: 2rem; margin-bottom: 1rem; color: var(--primary);">Equipment</h4>
                <div class="equipment-list">
                    <div class="equipment-item">
                        <div class="equipment-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <span>Canon EOS R5</span>
                    </div>
                    <div class="equipment-item">
                        <div class="equipment-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <span>Sony A7 IV</span>
                    </div>
                    <div class="equipment-item">
                        <div class="equipment-icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <span>DJI Ronin</span>
                    </div>
                    <div class="equipment-item">
                        <div class="equipment-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <span>Profoto Lighting</span>
                    </div>
                    <div class="equipment-item">
                        <div class="equipment-icon">
                            <i class="fas fa-lens"></i>
                        </div>
                        <span>24-70mm f/2.8</span>
                    </div>
                    <div class="equipment-item">
                        <div class="equipment-icon">
                            <i class="fas fa-lens"></i>
                        </div>
                        <span>85mm f/1.4</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-number">12+</div>
                <div class="stat-label">Years Experience</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">Clients Served</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50+</div>
                <div class="stat-label">Weddings Captured</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">10K+</div>
                <div class="stat-label">Photos Taken</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Client Satisfaction</div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <h3>About Us</h3>
                <p>Timeless Memories is dedicated to capturing life's precious moments with artistic vision and technical excellence. Our photographers bring passion and creativity to every project.</p>
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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="experience-skills.html">Experience</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Photographer</a></li>
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
                    <li><a href="#">Prints & Albums</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Newsletter</h3>
                <p>Subscribe to our newsletter for the latest updates and photography tips.</p>
                <form>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <button type="submit" class="submit-btn">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="copyright">
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
        
        // Animate skill bars on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const skillBars = document.querySelectorAll('.skill-progress');
            
            const animateSkills = () => {
                skillBars.forEach(bar => {
                    const percent = bar.parentElement.previousElementSibling.querySelector('.skill-percent').textContent;
                    bar.style.width = percent;
                });
            };
            
            // Intersection Observer to trigger animation when skills section is in view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateSkills();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });
            
            const skillsSection = document.querySelector('.experience-skills');
            if (skillsSection) {
                observer.observe(skillsSection);
            }
            
            // Form submission handling
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Thank you for your message! We will get back to you soon.');
                    form.reset();
                });
            });
        });
    </script>
</body>
</html>