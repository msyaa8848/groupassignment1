<?php
// filepath: c:\laragon\www\DTD3033\groupassignment2\index.php
session_start();

// Enable comprehensive error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');

echo "<!-- Debug: Index.php loaded -->\n";

try {
    // Check if main application files exist
    $requiredFiles = [
        'config/database.php',
        'includes/functions.php',
        // Add other critical files here
    ];
    
    foreach ($requiredFiles as $file) {
        if (!file_exists($file)) {
            throw new Exception("Required file missing: $file");
        }
    }
    
    // Include your main application logic here
    require_once 'config/database.php';
    // require_once 'includes/functions.php';
    
    echo "Application loaded successfully!";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    error_log("Application Error: " . $e->getMessage());
} catch (Error $e) {
    echo "Fatal Error: " . $e->getMessage();
    error_log("Fatal Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPSI - Bursar Department</title>
    <link rel="icon" href="https://bendahari.upsi.edu.my/wp-content/uploads/2020/09/cropped-upsi-logo-1-180x180.png" type="image/png" />
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
            background: linear-gradient(rgba(187, 0, 0, 0.7), rgba(42, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50">

    <?php include 'header.php'; ?>

    <section id="home" class="hero-bg text-white py-20 md:py-32">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-2xl font-bold mb-6">Welcome to</h1>
            <h1 class="text-4xl md:text-5xl font-bold mb-6">BURSAR DEPARTMENT</h1>
            <p class="text-xl md:text-1xl mb-10 max-w-3xl mx-auto">Your financial partner at the UPSI Malaysia</p>
        </div>
    </section>

    <section id="announcements" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-red-800 mb-12">Latest Announcements</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Example Cards here (same as your original code) -->
            </div>
            <div class="text-center mt-10">
                <a href="announcement.php" class="inline-block bg-yellow-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-yellow-600 transition duration-300">View All Announcements</a>
            </div>
        </div>
    </section>

    <section id="services" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-red-800 mb-12">Our Services</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Service Cards (same as your original code) -->
            </div>
        </div>
    </section>

    <section id="iklan-banner" class="relative group bg-cover bg-center bg-no-repeat" style="background-image: url('uploads/promo-upsi1.png'); min-height: 380px;">
        <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-60 transition duration-500"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center opacity-0 group-hover:opacity-100 transition duration-500 text-white px-4">
            <h2 class="text-3xl font-bold mb-4"></h2>
            <a href="https://bendahari.upsi.edu.my/privilege-card" class="bg-transparent border-2 border-white text-white font-bold py-3 px-8 rounded-lg hover:bg-white hover:text-red-800 transition duration-300">Discover Now</a>
        </div>
    </section>

    <section id="branch-carousel" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4" x-data="{ currentSlide: 0, total: 0 }" x-init="$nextTick(() => total = document.querySelectorAll('.carousel-item').length)">
            <h2 class="text-3xl font-bold text-center text-red-800 mb-12">Pejabat Bendahari - Lokasi Cawangan</h2>
            <div class="relative overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out" :style="'transform: translateX(-' + (currentSlide * (100 / total)) + '%); width:' + (total * 100) + '%'">
                    <?php
                    $sql = "SELECT * FROM branches";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="w-full flex-shrink-0 px-4 carousel-item">';
                            echo '<div class="bg-white rounded-lg shadow-md p-6 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">';

                            echo '<div class="text-gray-700 md:col-span-1">';
                            echo '<h3 class="text-xl font-semibold text-red-700 mb-2">' . htmlspecialchars($row['branch_name']) . '</h3>';
                            echo '<p class="font-bold">(' . htmlspecialchars($row['department']) . ')</p>';
                            echo '<p class="mt-2">' . nl2br(htmlspecialchars($row['address'])) . '</p>';
                            echo '<p class="mt-4"><strong>Hotline 1:</strong> ' . htmlspecialchars($row['hotline1']) . '</p>';
                            echo '<p class="mt-4">' . htmlspecialchars($row['hotline1_desc']) . '</p>';
                            echo '<p class="mt-4"><strong>Hotline 2:</strong> ' . htmlspecialchars($row['hotline2']) . '</p>';
                            echo '<p class="mt-4">' . htmlspecialchars($row['hotline2_desc']) . '</p>';
                            echo '</div>';

                            echo '<div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">';
                            echo '<img src="' . htmlspecialchars($row['image_url']) . '" alt="Branch Image" class="rounded-lg w-full h-80 object-cover md:col-span-1">';
                            echo $row['map_embed_url'];
                            echo '</div>';

                            echo '</div></div>';
                        }
                    } else {
                        echo '<p class="text-center">No branches found.</p>';
                    }
                    ?>
                </div>
                <div class="flex justify-center mt-8 space-x-4">
                    <button @click="currentSlide = Math.max(currentSlide - 1, 0)" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-yellow-500">Prev</button>
                    <button @click="currentSlide = Math.min(currentSlide + 1, total - 1)" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-yellow-500">Next</button>
                </div>
            </div>
        </div>
    </section>

    <?php include './footers-baru.php'; ?>

</body>
</html>

<?php
if (isset($conn)) {
    $conn->close();
}
?>
