<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>UPSI - About</title>
    <link rel="icon" href="https://bendahari.upsi.edu.my/wp-content/uploads/2020/09/cropped-upsi-logo-1-180x180.png" type="image/png"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
        font-family: 'Poppins', sans-serif;
        scroll-behavior: smooth;
        }

        .header-bg {
            background: linear-gradient(rgba(187, 0, 0, 0.7), rgba(42, 0, 0, 0.7)), 
            url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }

        .feedback-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Header -->
    <?php include 'header.php' ?>

    <!-- Page Header -->
    <section class="header-bg text-white py-16 text-center">
        <?php
        require_once 'config/database.php';

        // Fetch the visible about section (is_visible = 1)
        // LIMIT 1 is used here as typically there's only one "About Us" section active at a time for the main page.
        $sql = "SELECT * FROM about_section WHERE is_visible = 1 LIMIT 1";
        $result = $conn->query($sql);

        if ($result === false) {
            echo "<p class='text-red-500'>SQL Error: " . $conn->error . "</p>";
            $about = []; // Initialize $about as an empty array
        } else {
            $about = $result->fetch_assoc();

            if ($about === null) {
                // If no visible section is found, you might want to display default content or a message
                echo "<p class='text-red-500'>No visible data found in about_section table. Please ensure at least one section is marked as visible in the admin panel.</p>";
                $about = []; // Initialize $about as an empty array to prevent errors in subsequent HTML
            }
        }
        ?>
        <h1 class="text-3xl md:text-4xl font-bold mb-4"><?php echo htmlspecialchars($about['title'] ?? 'About Us'); ?></h1>
        <p class="text-lg md:text-xl">Ensuring financial excellence and stewardship for the UPSI community.</p>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <div class="relative">
                        <div class="absolute -top-4 -left-4 w-24 h-24 bg-secondary opacity-20 rounded-lg"></div>
                        <img src="<?php echo htmlspecialchars($about['image_url'] ?? 'https://placehold.co/600x400/cccccc/000000?text=No+Image'); ?>" class="img-fluid" alt="About Image">
                    </div>
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold mb-6 text-primary text-red-800"><?php echo htmlspecialchars($about['our_department_title'] ?? 'About Our Department'); ?></h2>
                    
                    <p class="text-gray-700 mb-6 leading-relaxed"><?php echo htmlspecialchars($about['description'] ?? 'The Bursar Department at the Universiti Pendidikan Sultan Idris (UPSI) is dedicated to providing exceptional financial services to our university community.'); ?></p>
                    
                    <p class="text-gray-700 mb-8 leading-relaxed"><?php echo htmlspecialchars($about['our_department_description_part2'] ?? 'With a commitment to excellence and innovation, we strive to deliver seamless financial processes, accurate accounting, and responsive service to students, faculty, staff, and external stakeholders.'); ?></p>
                    
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center">
                            <div class="bg-secondary rounded-full p-2 mr-3">
                                <!-- Using Font Awesome for icons as per your other files -->
                                <i class="fas fa-check-circle text-primary text-lg"></i>
                            </div>
                            <span class="font-medium"><?php echo htmlspecialchars($about['financial_integrity_text'] ?? 'Financial Integrity'); ?></span>
                        </div>
                        <div class="flex items-center">
                            <div class="bg-secondary rounded-full p-2 mr-3">
                                <i class="fas fa-check-circle text-primary text-lg"></i>
                            </div>
                            <span class="font-medium"><?php echo htmlspecialchars($about['transparency_text'] ?? 'Transparency'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-16 bg-accent bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary mb-2 text-red-800">Our Mission & Vision</h2>
                <div class="w-24 h-1 bg-secondary mx-auto"></div>
            </div>
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2 bg-white p-8 rounded-lg shadow-lg">
                    <div class="bg-red-800 inline-block p-3 rounded-full mb-6">
                        <svg class="h-8 w-8 text-secondary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-primary text-red-800"><?php echo htmlspecialchars($about['our_mission_title'] ?? 'Our Mission'); ?></h3>
                    <p class="text-gray-700 leading-relaxed"><?php echo htmlspecialchars($about['our_mission_description'] ?? 'To provide exceptional financial services and stewardship of university resources through efficient processes, innovative solutions, and responsive customer service, supporting the UPSI Malaysia\'s commitment to academic excellence and research innovation.'); ?></p>
                </div>
                <div class="md:w-1/2 bg-white p-8 rounded-lg shadow-lg">
                    <div class="bg-red-800 inline-block p-3 rounded-full mb-6">
                        <svg class="h-8 w-8 text-secondary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-primary text-red-800"><?php echo htmlspecialchars($about['our_vision_title'] ?? 'Our Vision'); ?></h3>
                    <p class="text-gray-700 leading-relaxed"><?php echo htmlspecialchars($about['our_vision_description'] ?? 'To be recognized as a leader in higher education financial management, setting the standard for excellence, innovation, and best practices in financial services while fostering a culture of continuous improvement and fiscal responsibility that advances the UPSI Malaysia\'s global standing.'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- TOP TEAM MANAGEMENT -->
    <section class="py-16 bg-white">
        <?php include 'team-card1.php' ?>
    </section>

    <!-- Footer -->
    <?php include 'footers-baru.php' ?>

   <script>
        // Mobile menu toggle functionality would go here
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion (if applicable)
            const faqQuestions = document.querySelectorAll('.faq-question');
            
            faqQuestions.forEach(question => {
                question.addEventListener('click', () => {
                    const content = question.nextElementSibling;
                    const icon = question.querySelector('i');
                    
                    // Toggle the content
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                        icon.style.transform = 'rotate(0deg)';
                    } else {
                        content.style.maxHeight = content.scrollHeight + 'px';
                        icon.style.transform = 'rotate(180deg)';
                    }
                    
                    // Close other open items
                    faqQuestions.forEach(item => {
                        if (item !== question) {
                            item.nextElementSibling.style.maxHeight = null;
                            item.querySelector('i').style.transform = 'rotate(0deg)';
                        }
                    });
                });
            });
            
            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#00205B',
                        secondary: '#FFD700',
                        accent: '#E6F0FF',
                        light: '#F8FAFC',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>

</body>

</html>
