<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UPSI - Bursar Department</title>

    <link rel="icon" href="https://bendahari.upsi.edu.my/wp-content/uploads/2020/09/cropped-upsi-logo-1-180x180.png" type="image/png"/>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        

        body {

            font-family: 'Poppins', sans-serif;

            scroll-behavior: smooth;

        }

        

        .hero-bg {

            background: linear-gradient(rgba(0, 50, 100, 0.7), rgba(0, 50, 100, 0.7)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');

            background-size: cover;

            background-position: center;

        }

        

        .service-card:hover {

            transform: translateY(-5px);

            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);

        }

        

        .accordion-content {

            max-height: 0;

            overflow: hidden;

            transition: max-height 0.3s ease-out;

        }

    </style>

</head>



<body class="bg-gray-50">

    <!-- DATABASE CONNECTION -->

    <?php include 'database/db_connect.php' ?>



    <!-- Header -->

    <header class="bg-white shadow-md sticky top-0 z-50">

        <div class="container mx-auto px-4 py-3 flex justify-between items-center">

            <div class="flex items-center">

                <img src="images/logo-bendahari_upsi.jpg" alt="" class="h-12">

                <span class="ml-3 text-xl font-semibold text-blue-800">Bursar Department</span>

            </div>

            <nav class="hidden md:block">

                <ul class="flex space-x-8">

                    <li><a href="index.php" class="text-blue-800 hover:text-blue-600 font-medium">Home</a></li>

                    <li><a href="about-final.php" class="text-blue-800 hover:text-blue-600 font-medium">About</a></li>

                    <li><a href="#announcements" class="text-blue-800 hover:text-blue-600 font-medium">Announcements</a></li>

                    <li><a href="#services" class="text-blue-800 hover:text-blue-600 font-medium">Services</a></li>

                </ul>

            </nav>

            <button id="menuToggle" class="md:hidden text-blue-800 text-2xl">

                <i class="fas fa-bars"></i>

            </button>

        </div>



        <!-- Mobile menu -->

        <nav id="mobileMenu" class="md:hidden hidden px-4 pb-4">

            <ul class="space-y-2">

                <li><a href="index.php" class="block text-blue-800 hover:text-blue-600 font-medium border-b-2 border-blue-600">Home</a></li>

                <li><a href="announcement.php" class="block text-blue-800 hover:text-blue-600 font-medium">Announcements</a></li>

                <li><a href="services.php" class="block text-blue-800 hover:text-blue-600 font-medium">Services</a></li>

                <li><a href="feedback.php" class="block text-blue-800 hover:text-blue-600 font-medium">Feedback</a></li>

            </ul>

        </nav>

    </header>



    <!-- Hero Section -->

    <section id="home" class="hero-bg text-white py-20 md:py-32">

        <div class="container mx-auto px-4 text-center">

            <h1 class="text-4xl md:text-5xl font-bold mb-6">Group Assignment 1</h1>

            <h1 class="text-4xl md:text-5xl font-bold mb-6">Welcome to the Bursar Department</h1>

            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">Your financial partner at the UPSI Malaysia</p>

        </div>

    </section>



    <!-- Announcements Section -->

    <section id="announcements" class="py-16 bg-white">

        <div class="container mx-auto px-4">

            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Latest Announcements</h2>

            <div class="grid md:grid-cols-3 gap-6">

                <!-- Announcement Card 1 -->

                <div class="bg-gray-50 rounded-lg shadow-md p-6 border-l-4 border-blue-600">

                    <div class="flex items-center mb-4">

                        <div class="bg-blue-100 p-2 rounded-full mr-3">

                            <i class="fas fa-calendar-alt text-blue-600"></i>

                        </div>

                        <span class="text-sm text-gray-500">June 15, 2023</span>

                    </div>

                    <h3 class="text-xl font-semibold mb-2 text-blue-800">Tuition Payment Deadline</h3>

                    <p class="text-gray-600 mb-4">The deadline for Semester 2 tuition fee payment has been extended to June 30, 2023.</p>

                </div>

                

                <!-- Announcement Card 2 -->

                <div class="bg-gray-50 rounded-lg shadow-md p-6 border-l-4 border-blue-600">

                    <div class="flex items-center mb-4">

                        <div class="bg-blue-100 p-2 rounded-full mr-3">

                            <i class="fas fa-exclamation-circle text-blue-600"></i>

                        </div>

                        <span class="text-sm text-gray-500">June 10, 2023</span>

                    </div>

                    <h3 class="text-xl font-semibold mb-2 text-blue-800">New Online Payment System</h3>

                    <p class="text-gray-600 mb-4">We've upgraded our payment portal with enhanced security features and a more user-friendly interface.</p>

                </div>

                

                <!-- Announcement Card 3 -->

                <div class="bg-gray-50 rounded-lg shadow-md p-6 border-l-4 border-blue-600">

                    <div class="flex items-center mb-4">

                        <div class="bg-blue-100 p-2 rounded-full mr-3">

                            <i class="fas fa-graduation-cap text-blue-600"></i>

                        </div>

                        <span class="text-sm text-gray-500">June 5, 2023</span>

                    </div>

                    <h3 class="text-xl font-semibold mb-2 text-blue-800">Financial Aid Applications Open</h3>

                    <p class="text-gray-600 mb-4">Applications for the 2023-2024 academic year financial aid programs are now being accepted.</p>

                </div>

            </div>

            <div class="text-center mt-10">

                <a href="announcement.php" class="inline-block bg-blue-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300">View All Announcements</a>

            </div>

        </div>

    </section>



    <!-- Services Section -->

    <section id="services" class="py-16 bg-gray-50">

        <div class="container mx-auto px-4">

            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Our Services</h2>

            <div class="grid md:grid-cols-3 gap-8">

                <!-- Service Card 1 -->

                <div class="service-card bg-white rounded-lg shadow-md p-8 text-center transition duration-300">

                    <div class="bg-blue-100 p-4 rounded-full inline-block mb-4">

                        <i class="fas fa-money-bill-wave text-blue-600 text-3xl"></i>

                    </div>

                    <h3 class="text-xl font-semibold mb-3 text-blue-800">Fee Management</h3>

                    <p class="text-gray-600 mb-4">Convenient payment options for tuition fees including online banking, credit cards, and installment plans.</p>

                </div>

                

                <!-- Service Card 2 -->

                <div class="service-card bg-white rounded-lg shadow-md p-8 text-center transition duration-300">

                    <div class="bg-blue-100 p-4 rounded-full inline-block mb-4">

                        <i class="fas fa-hands-helping text-blue-600 text-3xl"></i>

                    </div>

                    <h3 class="text-xl font-semibold mb-3 text-blue-800">Financial Aid</h3>

                    <p class="text-gray-600 mb-4">Various financial assistance programs including scholarships, grants, and student loans.</p>

                </div>

                

                <!-- Service Card 3 -->

                <div class="service-card bg-white rounded-lg shadow-md p-8 text-center transition duration-300">

                    <div class="bg-blue-100 p-4 rounded-full inline-block mb-4">

                        <i class="fas fa-file-invoice-dollar text-blue-600 text-3xl"></i>

                    </div>

                    <h3 class="text-xl font-semibold mb-3 text-blue-800">Financial Reporting</h3>

                    <p class="text-gray-600 mb-4">Providing accurate and timely financial reports to support decision-making and transparency</p>

                </div>

            </div>

        </div>

    </section>



    <!-- PROMO UPSI - IKLAN -->

    <section id="iklan-banner"

        class="relative group bg-cover bg-center bg-no-repeat"

        style="background-image: url('uploads/promo-upsi1.png'); min-height: 380px;">

        

<!-- Dark overlay for better contrast on hover -->

        <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-60 transition duration-500"></div>



            <!-- Hidden by default, shown on hover -->

        <div class="absolute inset-0 flex flex-col items-center justify-center text-center opacity-0 group-hover:opacity-100 transition duration-500 text-white px-4">

            <h2 class="text-3xl font-bold mb-4"></h2>

            <a href="https://bendahari.upsi.edu.my/privilege-card" class="bg-transparent border-2 border-white text-white font-bold py-3 px-8 rounded-lg hover:bg-white hover:text-blue-800 transition duration-300">Discover Now</a>

            

        </div>

        </div>

    </section>





    <section id="branch-carousel" class="py-16 bg-gray-100">

        <!-- utk limitkan berapa slide page je bole show -->

        <div class="container mx-auto px-4" x-data="{ currentSlide: 1, total: 5}">

            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Pejabat Bendahari - Lokasi Cawangan</h2>



            <!-- Carousel Container -->

            <div class="relative">

                <div class="flex overflow-hidden">

                    <div class="flex transition-transform duration-500 ease-in-out"

                        :style="`transform: translateX(-${currentSlide * 100}%); width: ${total * 100}%`">



                    <?php

                    // SQL query to select all data from the table

                    $sql = "SELECT * FROM branches"; // Adjust the table name as needed

                    $result = $conn->query($sql);

                    $totalSlides = 6;



                    if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {

                        $totalSlides++;

                        echo '<div class="w-full flex-shrink-0 px-4">';

                        echo '<div class="bg-white rounded-lg shadow-md p-6 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">';



                        // Text column

                        echo '<div class="text-gray-700 md:col-span-1">';

                        echo '<h3 class="text-xl font-semibold text-blue-700 mb-2">' . htmlspecialchars($row['branch_name']) . '</h3>';

                        echo '<p class="font-bold">(' . $row['department'] . ')</p>';

                        echo '<p class="mt-2">' . nl2br($row['address']) . '</p>';

                        echo '<p class="mt-4"><strong>Hotline 1:</strong> ' . $row['hotline1'] . '</p>';

                        echo '<p class="mt-4"><strong></strong> ' . $row['hotline1_desc']. '</p>';

                        echo '<p class="mt-4"><strong>Hotline 2:</strong> ' . $row['hotline2'] . '</p>';

                        echo '<p class="mt-4"><strong></strong> ' . $row['hotline2_desc'] . '</p>';

                        echo '</div>';



                        // Image and Map column

                        echo '<div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">';

                        echo '<img src="' . $row['image_url'] . '" alt="Branch Image" class="rounded-lg w-full h-80 object-cover md:col-span-1">';

                        echo $row['map_embed_url'];

                        echo '</div>';



                        echo '</div></div>';

                    }

                    } else {

                        echo "<p>No results found.</p>";

                    }



                    $conn->close();

                    ?>



                    </div>

                </div>



                <div class="flex justify-center mt-8 space-x-4">

                    <button @click="currentSlide = Math.max(currentSlide - 1, 0)" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

                        Prev

                    </button>

                    <button @click="currentSlide = Math.min(currentSlide + 1, total - 1)" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

                        Next

                    </button>

                </div>
            </div>
        </div>
        
    </section>



    <!-- Footer -->

    <?php include './footers-baru.php' ?>

    

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

    document.addEventListener('alpine:init', () => {

        Alpine.data('carousel', () => ({

            currentSlide: 0,

            total: <?php echo $totalSlides; ?>,

        }));

    });

</script>



</body>

</html>