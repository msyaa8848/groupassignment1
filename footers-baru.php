<?php
// Ensure database connection is available. If this file is included by other PHP files,
// they should already have required 'config/database.php'.
// If this file might be accessed directly or included in a context without DB connection,
// uncomment the line below:
// require_once 'config/database.php';

// Fetch the single footer entry (assuming ID 1 for the main footer)
$footer_id = 1;
$footer_data = null; // Initialize to null

// Check if $conn (database connection) is available before querying
if (isset($conn) && $conn instanceof mysqli) {
    $sql = "SELECT * FROM footer_section WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $footer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $footer_data = $result->fetch_assoc();
    } else {
        // Handle error if statement preparation fails
        error_log("Failed to prepare footer_section query: " . $conn->error);
    }
} else {
    // Fallback if database connection is not available (e.g., for development/testing)
    $footer_data = [
        'department_name' => 'UPSI Bursar Department (Fallback)',
        'department_description' => 'Providing financial services and support to the UPSI Malaysia community.',
        'address_text' => 'Universiti Pendidikan Sultan Idris, 35900 PRK',
        'phone_number' => '+603-7967 3202',
        'email_address' => 'bendahari@upsi.edu.my',
        'youtube_link' => '#',
        'facebook_link' => '', // Fallback for new fields
        'instagram_link' => '', // Fallback for new fields
        'copyright_text' => '© ' . date("Y") . ' UPSI Malaysia - Bursar Department. All rights reserved.',
        'admin_login_link' => 'admin_login.php'
    ];
}

// Default values if no data is found (even after potential initial insert)
$department_name = $footer_data['department_name'] ?? 'UPSI Bursar Department';
$department_description = $footer_data['department_description'] ?? 'Providing financial services and support to the UPSI Malaysia community.';
$address_text = $footer_data['address_text'] ?? 'Universiti Pendidikan Sultan Idris, 35900 PRK';
$phone_number = $footer_data['phone_number'] ?? '+603-7967 3202';
$email_address = $footer_data['email_address'] ?? 'bendahari@upsi.edu.my';
$youtube_link = $footer_data['youtube_link'] ?? ''; // Ensure empty string if null
$facebook_link = $footer_data['facebook_link'] ?? ''; // Ensure empty string if null
$instagram_link = $footer_data['instagram_link'] ?? ''; // Ensure empty string if null
$copyright_text = $footer_data['copyright_text'] ?? '© ' . date("Y") . ' UPSI Malaysia - Bursar Department. All rights reserved.';
$admin_login_link = $footer_data['admin_login_link'] ?? 'admin_login.php';

?>
<!-- Footer -->
<footer class="bg-red-900 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
                <h3 class="text-lg font-semibold mb-4"><?php echo htmlspecialchars($department_name); ?></h3>
                <p class="text-red-200"><?php echo htmlspecialchars($department_description); ?></p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="index.php" class="hover:text-red-200">Home</a></li>
                    <li><a href="about.php" class="hover:text-red-200">About</a></li>
                    <li><a href="announcement.php" class="hover:text-red-200">Announcements</a></li>
                    <li><a href="services.php" class="hover:text-red-200">Services</a></li>
                    <li><a href="feedback.php" class="hover:text-red-200">Feedback</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                        <span><?php echo nl2br(htmlspecialchars($address_text)); ?></span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt mr-2"></i>
                        <span><?php echo htmlspecialchars($phone_number); ?></span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-2"></i>
                        <span><?php echo htmlspecialchars($email_address); ?></span>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <?php if (!empty($youtube_link)): ?>
                        <a href="<?php echo htmlspecialchars($youtube_link); ?>" class="bg-red-800 text-white p-3 rounded-full hover:bg-red-700 transition duration-300" target="_blank"><i class="fab fa-youtube"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($facebook_link)): ?>
                        <a href="<?php echo htmlspecialchars($facebook_link); ?>" class="bg-red-800 text-white p-3 rounded-full hover:bg-red-700 transition duration-300" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($instagram_link)): ?>
                        <a href="<?php echo htmlspecialchars($instagram_link); ?>" class="bg-red-800 text-white p-3 rounded-full hover:bg-red-700 transition duration-300" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
        <div class="border-t border-red-800 pt-6 text-center text-sm text-red-200">
            <p><?php echo htmlspecialchars($copyright_text); ?></p>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between mt-4">
            <p class="text-red-200 text-sm">
                &copy; <?php echo date("Y"); ?> Bursar Department UPSI. All rights reserved.
            </p>
            <div class="mt-4 md:mt-0">
                <a href="<?php echo htmlspecialchars($admin_login_link); ?>" class="text-red-200 hover:text-white"><i class="fas fa-user-shield"></i> Admin Login</a>
            </div>
        </div>
    </div>
</footer>
