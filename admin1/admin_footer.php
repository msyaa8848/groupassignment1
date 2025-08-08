<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Fetch the single footer entry (assuming ID 1 for the main footer)
$footer_id = 1; // Or fetch based on a specific identifier if you have multiple footers
$sql = "SELECT * FROM footer_section WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $footer_id);
$stmt->execute();
$result = $stmt->get_result();
$footer_data = $result->fetch_assoc();

// If no footer data exists, create a default entry
if (!$footer_data) {
    $insert_sql = "INSERT INTO footer_section (id, department_name, department_description, address_text, phone_number, email_address, youtube_link, facebook_link, instagram_link, copyright_text, admin_login_link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $default_dept_name = "UPSI Bursar Department";
    $default_dept_desc = "Providing financial services and support to the UPSI Malaysia community.";
    $default_address = "Universiti Pendidikan Sultan Idris, 35900 PRK";
    $default_phone = "+603-7967 3202";
    $default_email = "bendahari@upsi.edu.my";
    $default_youtube = ""; // Default to empty string for no link
    $default_facebook = ""; // Default to empty string for no link
    $default_instagram = ""; // Default to empty string for no link
    $default_copyright = "© " . date("Y") . " UPSI Malaysia - Bursar Department. All rights reserved.";
    $default_admin_link = "admin_login.php";

    $insert_stmt->bind_param("issssssssss",
        $footer_id,
        $default_dept_name,
        $default_dept_desc,
        $default_address,
        $default_phone,
        $default_email,
        $default_youtube,
        $default_facebook,
        $default_instagram,
        $default_copyright,
        $default_admin_link
    );
    $insert_stmt->execute();
    // Re-fetch data after insertion
    $stmt->execute();
    $result = $stmt->get_result();
    $footer_data = $result->fetch_assoc();
}


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_name = $_POST['department_name'] ?? '';
    $department_description = $_POST['department_description'] ?? '';
    $address_text = $_POST['address_text'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $email_address = $_POST['email_address'] ?? '';
    $youtube_link = $_POST['youtube_link'] ?? '';
    $facebook_link = $_POST['facebook_link'] ?? ''; // New
    $instagram_link = $_POST['instagram_link'] ?? ''; // New
    $copyright_text = $_POST['copyright_text'] ?? '';
    $admin_login_link = $_POST['admin_login_link'] ?? '';

    // Update the existing record
    $update_sql = "UPDATE footer_section SET 
        department_name = ?, 
        department_description = ?, 
        address_text = ?, 
        phone_number = ?, 
        email_address = ?, 
        youtube_link = ?, 
        facebook_link = ?,    -- New
        instagram_link = ?,   -- New
        copyright_text = ?, 
        admin_login_link = ?
        WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssssssssi", // Added two 's' for new links
        $department_name,
        $department_description,
        $address_text,
        $phone_number,
        $email_address,
        $youtube_link,
        $facebook_link,   // New
        $instagram_link,  // New
        $copyright_text,
        $admin_login_link,
        $footer_id
    );

    if ($update_stmt->execute()) {
        $success_message = "Footer content updated successfully!";
        // Refresh data after update to show the latest changes on the form
        $stmt->execute();
        $result = $stmt->get_result();
        $footer_data = $result->fetch_assoc();
    } else {
        $error_message = "Error updating footer content: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Edit Footer</title>
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>
<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include 'sidebar.php'; ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Edit Footer Content</h1>
                    </div>
                    <div class="section-body">
                        <?php if (isset($success_message) && !empty($success_message)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $success_message; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($error_message) && !empty($error_message)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $error_message; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Footer Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label for="department_name">Department Name</label>
                                                <input type="text" class="form-control" id="department_name" name="department_name" value="<?php echo htmlspecialchars($footer_data['department_name'] ?? ''); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="department_description">Department Description</label>
                                                <textarea class="form-control" id="department_description" name="department_description" rows="3"><?php echo htmlspecialchars($footer_data['department_description'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="address_text">Address</label>
                                                <textarea class="form-control" id="address_text" name="address_text" rows="2"><?php echo htmlspecialchars($footer_data['address_text'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_number">Phone Number</label>
                                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($footer_data['phone_number'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="email_address">Email Address</label>
                                                <input type="email" class="form-control" id="email_address" name="email_address" value="<?php echo htmlspecialchars($footer_data['email_address'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="youtube_link">YouTube Link</label>
                                                <input type="url" class="form-control" id="youtube_link" name="youtube_link" value="<?php echo htmlspecialchars($footer_data['youtube_link'] ?? ''); ?>" placeholder="Enter YouTube URL">
                                            </div>
                                            <div class="form-group">
                                                <label for="facebook_link">Facebook Link</label>
                                                <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="<?php echo htmlspecialchars($footer_data['facebook_link'] ?? ''); ?>" placeholder="Enter Facebook URL">
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram_link">Instagram Link</label>
                                                <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="<?php echo htmlspecialchars($footer_data['instagram_link'] ?? ''); ?>" placeholder="Enter Instagram URL">
                                            </div>
                                            <div class="form-group">
                                                <label for="copyright_text">Copyright Text</label>
                                                <input type="text" class="form-control" id="copyright_text" name="copyright_text" value="<?php echo htmlspecialchars($footer_data['copyright_text'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_login_link">Admin Login Link</label>
                                                <input type="text" class="form-control" id="admin_login_link" name="admin_login_link" value="<?php echo htmlspecialchars($footer_data['admin_login_link'] ?? ''); ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Footer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
