<?php
require_once 'config/database.php';

// Fetch all about sections
$sql = "SELECT page_name, title FROM about_section";
$result = $conn->query($sql);
$about_pages = $result->fetch_all(MYSQLI_ASSOC);
?>

<header class="bg-white shadow-md sticky top-0 z-50">

        <div class="container mx-auto px-4 py-3 flex justify-between items-center">

            <div class="flex items-center">
                <img src="images/logo.png" alt="" class="h-12">
                <span class="ml-3 text-xl font-semibold text-red-800"></span>
            </div>

            <nav class="hidden md:block">

                <ul class="flex space-x-8">
                    <li><a href="index.php" class="text-red-800 hover:text-yellow-500 font-medium">Home</a></li>
                    
                    <!-- Single About Link -->
                    <li><a href="about-final.php" class="text-red-800 hover:text-yellow-500 font-medium">About</a></li>
                    
                    <li><a href="services.php" class="text-red-800 hover:text-yellow-500 font-medium">Services</a></li>
                    <li><a href="announcement.php" class="text-red-800 hover:text-yellow-500 font-medium">Announcements</a></li>
                    <li><a href="feedback.php" class="block text-red-800 hover:text-yellow-500 font-medium">Feedback</a></li>
                </ul>

            </nav>

            <button id="menuToggle" class="md:hidden text-red-800 text-2xl">
                <i class="fas fa-bars"></i>
            </button>

        </div>

        <!-- Mobile menu -->
        <nav id="mobileMenu" class="md:hidden hidden px-4 pb-4">
            <ul class="space-y-2">
                <li><a href="index.php" class="block text-red-800 hover:text-red-600 font-medium border-b-2 border-red-600">Home</a></li>
                
                <!-- Single About Link -->
                <li><a href="about-final.php" class="block text-red-800 hover:text-red-600 font-medium">About</a></li>
                
                <li><a href="services.php" class="block text-red-800 hover:text-red-600 font-medium">Services</a></li>
                <li><a href="announcement.php" class="block text-red-800 hover:text-red-600 font-medium">Announcements</a></li>
                <li><a href="feedback.php" class="block text-red-800 hover:text-red-600 font-medium">Feedback</a></li>
            </ul>
        </nav>

</header>