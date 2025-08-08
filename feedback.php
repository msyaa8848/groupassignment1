<?php
require_once 'config/database.php'; // Adjust path as necessary

$status_message = '';
$status_type = '';

// Handle form submission if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback_type = $_POST['feedbackType'] ?? '';
    $feedback_text = $_POST['feedback'] ?? '';
    $rating = $_POST['rating'] ?? null; // Can be null if no star is selected
    $submit_anonymously = isset($_POST['anonymous']) ? 1 : 0;

    // Basic validation
    $errors = [];
    if (empty($feedback_type)) $errors[] = "Feedback type is required.";
    if (empty($feedback_text)) $errors[] = "Feedback message is required.";
    // Validate rating only if it's not null and within range
    if ($rating !== null && (!is_numeric($rating) || $rating < 1 || $rating > 5)) {
        $errors[] = "Rating must be between 1 and 5.";
    }

    if (!empty($errors)) {
        $status_type = 'danger';
        $status_message = "Error: " . implode(" ", $errors); // Concatenate errors
    } else {
        // Insert into DB
        // Ensure the table name 'feedback_section' matches your SQL creation
        $sql = "INSERT INTO feedback_section (feedback_type, rating, feedback_text, submit_anonymously) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // 's' for string, 'i' for integer, 's' for string, 'i' for integer (boolean)
        $stmt->bind_param("sisi", $feedback_type, $rating, $feedback_text, $submit_anonymously);

        if ($stmt->execute()) {
            $status_type = 'success';
            $status_message = "Thank you for your feedback!";
            // Clear POST data to prevent re-submission on refresh
            $_POST = array(); 
        } else {
            $status_type = 'danger';
            $status_message = "Error submitting feedback: " . $conn->error;
        }
    }
}

// Fetch all active FAQs for the FAQ section (this part remains the same)
$faq_sql = "SELECT * FROM faq_section WHERE is_active = TRUE ORDER BY sort_order ASC, question ASC";
$faq_result = $conn->query($faq_sql);
$faqs = $faq_result->fetch_all(MYSQLI_ASSOC);
?>

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
      background: linear-gradient(rgba(187, 0, 0, 0.7), rgba(42, 0, 0, 0.7)), 
      url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80');
      background-size: cover;
      background-position: center;
    }
    .feedback-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    /* Styles for FAQ Accordion */
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }
  </style>
</head>
<body class="bg-gray-50">

  <!-- Header -->
  <?php include 'header.php' ?>

  <!-- Page Header -->
  <section class="header-bg text-white py-16 text-center">
    <h1 class="text-3xl md:text-4xl font-bold mb-4">We Value Your Feedback</h1>
    <p class="text-lg md:text-xl">Help us improve our services by sharing your thoughts and suggestions.</p>
  </section>

  <!-- Feedback Form -->
  <main class="container mx-auto px-4 py-12">
    <div class="bg-white rounded-lg shadow-md p-6">
      <h2 class="text-2xl font-semibold text-red-800 mb-4">Feedback Form</h2>
      <p class="text-gray-600 mb-6">Your feedback is important to us. Please fill out the form below.</p>

      <?php if (!empty($status_message)): ?>
        <div class="alert alert-<?php echo htmlspecialchars($status_type); ?> alert-dismissible fade show mb-4" role="alert">
            <?php echo htmlspecialchars($status_message); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php endif; ?>

      <form action="" method="POST"> <!-- Action is now empty to submit to itself -->
        <div class="mb-4">
          <label for="feedbackType" class="block text-gray-700 font-medium mb-2">Type of Feedback</label>
          <select name="feedbackType" id="feedbackType" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            <option value="general">General Feedback</option>
            <option value="service">Specific Service Feedback</option>
            <option value="suggestion">Suggestions for Improvement</option>
            <option value="technical">Technical Issue</option>
            <option value="complaint">Complaint</option>
            <option value="praise">Praise</option>
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

        <!-- TEXTAREA FOR FEEDBACK -->
        <div class="mb-4">
          <label for="feedback" class="block text-gray-700 font-medium mb-2">Your Feedback</label>
          <textarea name="feedback" id="feedback" rows="4" class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-500" placeholder="Share your thoughts..." required></textarea>
        </div>

        <div class="mb-4 flex items-center">
          <input type="checkbox" name="anonymous" id="anonymous" class="mr-2" />
          <label for="anonymous" class="text-gray-600">Submit anonymously</label>
        </div>

        <button type="submit" class="bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-700 transition duration-300">
          Submit Feedback
        </button>
      </form>
    </div>
  </main>

  <!-- FAQs Section -->
  <section class="bg-gray-100 py-12">
    <div class="container mx-auto bg-white rounded-lg shadow-md p-6">
      <h2 class="text-2xl font-semibold text-red-800 mb-4">Frequently Asked Questions</h2>
      <div class="space-y-4">
        <?php if (!empty($faqs)): ?>
            <?php foreach ($faqs as $faq): ?>
            <div class="border-b pb-4">
              <h3 class="font-semibold text-red-800"><span><?php echo htmlspecialchars($faq['question']); ?></span></h3>
              <p class="text-gray-600"><?php echo nl2br(htmlspecialchars($faq['answer'])); ?></p>
            </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-gray-600">No FAQs available at the moment.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include 'footers-baru.php' ?>

   <script>
        // FAQ Accordion functionality
        document.addEventListener('DOMContentLoaded', function() {
            const faqQuestions = document.querySelectorAll('.faq-question');
            
            faqQuestions.forEach(question => {
                question.addEventListener('click', () => {
                    const content = question.nextElementSibling;
                    const icon = question.querySelector('i');
                    
                    if (content) { // Check if content exists
                        if (content.style.maxHeight) {
                            content.style.maxHeight = null;
                            if (icon) icon.style.transform = 'rotate(0deg)';
                        } else {
                            content.style.maxHeight = content.scrollHeight + 'px';
                            if (icon) icon.style.transform = 'rotate(180deg)';
                        }
                    }
                    
                    // Close other open items
                    faqQuestions.forEach(item => {
                        if (item !== question) {
                            const otherContent = item.nextElementSibling;
                            const otherIcon = item.querySelector('i');
                            if (otherContent) otherContent.style.maxHeight = null;
                            if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                        }
                    });
                });
            });
            
            // Smooth scrolling for navigation links (if any)
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
