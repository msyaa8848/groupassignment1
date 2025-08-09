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
      background: linear-gradient(rgba(0, 50, 100, 0.9), rgba(0, 50, 100, 0.9)), 
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
  <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center">
        <img src="images/logo-bendahari_upsi.jpg" alt="UPSI Logo" class="h-12" />
        <span class="ml-3 text-xl font-semibold text-blue-800">Bursar Department</span>
      </div>
      <nav class="hidden md:block">
        <ul class="flex space-x-8">
          <li><a href="index.php" class="text-blue-800 hover:text-blue-600 font-medium">Home</a></li>
          <li><a href="about.php" class="text-blue-800 font-medium border-b-2 border-blue-600">About</a></li>
        </ul>
      </nav>
      <button id="menuToggle" class="md:hidden text-blue-800 text-2xl" aria-label="Menu">
        <i class="fas fa-bars"></i>
      </button>
    </div>
        <!-- Mobile menu -->
    <nav id="mobileMenu" class="md:hidden hidden px-4 pb-4">
        <ul class="space-y-2">
            <li><a href="index.php" class="block text-blue-800 hover:text-blue-600 font-medium">Home</a></li>
            <li><a href="announcement.php" class="block text-blue-800 hover:text-blue-600 font-medium">Announcements</a></li>
            <li><a href="services.php" class="block text-blue-800 hover:text-blue-600 font-medium">Services</a></li>
            <li><a href="feedback.php" class="block text-blue-800 hover:text-blue-600 font-medium border-b-2 border-blue-600">Feedback</a></li>
        </ul>
    </nav>
  </header>

  <!-- Page Header -->
  <section class="header-bg text-white py-16 text-center">
    <h1 class="text-3xl md:text-4xl font-bold mb-4">About Us</h1>
    <p class="text-lg md:text-xl">Ensuring financial excellence and stewardship for the UPSI community.</p>
  </section>

      <!-- About Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <div class="relative">
                        <div class="absolute -top-4 -left-4 w-24 h-24 bg-secondary opacity-20 rounded-lg"></div>
                        <img src="uploads/about-bursar.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold mb-6 text-primary">About Our Department</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">The Bursar Department at the Universiti Pendidikan Sultan Idris (UPSI) is dedicated to providing exceptional financial services to our university community. We manage the institution's financial resources with integrity, transparency, and efficiency to support the university's academic mission and strategic goals.</p>
                    <p class="text-gray-700 mb-8 leading-relaxed">With a commitment to excellence and innovation, we strive to deliver seamless financial processes, accurate accounting, and responsive service to students, faculty, staff, and external stakeholders. Our team of dedicated professionals works diligently to ensure the financial well-being of the Universiti Pendidikan Sultan Idris.</p>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center">
                            <div class="bg-secondary rounded-full p-2 mr-3">
                                <svg class="h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="font-medium">Financial Integrity</span>
                        </div>
                        <div class="flex items-center">
                            <div class="bg-secondary rounded-full p-2 mr-3">
                                <svg class="h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="font-medium">Transparency</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-16 bg-accent">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary mb-2">Our Mission & Vision</h2>
                <div class="w-24 h-1 bg-secondary mx-auto"></div>
            </div>
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2 bg-white p-8 rounded-lg shadow-lg">
                    <div class="bg-primary inline-block p-3 rounded-full mb-6">
                        <svg class="h-8 w-8 text-secondary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-primary">Our Mission</h3>
                    <p class="text-gray-700 leading-relaxed">To provide exceptional financial services and stewardship of university resources through efficient processes, innovative solutions, and responsive customer service, supporting the UPSI Malaysia's commitment to academic excellence and research innovation.</p>
                </div>
                <div class="md:w-1/2 bg-white p-8 rounded-lg shadow-lg">
                    <div class="bg-primary inline-block p-3 rounded-full mb-6">
                        <svg class="h-8 w-8 text-secondary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-primary">Our Vision</h3>
                    <p class="text-gray-700 leading-relaxed">To be recognized as a leader in higher education financial management, setting the standard for excellence, innovation, and best practices in financial services while fostering a culture of continuous improvement and fiscal responsibility that advances the UPSI Malaysia's global standing.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TOP TEAM MANAGEMENT -->
    <section class="py-16 bg-white">
        <?php include 'team-card1.php'  ?>
    </section>

  <!-- Footer -->
  <?php include 'footers-baru.php' ?>

   <script>
        // Mobile menu toggle functionality would go here
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion
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
