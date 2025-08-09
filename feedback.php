<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>UPSI - Feedback</title>
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
          <li><a href="announcement.php" class="text-blue-800 hover:text-blue-600 font-medium">Announcements</a></li>
          <li><a href="services.php" class="text-blue-800 hover:text-blue-600 font-medium">Services</a></li>
          <li><a href="feedback.php" class="text-blue-800 font-medium border-b-2 border-blue-600">Feedback</a></li>
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
    <h1 class="text-3xl md:text-4xl font-bold mb-4">We Value Your Feedback</h1>
    <p class="text-lg md:text-xl">Help us improve our services by sharing your thoughts and suggestions.</p>
  </section>

  <!-- Feedback Form -->
  <main class="container mx-auto px-4 py-12">
    <div class="bg-white rounded-lg shadow-md p-6">
      <h2 class="text-2xl font-semibold text-blue-800 mb-4">Feedback Form</h2>
      <p class="text-gray-600 mb-6">Your feedback is important to us. Please fill out the form below.</p>

      <form action="process_feedback.php" method="POST">
        <div class="mb-4">
          <label for="feedbackType" class="block text-gray-700 font-medium mb-2">Type of Feedback</label>
          <select name="feedbackType" id="feedbackType" class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500">
            <option value="general">General Feedback</option>
            <option value="service">Specific Service Feedback</option>
            <option value="suggestion">Suggestions for Improvement</option>
          </select>
        </div>

        <!-- STAR RATING -->
        <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2">Rate Your Experience</label>
        <div class="flex flex-row-reverse justify-center items-center space-x-reverse space-x-2">
            <input type="radio" name="rating" id="star5" value="5" class="hidden peer" />
            <label for="star5" class="cursor-pointer text-2xl text-gray-300 peer-checked:text-yellow-500 hover:text-yellow-400"><i class="fas fa-star"></i></label>

            <input type="radio" name="rating" id="star4" value="4" class="hidden peer" />
            <label for="star4" class="cursor-pointer text-2xl text-gray-300 peer-checked:text-yellow-500 hover:text-yellow-400"><i class="fas fa-star"></i></label>

            <input type="radio" name="rating" id="star3" value="3" class="hidden peer" />
            <label for="star3" class="cursor-pointer text-2xl text-gray-300 peer-checked:text-yellow-500 hover:text-yellow-400"><i class="fas fa-star"></i></label>

            <input type="radio" name="rating" id="star2" value="2" class="hidden peer" />
            <label for="star2" class="cursor-pointer text-2xl text-gray-300 peer-checked:text-yellow-500 hover:text-yellow-400"><i class="fas fa-star"></i></label>

            <input type="radio" name="rating" id="star1" value="1" class="hidden peer" />
            <label for="star1" class="cursor-pointer text-2xl text-gray-300 peer-checked:text-yellow-500 hover:text-yellow-400"><i class="fas fa-star"></i></label>
        </div>
        </div>

        <!-- TEXTLABER USER -->
        <div class="mb-4">
          <label for="feedback" class="block text-gray-700 font-medium mb-2">Your Feedback</label>
          <textarea name="feedback" id="feedback" rows="4" class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500" placeholder="Share your thoughts..."></textarea>
        </div>




        <div class="mb-4 flex items-center">
          <input type="checkbox" name="anonymous" id="anonymous" class="mr-2" />
          <label for="anonymous" class="text-gray-600">Submit anonymously</label>
        </div>

        <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
          Submit Feedback
        </button>
      </form>
    </div>
  </main>

  <!-- FAQs -->
  <section class="bg-blue-50 py-12">
    <div class="container mx-auto bg-white rounded-lg shadow-md p-6">
      <h2 class="text-2xl font-semibold text-blue-800 mb-4">Frequently Asked Questions</h2>
      <div class="space-y-4">
        <div class="border-b pb-4">
          <h3 class="font-semibold text-blue-800">How will my feedback be used?</h3>
          <p class="text-gray-600">It will help improve our services and processes after review by our team.</p>
        </div>
        <div class="border-b pb-4">
          <h3 class="font-semibold text-blue-800">Can I submit feedback anonymously?</h3>
          <p class="text-gray-600">Yes. Check the anonymous option in the form.</p>
        </div>
        <div class="border-b pb-4">
          <h3 class="font-semibold text-blue-800">How long will it take to process my feedback?</h3>
          <p class="text-gray-600">We aim to respond within 5 business days.</p>
        </div>
      </div>
    </div>
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


</body>
</html>
